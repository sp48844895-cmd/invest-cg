<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\YouTubeHelper;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = GalleryItem::query();

        if ($request->filled('media_type')) {
            $query->where('media_type', $request->media_type);
        }

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $items = $query->orderByDesc('display_order')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'media_type' => 'required|in:image,video',
            'title' => 'nullable|string|max:255',
            'image' => 'required_if:media_type,image|nullable|file|image|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:51200',
            'video_url' => 'nullable|url|max:500',
            'youtube_id' => 'nullable|string|max:50',
            'published_at' => 'nullable|date',
            'display_order' => 'nullable|integer|min:0',
            'is_visible' => 'nullable|boolean',
        ]);

        $data = [
            'media_type' => $validated['media_type'],
            'title' => $validated['title'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_visible' => $validated['is_visible'] ?? true,
            'published_at' => $validated['published_at'] ?? now(),
        ];

        if ($validated['media_type'] === 'image' && $request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        if ($validated['media_type'] === 'video') {
            // Handle video file upload
            if ($request->hasFile('video_file')) {
                $filePath = $request->file('video_file')->store('gallery/videos', 'public');
                $data['video_url'] = Storage::url($filePath);
                $data['youtube_id'] = null;
                // Title is provided manually for file uploads
            } else {
                // Handle video URL
                $data['video_url'] = $validated['video_url'] ?? null;
                
                // Auto-extract YouTube ID and fetch title from YouTube
                if ($data['video_url'] && YouTubeHelper::isYouTubeUrl($data['video_url'])) {
                    $data['youtube_id'] = YouTubeHelper::extractVideoId($data['video_url']);
                    
                    // Fetch title from YouTube if not provided
                    if (empty($validated['title'])) {
                        $youtubeTitle = YouTubeHelper::fetchVideoTitle($data['video_url']);
                        if ($youtubeTitle) {
                            $data['title'] = $youtubeTitle;
                        }
                    }
                } else {
                    $data['youtube_id'] = $validated['youtube_id'] ?? null;
                }
            }
        }

        GalleryItem::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $validated = $request->validate([
            'media_type' => 'required|in:image,video',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|file|image|max:5120',
            'video_file' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:51200',
            'video_url' => 'nullable|url|max:500',
            'youtube_id' => 'nullable|string|max:50',
            'published_at' => 'nullable|date',
            'display_order' => 'nullable|integer|min:0',
            'is_visible' => 'nullable|boolean',
        ]);

        $data = [
            'media_type' => $validated['media_type'],
            'title' => $validated['title'] ?? null,
            'display_order' => $validated['display_order'] ?? 0,
            'is_visible' => $validated['is_visible'] ?? true,
            'published_at' => $validated['published_at'] ?? $gallery->published_at,
        ];

        if ($validated['media_type'] === 'image') {
            if ($request->hasFile('image')) {
                // Delete old image
                if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                    Storage::disk('public')->delete($gallery->image_path);
                }
                $data['image_path'] = $request->file('image')->store('gallery', 'public');
            }
            $data['video_url'] = null;
            $data['youtube_id'] = null;
        }

        if ($validated['media_type'] === 'video') {
            // Handle video file upload
            if ($request->hasFile('video_file')) {
                // Delete old video file if exists (stored in video_url)
                if ($gallery->video_url && str_contains($gallery->video_url, '/storage/gallery/videos/')) {
                    $oldPath = str_replace('/storage/', '', parse_url($gallery->video_url, PHP_URL_PATH));
                    if (Storage::disk('public')->exists($oldPath)) {
                        Storage::disk('public')->delete($oldPath);
                    }
                }
                $filePath = $request->file('video_file')->store('gallery/videos', 'public');
                $data['video_url'] = Storage::url($filePath);
                $data['youtube_id'] = null;
                // Title is provided manually for file uploads
            } else {
                // Handle video URL
                $data['video_url'] = $validated['video_url'] ?? null;
                
                // Auto-extract YouTube ID and fetch title from YouTube
                if ($data['video_url'] && YouTubeHelper::isYouTubeUrl($data['video_url'])) {
                    $data['youtube_id'] = YouTubeHelper::extractVideoId($data['video_url']);
                    
                    // Fetch title from YouTube if not provided
                    if (empty($validated['title'])) {
                        $youtubeTitle = YouTubeHelper::fetchVideoTitle($data['video_url']);
                        if ($youtubeTitle) {
                            $data['title'] = $youtubeTitle;
                        }
                    }
                } else {
                    $data['youtube_id'] = $validated['youtube_id'] ?? null;
                }
            }
            
            // Delete old image if exists
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }
            $data['image_path'] = null;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(GalleryItem $gallery)
    {
        // Delete image if exists
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    public function bulkUpload()
    {
        return view('admin.gallery.bulk-upload');
    }

    public function bulkStore(Request $request)
    {
        $validated = $request->validate([
            'media_type' => 'required|in:image,video',
            'images.*' => 'required_if:media_type,image|nullable|file|image|max:5120',
            'videos.*' => 'required_if:media_type,video|nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:51200',
            'video_urls' => 'nullable|string',
            'image_titles.*' => 'nullable|string|max:255',
            'video_titles.*' => 'nullable|string|max:255',
            'video_url_titles.*' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'display_order' => 'nullable|integer|min:0',
            'is_visible' => 'nullable|boolean',
        ]);

        $uploaded = 0;
        $failed = 0;
        $displayOrder = $validated['display_order'] ?? 0;

        if ($validated['media_type'] === 'image' && $request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                try {
                    $filePath = $image->store('gallery', 'public');
                    $title = $validated['image_titles'][$index] ?? null;

                    GalleryItem::create([
                        'media_type' => 'image',
                        'title' => $title,
                        'image_path' => $filePath,
                        'display_order' => $displayOrder + $index,
                        'is_visible' => $validated['is_visible'] ?? true,
                        'published_at' => $validated['published_at'] ?? now(),
                    ]);

                    $uploaded++;
                } catch (\Exception $e) {
                    $failed++;
                }
            }
        }

        if ($validated['media_type'] === 'video') {
            // Handle video file uploads
            if ($request->hasFile('videos')) {
                foreach ($request->file('videos') as $index => $video) {
                    try {
                        $filePath = $video->store('gallery/videos', 'public');
                        $title = $validated['video_titles'][$index] ?? null;

                        GalleryItem::create([
                            'media_type' => 'video',
                            'title' => $title,
                            'video_url' => Storage::url($filePath), // Store as video_url for uploaded files
                            'display_order' => $displayOrder + $uploaded + $index,
                            'is_visible' => $validated['is_visible'] ?? true,
                            'published_at' => $validated['published_at'] ?? now(),
                        ]);

                        $uploaded++;
                    } catch (\Exception $e) {
                        $failed++;
                    }
                }
            }

            // Handle video URLs
            if ($request->filled('video_urls')) {
                $urls = array_filter(array_map('trim', explode("\n", $request->video_urls)));

                foreach ($urls as $index => $url) {
                    if (empty($url)) {
                        continue;
                    }

                    try {
                        $title = null;
                        $youtubeId = null;
                        
                        // Check if it's a YouTube URL
                        if (YouTubeHelper::isYouTubeUrl($url)) {
                            $youtubeId = YouTubeHelper::extractVideoId($url);
                            // Auto-fetch title from YouTube
                            $title = YouTubeHelper::fetchVideoTitle($url);
                        }

                        GalleryItem::create([
                            'media_type' => 'video',
                            'title' => $title,
                            'video_url' => $url,
                            'youtube_id' => $youtubeId,
                            'display_order' => $displayOrder + $uploaded + $index,
                            'is_visible' => $validated['is_visible'] ?? true,
                            'published_at' => $validated['published_at'] ?? now(),
                        ]);

                        $uploaded++;
                    } catch (\Exception $e) {
                        $failed++;
                    }
                }
            }
        }

        $message = "Bulk upload completed: {$uploaded} items uploaded successfully.";
        if ($failed > 0) {
            $message .= " {$failed} items failed to upload.";
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', $message);
    }
}


