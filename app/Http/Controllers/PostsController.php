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

        $posts = Post::whereIn('subject_id', $userSubjectsId)->latest()->paginate();

        return view('post.index', compact('posts'));
    }
}
