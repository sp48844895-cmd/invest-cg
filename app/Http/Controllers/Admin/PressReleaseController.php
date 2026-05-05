<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PressReleaseController extends Controller
{
    public function index(Request $request)
    {
        $query = PressRelease::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('summary', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'unpublished') {
                $query->where('is_published', false);
            }
        }

        if ($request->filled('tag')) {
            $query->whereJsonContains('tags', $request->tag);
        }

        $pressReleases = $query->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.press-releases.index', compact('pressReleases'));
    }

    public function create()
    {
        return view('admin.press-releases.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:press_releases,slug'],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail_url' => ['nullable', 'url'],
            'thumbnail_upload' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'author' => ['nullable', 'string', 'max:255'],
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_upload')) {
            $validated['thumbnail_path'] = $request->file('thumbnail_upload')->store('press-releases', 'public');
        }

        // Process tags (comma-separated string to array)
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = array_filter($tags);
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = 1;
            $originalSlug = $validated['slug'];
            while (PressRelease::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        $validated['is_published'] = $request->boolean('is_published', false);
        unset($validated['thumbnail_upload']);

        PressRelease::create($validated);

        return redirect()->route('admin.press-releases.index')
            ->with('success', 'Press release created successfully.');
    }

    public function show(PressRelease $pressRelease)
    {
        return view('admin.press-releases.show', compact('pressRelease'));
    }

    public function edit(PressRelease $pressRelease)
    {
        return view('admin.press-releases.edit', compact('pressRelease'));
    }

    public function update(Request $request, PressRelease $pressRelease)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:press_releases,slug,' . $pressRelease->id],
            'summary' => ['required', 'string'],
            'content' => ['required', 'string'],
            'thumbnail_url' => ['nullable', 'url'],
            'thumbnail_upload' => ['nullable', 'image', 'max:2048'],
            'published_at' => ['required', 'date'],
            'is_published' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'author' => ['nullable', 'string', 'max:255'],
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail_upload')) {
            // Delete old thumbnail if exists
            if ($pressRelease->thumbnail_path && Storage::disk('public')->exists($pressRelease->thumbnail_path)) {
                Storage::disk('public')->delete($pressRelease->thumbnail_path);
            }
            $validated['thumbnail_path'] = $request->file('thumbnail_upload')->store('press-releases', 'public');
        }

        // Process tags
        if ($request->filled('tags')) {
            $tags = array_map('trim', explode(',', $request->tags));
            $validated['tags'] = array_filter($tags);
        } else {
            $validated['tags'] = null;
        }

        // Generate slug if not provided and title changed
        if (empty($validated['slug']) && $pressRelease->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Ensure uniqueness
            $count = 1;
            $originalSlug = $validated['slug'];
            while (PressRelease::where('slug', $validated['slug'])->where('id', '!=', $pressRelease->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        } elseif (empty($validated['slug'])) {
            $validated['slug'] = $pressRelease->slug;
        }

        $validated['is_published'] = $request->boolean('is_published', false);
        unset($validated['thumbnail_upload']);

        $pressRelease->update($validated);

        return redirect()->route('admin.press-releases.index')
            ->with('success', 'Press release updated successfully.');
    }

    public function destroy(PressRelease $pressRelease)
    {
        // Delete thumbnail if exists
        if ($pressRelease->thumbnail_path && Storage::disk('public')->exists($pressRelease->thumbnail_path)) {
            Storage::disk('public')->delete($pressRelease->thumbnail_path);
        }

        $pressRelease->delete();

        return redirect()->route('admin.press-releases.index')
            ->with('success', 'Press release deleted successfully.');
    }
}
