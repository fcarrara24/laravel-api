<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query('type')) {
            $projects = Project::where('type_id', $request->query('type')) - paginate(6);
        } else {
            //$projects = Project::with(['type', 'technologies'])->paginate(6);
            $projects = Project::paginate(6);
        }
        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->with(['type', 'technologies'])
            ->first();
        return response()->json([
            'success' => true,
            'results' => $project,
        ]);
    }
}
