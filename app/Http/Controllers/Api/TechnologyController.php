<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::paginate(4);
        return response()->json([
            'success' => true,
            'results' => $technologies,
        ]);
    }

    public function show($slug)
    {
        $technologies = Technology::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $technologies,
        ]);
    }
}
