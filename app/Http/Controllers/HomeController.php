<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $trending = Course::inRandomOrder()->limit(8)->get();
        if (Auth::user()) {
            $myCourses = User::find(auth()->user()->id)->course;
            return view('/index', compact('courses','myCourses','trending'));
        } else {
            return view('/index', compact('courses','trending'));
        }
    }
}
