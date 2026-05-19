<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\JsonResponse;

class AboutController extends Controller
{
    public function index(): JsonResponse
    {
        $about = About::first();

        if (! $about) {
            return response()->json([
                'success' => false,
                'message' => 'About data not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $about,
        ]);
    }
}
