<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\JsonResponse;

class SkillController extends Controller
{
    public function index(): JsonResponse
    {
        $skills = Skill::orderBy('category_order')
            ->orderBy('level', 'desc')
            ->get();

        // Group by category and reshape for frontend
        $grouped = $skills
            ->groupBy('category')
            ->map(function ($items, $category) {
                return [
                    'category' => $category,
                    'color'    => $items->first()->color,
                    'items'    => $items->map(fn($s) => [
                        'name'  => $s->name,
                        'level' => $s->level,
                    ])->values(),
                ];
            })
            ->values();

        return response()->json([
            'success' => true,
            'data'    => $grouped,
        ]);
    }
}
