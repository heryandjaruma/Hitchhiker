<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $course = Course::find($id);
        $materials = Course::find($id)->materials;
        $recommended = Course::inRandomOrder()->limit(4)->get();
        return view('detail', compact('course','materials','recommended'));
    }

    public function enroll($id)
    {
        $newEnroll = new UserCourse();
        $chosen = Course::find($id);

        $newEnroll->user_id = auth()->user()->id;
        $newEnroll->course_name = $chosen->course_name;
        $newEnroll->course_description = $chosen->course_description;
        $newEnroll->course_period = $chosen->course_period;
        $newEnroll->price = $chosen->price;
        $newEnroll->image = $chosen->image;

        $newEnroll->save();

        return redirect('index')->with('success', 'Sucessfully Enrolled Course!');
    }
}
