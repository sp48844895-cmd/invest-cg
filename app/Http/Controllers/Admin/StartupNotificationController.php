<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StartupNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StartupNotificationController extends Controller
{
    public function index(Request $request)
    {
        $query = StartupNotification::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $notifications = $query->ordered()->paginate(20);

        return view('admin.startup-notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('admin.startup-notifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'pdf' => ['required', 'file', 'mimes:pdf'],
            'notification_date' => ['required', 'date'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $file = $request->file('pdf');
        $fileSize = $file->getSize() / 1024 / 1024;
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('startup-notifications', 'public');

        StartupNotification::create([
            'title' => $validated['title'],
            'pdf_path' => $filePath,
            'pdf_name' => $fileName,
            'pdf_size' => round($fileSize, 2),
            'notification_date' => $validated['notification_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('admin.startup-notifications.index')
            ->with('success', 'Startup notification created successfully.');
    }

    public function edit(StartupNotification $startupNotification)
    {
        return view('admin.startup-notifications.edit', ['notification' => $startupNotification]);
    }

    public function update(Request $request, StartupNotification $startupNotification)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'pdf' => ['nullable', 'file', 'mimes:pdf'],
            'notification_date' => ['required', 'date'],
            'display_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $updateData = [
            'title' => $validated['title'],
            'notification_date' => $validated['notification_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ];

        if ($request->hasFile('pdf')) {
            if ($startupNotification->pdf_path && Storage::disk('public')->exists($startupNotification->pdf_path)) {
                Storage::disk('public')->delete($startupNotification->pdf_path);
            }

            $file = $request->file('pdf');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('startup-notifications', 'public');

            $updateData['pdf_path'] = $filePath;
            $updateData['pdf_name'] = $fileName;
            $updateData['pdf_size'] = round($fileSize, 2);
        }

        $startupNotification->update($updateData);

        return redirect()->route('admin.startup-notifications.index')
            ->with('success', 'Startup notification updated successfully.');
    }

    public function destroy(StartupNotification $startupNotification)
    {
        if ($startupNotification->pdf_path && Storage::disk('public')->exists($startupNotification->pdf_path)) {
            Storage::disk('public')->delete($startupNotification->pdf_path);
        }

        $startupNotification->delete();

        return redirect()->route('admin.startup-notifications.index')
            ->with('success', 'Startup notification deleted successfully.');
    }
}
