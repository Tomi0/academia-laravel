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
        $this->authorize('view', $document);

        return response()->file('/var/www/academia/storage/app/public/' . $document->url);
    }

    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);

        $document->delete();

        return redirect()->back()->with('success', 'Documento eliminado');
    }

    public function store(Request $request, Subject $subject)
    {
        //$this->authorize('create');

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'max:200',
            'document-file' => 'required|mimes:pdf'
        ]);

        Document::create($request->all());

        return redirect()->back()->with('success', 'Documento guardado');
    }
}
