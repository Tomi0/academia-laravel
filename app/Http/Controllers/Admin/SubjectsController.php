<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectsController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();

        return view('admin.subject.index', compact('subjects'));
    }

    public function destroy(Subject $subject)
    {
        $subject->documents()->delete();

        $subject->delete();

        return redirect()->route('admin.subject')->with('success', 'Asignatura eliminada correctamente');
    }

    public function create()
    {
        $courses = Course::whereNotNull('course_id')->orWhere('name', 'PAU')->get();
        $profesores = User::role('profesor')->get();

        return view('admin.subject.create', compact('courses', 'profesores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'course_id' => 'required',
            'user_id' => 'required'
        ]);

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->course_id = $request->course_id;
        $subject->user_id = $request->user_id;
        $subject->matricula = str_random(10);

        $subject->save();

        return redirect()->back()->with('success', 'Asignatura creada con exito');
    }

    public function edit(Subject $subject)
    {
        $courses = Course::whereNotNull('course_id')->orWhere('name', 'PAU')->get();
        $profesores = User::role('profesor')->get();

        return view('admin.subject.edit', compact('subject', 'courses', 'profesores'));
    }

    public function update(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'course_id' => 'required',
            'user_id' => 'required'
        ]);

        $subject->name = $request->name;
        $subject->course_id = $request->course_id;
        $subject->user_id = $request->user_id;
        $subject->update();

        return redirect()->back()->with('success', 'Se editado la asignatura correctamente.');
    }
}
