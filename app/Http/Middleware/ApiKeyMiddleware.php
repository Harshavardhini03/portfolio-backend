<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Validate the X-API-Key header.
     * If API_KEY env is empty, all requests are allowed (dev mode).
     */
    public function handle(Request $request, Closure $next): Response
    {
        $configuredKey = config('app.api_key');

        // Skip validation if no key is configured (local dev)
        if (empty($configuredKey)) {
            return $next($request);
        }

        $providedKey = $request->header('X-API-Key');

        if ($providedKey !== $configuredKey) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Invalid or missing API key.',
            ], 401);
        }

        return $next($request);
    }
}
