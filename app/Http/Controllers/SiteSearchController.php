<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        if ($query === '') {
            return response()->json([
                'results' => [],
            ]);
        }

        $q = mb_strtolower($query);
        $pages = $this->pagesWithKeywords();

        $results = [];

        foreach ($pages as $page) {
            if (
                !isset($page['title']) ||
                !isset($page['keywords']) ||
                !is_array($page['keywords'])
            ) {
                continue;
            }

            foreach ($page['keywords'] as $keyword) {
                $keyword = mb_strtolower(trim((string) $keyword));

                if ($keyword !== '' && str_contains($keyword, $q)) {
                    $results[] = [
                        'title' => $page['title'],
                        'url' => $this->generatePageUrl($page),
                    ];
                    break;
                }
            }
        }

        return response()->json([
            'results' => $results,
        ]);
    }

    private function pagesWithKeywords(): array
    {
        $path = storage_path('app/search-keywords.json');

        if (!file_exists($path)) {
            return [];
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        return is_array($data) ? $data : [];
    }

    private function generatePageUrl(array $page): string
    {
        $routeName = $page['route_name'] ?? null;
        $routeParam = $page['route_param'] ?? null;

        if (!$routeName) {
            return '#';
        }

        try {
            if ($routeParam === null) {
                return route($routeName);
            }

            return route($routeName, is_array($routeParam) ? $routeParam : [$routeParam]);
        } catch (\Throwable $e) {
            return '#';
        }
    }
}