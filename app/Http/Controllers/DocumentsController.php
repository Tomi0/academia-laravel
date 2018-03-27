<?php

namespace App\Http\Controllers;

use App\Document;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentsController extends Controller
{
    public function show(Document $document)
    {
        if (isset(auth()->user()->subjects()->where('subject_id', $document->subject->id)->get()[0]) || $document->subject()->user_id === auth()->user()->id) {
            return response()->file('/var/www/academia/storage/app/public/' . $document->url);
        } else {
            abort(403);
        }
    }

    public function destroy(Document $document)
    {
        if ($document->subject->user_id == auth()->user()->id || auth()->user()->getRoleNames()[0] === 'admin') {
            $document->delete();

            return redirect()->back()->with('success', 'Documento eliminado');
        } else {
            abort(404);
        }
    }

    public function store(Request $request, Subject $subject)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'required|max:200',
            'document-file' => 'required|mimes:pdf'
        ]);

        $doc = new Document();
        $doc->name = $request->name;
        $doc->description = $request->description;
        $doc->subject_id = $subject->id;
        $doc->url = request()->file('document-file')->store('documents','public');

        $doc->save();

        return redirect()->back()->with('success', 'Documento guardado');
    }
}
