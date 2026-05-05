<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserManual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserManualController extends Controller
{
    public function index(Request $request)
    {
        $query = UserManual::query();

        if ($request->filled('dept_name')) {
            $query->where('dept_name', $request->dept_name);
        }

        if ($request->filled('service_name')) {
            $query->where('service_name', 'like', '%' . $request->service_name . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $manuals = $query->orderBy('display_order')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.user-manuals.index', compact('manuals'));
    }

    public function create()
    {
        return view('admin.user-manuals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dept_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'short_desc' => 'nullable|string',
            'file' => 'required|file|mimes:pdf',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $filePath = $request->file('file')->store('user-manuals', 'public');

        UserManual::create([
            'dept_name' => $validated['dept_name'],
            'service_name' => $validated['service_name'],
            'type' => $validated['type'],
            'short_desc' => $validated['short_desc'] ?? null,
            'pdf_file' => $filePath,
            'display_order' => $validated['display_order'] ?? 0,
            'status' => $validated['status'] ?? true,
        ]);

        return redirect()->route('admin.user-manuals.index')
            ->with('success', 'User manual uploaded successfully.');
    }

    public function show(UserManual $userManual)
    {
        if (!Storage::disk('public')->exists($userManual->pdf_file)) {
            abort(404, 'File not found');
        }

        return response()->file(
            Storage::disk('public')->path($userManual->pdf_file),
            ['Content-Type' => 'application/pdf']
        );
    }

    public function edit(UserManual $userManual)
    {
        return view('admin.user-manuals.edit', compact('userManual'));
    }

    public function update(Request $request, UserManual $userManual)
    {
        $validated = $request->validate([
            'dept_name' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'short_desc' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf',
            'display_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $updateData = [
            'dept_name' => $validated['dept_name'],
            'service_name' => $validated['service_name'],
            'type' => $validated['type'],
            'short_desc' => $validated['short_desc'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'status' => $validated['status'] ?? true,
        ];

        if ($request->hasFile('file')) {
            if (Storage::disk('public')->exists($userManual->pdf_file)) {
                Storage::disk('public')->delete($userManual->pdf_file);
            }

            $updateData['pdf_file'] = $request->file('file')->store('user-manuals', 'public');
        }

        $userManual->update($updateData);

        return redirect()->route('admin.user-manuals.index')
            ->with('success', 'User manual updated successfully.');
    }

    public function destroy(UserManual $userManual)
    {
        if (Storage::disk('public')->exists($userManual->pdf_file)) {
            Storage::disk('public')->delete($userManual->pdf_file);
        }

        $userManual->delete();

        return redirect()->route('admin.user-manuals.index')
            ->with('success', 'User manual deleted successfully.');
    }

    public function bulkDestroy(Request $request)
    {
        $validated = $request->validate([
            'selected_manuals' => 'required|array',
            'selected_manuals.*' => 'integer|exists:user_manuals,id',
        ]);

        /** @var \Illuminate\Database\Eloquent\Collection<int, UserManual> $manuals */
        $manuals = UserManual::whereIn('id', $validated['selected_manuals'])->get();

        foreach ($manuals as $manual) {
            if (Storage::disk('public')->exists($manual->pdf_file)) {
                Storage::disk('public')->delete($manual->pdf_file);
            }
            $manual->delete();
        }

        return redirect()->route('admin.user-manuals.index')
            ->with('success', 'Selected manuals deleted successfully.');
    }
}
