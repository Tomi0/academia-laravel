<?php

namespace App\Http\Controllers;

use App\Document;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function show(Subject $subject)
    {
        if (isset(auth()->user()->subjects()->where('subject_id', $subject->id)->get()[0]) || $subject->user_id === auth()->user()->id) {
            return view('subject.show', compact('subject'));
        } else {
            return view('subject.matricula', compact('subject'));
        }
    }

    public function matricular(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'matricula' => 'required|string|max:10'
        ]);

        if (isset(auth()->user()->subjects()->where('subject_id', $request->subject)->get()[0])) {
            return redirect()->back()->with('fail', 'El usuario ya se encuentra matriculado en la asignatura');
        }

        if ($request->matricula === $subject->matricula) {
            $subject->users()->attach(auth()->user()->id);
            $subject->save();
        }

        return redirect()->route('subject', $subject);
    }

    public function edit(Subject $subject)
    {
        $this->authorize('edit', $subject);

        return view('subject.edit', compact('subject'));
    }
}
