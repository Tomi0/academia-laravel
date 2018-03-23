<?php

namespace App\Http\Controllers;

use App\Document;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function show(Subject $subject)
    {
        if (isset(auth()->user()->subjects()->where('subject_id', $subject->id)->get()[0])) {
            $docs = Document::where('subject_id', $subject->id)->get();

            return view('subject.show',  [
                'docs' => $docs,
                'subjectName' => $subject->name
            ]);
        } else {
            return view('subject.matricula', compact('subject'));
        }
    }

    public function matricular(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'matricula' => 'required|string|max:10'
        ]);

        if ($request->matricula === $subject->matricula) {
            $subject->users()->attach(auth()->user()->id);
            $subject->save();


        }

        return redirect()->route('subject', $subject);
    }
}
