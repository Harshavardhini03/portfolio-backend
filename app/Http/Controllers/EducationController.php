<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
    public function index(): JsonResponse
    {
        $education = Education::orderByDesc('year')->get();

        return response()->json([
            'success' => true,
            'data'    => $education,
        ]);
    }
}
