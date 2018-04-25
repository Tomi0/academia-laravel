<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        // un array con el id de las asignaturas a las que se encuentra matriculado
        $userSubjectsId = array();
        foreach (auth()->user()->subjects as $subject) {
            $userSubjectsId[] = $subject->id;
        }

        $posts = Post::whereIn('subject_id', $userSubjectsId)->whereNull('post_id')->latest()->paginate();

        return view('post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $respuestas = Post::where('post_id', $post->id)->oldest()->get();

        return view('post.show', compact('post', 'respuestas'));
    }

    public function storeRespuesta(Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'contenido' => 'required|max:250'
        ]);

        $request['post_id'] = $post->id;
        $request['document_id'] = $post->document_id;

        Post::create($request->all());

        return redirect()->back()->with('success', 'Tu comentario ha sido creado');
    }
}
