<?php

namespace App\Http\Controllers;

use App\Models\MediaUpdate;
use Illuminate\Http\Request;

class MediaUpdateController extends Controller
{
    public function index()
    {
        $mediaUpdates = MediaUpdate::published()
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        $newsData = $mediaUpdates->map(function (MediaUpdate $item) {
            return [
                'img' => $item->display_image ?? asset('assets/img/message_bg.jpg'),
                'date' => $item->published_label,
                'title' => $item->title,
                'desc' => $item->summary,
                'link' => $item->source_url,
            ];
        });

        return view('pages.media-updates', [
            'newsData' => $newsData,
        ]);
    }

    public function create()
    {
        return view('media-updates.create');
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

        return redirect()
            ->route('media-updates.index')
            ->with('status', 'News item submitted successfully.');
    }
}
