<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class BoilerInspectorateController extends Controller
{
    private const BASE_URL = 'https://swsapi.cgstate.gov.in/ExternalService';

    public function boilerList(): JsonResponse
    {
        return $this->fetch('/GetBoilerListRpt', 'boiler data');
    }

    public function boilerErectorDetails(): JsonResponse
    {
        return $this->fetch('/GetBoilerErectordetailsRpt', 'erector details');
    }

    public function boilerManufacturerDetails(): JsonResponse
    {
        return $this->fetch('/GetBoilerManufacturerdetailsRpt', 'manufacturer details');
    }

    public function boilerBoeList(): JsonResponse
    {
        return $this->fetch('/GetBoilerBoeListRpt', 'BOE list');
    }

    private function fetch(string $endpoint, string $label): JsonResponse
    {
        try {
            $response = Http::timeout(20)
                ->withHeaders($this->defaultHeaders())
                ->get(self::BASE_URL . $endpoint);

            if ($response->failed()) {
                return $this->error($label, 502);
            }

            $data = $response->json('data') ?: [];

            return response()->json([
                'success' => true,
                'data' => $data,
                'total' => count($data),
            ]);
        } catch (\Throwable $e) {
            return $this->error($label, 500);
        }
    }

    private function error(string $label, int $status): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => "Unable to fetch {$label} at this time.",
            'data' => [],
        ], $status);
    }

    private function defaultHeaders(): array
    {
        return [
            'accept' => 'application/json, text/plain, */*',
            'accept-language' => 'en-US,en;q=0.9,hi;q=0.8',
            'origin' => 'https://invest.cg.gov.in',
            'referer' => 'https://invest.cg.gov.in/',
            'user-agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36',
        ];
    }
}
