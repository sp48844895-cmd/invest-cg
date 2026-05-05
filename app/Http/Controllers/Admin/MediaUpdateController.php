<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaUpdateController extends Controller
{
    public function index(Request $request)
    {
        $query = MediaUpdate::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('summary', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'unpublished') {
                $query->where('is_published', false);
            }
        }

        $mediaUpdates = $query->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.media-updates.index', compact('mediaUpdates'));
    }

    public function create()
    {
        return view('admin.media-updates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'source_url' => ['required', 'url'],
            'image_url' => ['nullable', 'url'],
            'image_upload' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_upload')) {
            $validated['image_path'] = $request->file('image_upload')->store('media-updates', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published', true);

        unset($validated['image_upload']);

        MediaUpdate::create($validated);

        return redirect()->route('admin.media-updates.index')
            ->with('success', 'Media update created successfully.');
    }

    public function show(MediaUpdate $mediaUpdate)
    {
        return view('admin.media-updates.show', compact('mediaUpdate'));
    }

    public function edit(MediaUpdate $mediaUpdate)
    {
        return view('admin.media-updates.edit', compact('mediaUpdate'));
    }

    public function update(Request $request, MediaUpdate $mediaUpdate)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'source_url' => ['required', 'url'],
            'image_url' => ['nullable', 'url'],
            'image_upload' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image_upload')) {
            // Delete old image if exists
            if ($mediaUpdate->image_path && Storage::disk('public')->exists($mediaUpdate->image_path)) {
                Storage::disk('public')->delete($mediaUpdate->image_path);
            }
            $validated['image_path'] = $request->file('image_upload')->store('media-updates', 'public');
        }

        $validated['is_published'] = $request->boolean('is_published', false);

        unset($validated['image_upload']);

        $mediaUpdate->update($validated);

        return redirect()->route('admin.media-updates.index')
            ->with('success', 'Media update updated successfully.');
    }

    public function destroy(MediaUpdate $mediaUpdate)
    {
        // Delete image if exists
        if ($mediaUpdate->image_path && Storage::disk('public')->exists($mediaUpdate->image_path)) {
            Storage::disk('public')->delete($mediaUpdate->image_path);
        }

        $mediaUpdate->delete();

        return redirect()->route('admin.media-updates.index')
            ->with('success', 'Media update deleted successfully.');
    }
}






