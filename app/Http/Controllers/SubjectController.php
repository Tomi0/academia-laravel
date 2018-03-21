<?php

namespace App\Http\Controllers;

use App\Document;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function show(Subject $subject)
    {
        $docs = Document::where('subject_id', $subject->id)->get();

        return view('subject.show',  [
            'docs' => $docs,
            'subjectName' => $subject->name
        ]);
    }
}
