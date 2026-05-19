<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\JsonResponse;

class ExperienceController extends Controller
{
    public function index(): JsonResponse
    {
        $experience = Experience::orderByDesc('is_current')
            ->orderByDesc('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $experience->map(fn($e) => [
                'id'          => $e->id,
                'company'     => $e->company,
                'role'        => $e->role,
                'start_date'  => $e->start_date,
                'end_date'    => $e->end_date,
                'is_current'  => $e->is_current,
                'location'    => $e->location,
                'description' => $e->description,
            ]),
        ]);
    }
}
