<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        $projects = Project::orderByDesc('featured')
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return response()->json([
            'success' => true,
            'data'    => $projects->map(fn($p) => [
                'id'          => $p->id,
                'title'       => $p->title,
                'subtitle'    => $p->subtitle,
                'description' => $p->description,
                'tech'        => $p->tech,
                'github_url'  => $p->github_url,
                'live_url'    => $p->live_url,
                'image_url'   => $p->image_url,
                'featured'    => $p->featured,
            ]),
        ]);
    }
}
