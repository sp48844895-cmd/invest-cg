<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PolicyDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PolicyDocumentController extends Controller
{
    public function index(Request $request)
    {
        $query = PolicyDocument::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('policy_period')) {
            $query->where('policy_period', $request->policy_period);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $documents = $query->ordered()->paginate(20);
        
        // Get distinct policy periods for the dropdown
        $policyPeriods = PolicyDocument::whereNotNull('policy_period')
            ->distinct()
            ->orderBy('policy_period', 'desc')
            ->pluck('policy_period')
            ->toArray();

        return view('admin.policy-documents.index', compact('documents', 'policyPeriods'));
    }

    public function create()
    {
        return view('admin.policy-documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:acts,industrial_policy,policy_act,rules,administrative_reports',
            'policy_period' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf',
            'published_date' => 'required|date',
            'display_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $file = $request->file('file');
        $fileSize = $file->getSize() / 1024 / 1024; // Convert to MB
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('policy-documents', 'public');

        PolicyDocument::create([
            'category' => $validated['category'],
            'policy_period' => $validated['policy_period'] ?? null,
            'title' => $validated['title'],
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => round($fileSize, 2),
            'published_date' => $validated['published_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ]);

        return redirect()->route('admin.policy-documents.index')
            ->with('success', 'Policy document uploaded successfully.');
    }

    public function show(PolicyDocument $policyDocument)
    {
        // Check if file exists
        if (!Storage::disk('public')->exists($policyDocument->file_path)) {
            abort(404, 'File not found');
        }

        // Get the file path
        $filePath = Storage::disk('public')->path($policyDocument->file_path);
        
        // Return the file as a response
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $policyDocument->file_name . '"',
        ]);
    }

    public function edit(PolicyDocument $policyDocument)
    {
        return view('admin.policy-documents.edit', compact('policyDocument'));
    }

    public function update(Request $request, PolicyDocument $policyDocument)
    {
        $validated = $request->validate([
            'category' => 'required|in:acts,industrial_policy,policy_act,rules,administrative_reports',
            'policy_period' => 'nullable|string|max:50',
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf',
            'published_date' => 'required|date',
            'display_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $updateData = [
            'category' => $validated['category'],
            'policy_period' => $validated['policy_period'] ?? null,
            'title' => $validated['title'],
            'published_date' => $validated['published_date'],
            'display_order' => $validated['display_order'] ?? 0,
            'is_active' => $validated['is_active'] ?? true,
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if (Storage::disk('public')->exists($policyDocument->file_path)) {
                Storage::disk('public')->delete($policyDocument->file_path);
            }

            $file = $request->file('file');
            $fileSize = $file->getSize() / 1024 / 1024;
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('policy-documents', 'public');

            $updateData['file_path'] = $filePath;
            $updateData['file_name'] = $fileName;
            $updateData['file_size'] = round($fileSize, 2);
        }

        $policyDocument->update($updateData);

        return redirect()->route('admin.policy-documents.index')
            ->with('success', 'Policy document updated successfully.');
    }

    public function destroy(PolicyDocument $policyDocument)
    {
        // Delete file
        if (Storage::disk('public')->exists($policyDocument->file_path)) {
            Storage::disk('public')->delete($policyDocument->file_path);
        }

        $policyDocument->delete();

        return redirect()->route('admin.policy-documents.index')
            ->with('success', 'Policy document deleted successfully.');
    }

    public function bulkUpload()
    {
        return view('admin.policy-documents.bulk-upload');
    }

    public function bulkStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'category' => 'required|in:acts,industrial_policy,policy_act,rules,administrative_reports',
                'policy_period' => 'nullable|string|max:50',
                'published_date' => 'required|date',
                'files.*' => 'required|file|mimes:pdf',
                'titles.*' => 'nullable|string|max:255',
                'display_order' => 'nullable|integer|min:0',
                'is_active' => 'nullable|boolean',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors($e->errors());
        }

        // Check if files were uploaded
        if (!$request->hasFile('files')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['files' => 'No files were uploaded.']);
        }

        $uploaded = 0;
        $failed = 0;
        $errors = [];

        foreach ($request->file('files') as $index => $file) {
            try {
                $fileSize = $file->getSize() / 1024 / 1024; // Convert to MB
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('policy-documents', 'public');
                $title = !empty($validated['titles'][$index]) ? $validated['titles'][$index] : pathinfo($fileName, PATHINFO_FILENAME);

                PolicyDocument::create([
                    'category' => $validated['category'],
                    'policy_period' => $validated['policy_period'] ?? null,
                    'title' => $title,
                    'file_path' => $filePath,
                    'file_name' => $fileName,
                    'file_size' => round($fileSize, 2),
                    'published_date' => $validated['published_date'],
                    'display_order' => ($validated['display_order'] ?? 0) + $index,
                    'is_active' => $validated['is_active'] ?? true,
                ]);

                $uploaded++;
            } catch (\Exception $e) {
                $failed++;
                $errors[] = "Failed to upload '{$file->getClientOriginalName()}': " . $e->getMessage();
            }
        }

        if ($uploaded > 0) {
            $message = "Bulk upload completed: {$uploaded} document(s) uploaded successfully.";
            if ($failed > 0) {
                $message .= " {$failed} document(s) failed to upload.";
            }
            return redirect()->route('admin.policy-documents.index')
                ->with('success', $message)
                ->with('errors', $errors);
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors(['files' => 'No files were uploaded successfully. ' . implode(' ', $errors)]);
        }
    }
}


