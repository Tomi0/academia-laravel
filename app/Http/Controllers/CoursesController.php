<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {

        $courses = Course::where('course_id', null)->get();

        return view('course.show', compact('courses'));
    }

    public function show(Course $course)
    {

        $courses = Course::where('course_id', $course->id)->get();

        if (!isset($courses[0])) {
            $subjects = Subject::where('course_id', $course->id)->get();
            return view('course.show', compact('subjects'));
        }

        return view('course.show',compact('courses'));
    }
}
