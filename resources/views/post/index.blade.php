@extends('layouts.layout')

@section('meta-title')
    Posts
@endsection

@section('content')

    <div class="container">

        <h3>Posts recientes de tus asignaturas:</h3>

        @if(isset($posts) && count($posts) > 0)

            @foreach($posts as $post)

                <div class="row">
                    <div class="col-lg-12">

                        <h5>{{ $post->document->subject->name }} en {{ $post->document->subject->category->name }}</h5>

                        <div class="card">
                            <div class="card-header">
                                {{ $post->user->name }}
                                <span class="text-muted text-right"> at {{ $post->created_at->format('M d Y H:i') }}</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->contenido }}</p>
                                <a href="{{ route('document.show', $post->document) }}" target="_blank" class="">Ver documento</a>
                                <br />
                                <a href="{{ route('post.show', $post) }}" class="">Ver más</a>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>

            @endforeach
        @else

            <p>No hay posts.</p>

        @endif

        <div class="row justify-content-center">
            <div class="col-md-5">
                {{ $posts->links() }}
            </div>
        </div>

    </div>

@endsection