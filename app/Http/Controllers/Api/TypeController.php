<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(4);
        return response()->json([
            'success' => true,
            'results' => $types,
        ]);
    }

    public function show($slug)
    {
        $types = Type::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $types,
        ]);
    }
}
