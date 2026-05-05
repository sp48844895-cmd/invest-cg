<?php

namespace App\Http\Controllers;

use App\Models\PressRelease;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    public function index(Request $request)
    {
        $query = PressRelease::published();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('summary', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('tag')) {
            $query->whereJsonContains('tags', $request->tag);
        }

        $pressReleases = $query->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(12);

        // Get all unique tags for filter
        $allTags = PressRelease::published()
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return view('pages.press-releases.index', compact('pressReleases', 'allTags'));
    }

    public function show($slug)
    {
        $pressRelease = PressRelease::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $pressRelease->incrementViews();

        // Get recent press releases for sidebar
        $recentPressReleases = PressRelease::published()
            ->where('id', '!=', $pressRelease->id)
            ->recent(5)
            ->get();

        // Get all unique tags
        $allTags = PressRelease::published()
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        return view('pages.press-releases.show', compact('pressRelease', 'recentPressReleases', 'allTags'));
    }
}
