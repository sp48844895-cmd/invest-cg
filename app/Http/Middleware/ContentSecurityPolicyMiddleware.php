<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicyMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        /** @var \Symfony\Component\HttpFoundation\Response $response */
        $response = $next($request);

        // Remove any existing CSP that may block YouTube iframes or other needed resources.
        $response->headers->remove('Content-Security-Policy');
        $response->headers->remove('Content-Security-Policy-Report-Only');

        // Set only frame-src — no default-src so external CDN resources are not blocked.
        $response->headers->set(
            'Content-Security-Policy',
            "frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://pmgatishakti.gov.in https://cggis.cgstate.gov.in"
        );

        return $response;
    }
}
