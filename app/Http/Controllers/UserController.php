<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $myCourses = User::find(auth()->user()->id)->course;
        return view('user', compact('myCourses'));
    }
}
