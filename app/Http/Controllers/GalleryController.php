<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $imagesPerPage = 16;
        $videosPerPage = 8;

        $imagePage = max((int) $request->query('image_page', 1), 1);
        $videoPage = max((int) $request->query('video_page', 1), 1);

        $imageQuery = GalleryItem::visible()
            ->images()
            ->orderByDesc('published_at')
            ->orderByDesc('display_order')
            ->orderByDesc('id');

        $videoQuery = GalleryItem::visible()
            ->videos()
            ->orderByDesc('published_at')
            ->orderByDesc('display_order')
            ->orderByDesc('id');

        $totalImages = (clone $imageQuery)->count();
        $totalVideos = (clone $videoQuery)->count();

        $images = (clone $imageQuery)
            ->skip(($imagePage - 1) * $imagesPerPage)
            ->take($imagesPerPage)
            ->get();

        $videos = (clone $videoQuery)
            ->skip(($videoPage - 1) * $videosPerPage)
            ->take($videosPerPage)
            ->get();

        return view('pages.gallery', [
            'images' => $images,
            'videos' => $videos,
            'imagePagination' => [
                'current' => $imagePage,
                'total' => max(1, (int) ceil($totalImages / $imagesPerPage)),
                'per_page' => $imagesPerPage,
            ],
            'videoPagination' => [
                'current' => $videoPage,
                'total' => max(1, (int) ceil($totalVideos / $videosPerPage)),
                'per_page' => $videosPerPage,
            ],
        ]);
    }
}
