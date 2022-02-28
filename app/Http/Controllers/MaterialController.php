<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index($id)
    {
        $materials = Course::find($id)->material;
        return view('detail', compact('materials'));
    }
}
