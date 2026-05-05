<?php

namespace App\Http\Controllers;

use App\Models\MediaUpdate;
use App\Models\PressRelease;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [];

        // Use production base URL
        $base = 'https://invest.cg.gov.in';

        // Static pages
        $urls[] = ['loc' => $base . '/', 'priority' => '1.0'];
        $urls[] = ['loc' => $base . '/gallery', 'priority' => '0.8'];
        $urls[] = ['loc' => $base . '/media-updates', 'priority' => '0.8'];
        $urls[] = ['loc' => $base . '/press-releases', 'priority' => '0.8'];
        $urls[] = ['loc' => $base . '/focus-sectors', 'priority' => '0.8'];
        $urls[] = ['loc' => $base . '/startup', 'priority' => '0.8'];
        $urls[] = ['loc' => $base . '/calculator', 'priority' => '0.7'];
        $urls[] = ['loc' => $base . '/invitation-to-invest', 'priority' => '0.6'];

        // Include PageController static slugs from routes/web.php - add common ones
        $pageSlugs = [
            'investment_promotion', 'policy-notifications', 'one-click', 'one-click-help-and-support',
            'dept-of-c-i', 'export', 'schemes', 'privacy-policy'
        ];

        foreach ($pageSlugs as $slug) {
            $urls[] = ['loc' => $base . '/' . ltrim($slug, '/'), 'priority' => '0.6'];
        }

        // Focus sectors (static list from controller)
        $sectors = [
            'agro-food-processing','ai-robotics','automobile-engineering','defence-aerospace','electronic',
            'gcc','it-ites','pharma-sector','steel','textile','tourism'
        ];

        foreach ($sectors as $s) {
            $urls[] = ['loc' => $base . '/focus-sectors/' . ltrim($s, '/'), 'priority' => '0.6'];
        }

        // Startup tabs
        $startupTabs = ['overview','policy-guidelines','startup','ecosystem','information-wizard','notification','events'];
        foreach ($startupTabs as $t) {
            $urls[] = ['loc' => $base . '/startup/' . ltrim($t, '/'), 'priority' => '0.6'];
        }

        // Dynamic press releases
        $pressReleases = PressRelease::published()->get(['slug','updated_at','published_at']);
        foreach ($pressReleases as $pr) {
            $urls[] = [
                'loc' => $base . '/press-releases/' . $pr->slug,
                'lastmod' => optional($pr->published_at ? $pr->published_at : $pr->updated_at)->toAtomString(),
                'priority' => '0.7'
            ];
        }

        // Media updates - index only (individual items link to external source_url)
        $mediaUpdates = MediaUpdate::published()->get(['published_at','updated_at']);
        foreach ($mediaUpdates as $mu) {
            $urls[] = [
                'loc' => $base . '/media-updates',
                'lastmod' => optional($mu->published_at ? $mu->published_at : $mu->updated_at)->toAtomString(),
                'priority' => '0.6'
            ];
            // We only add the index once, so break after first iteration
            break;
        }

        $xml = $this->buildXml($urls);

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    protected function buildXml(array $urls): string
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($urls as $u) {
            $url = $xml->addChild('url');
            $url->addChild('loc', htmlspecialchars($u['loc'], ENT_QUOTES | ENT_XML1));

            if (!empty($u['lastmod'])) {
                $url->addChild('lastmod', $u['lastmod']);
            }

            if (!empty($u['priority'])) {
                $url->addChild('priority', $u['priority']);
            }
        }

        // SimpleXMLElement->asXML returns full XML string
        return $xml->asXML();
    }
}
