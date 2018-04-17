@extends('layouts.layout')

@section('meta-title')
    Posts
@endsection

@section('content')

    <div class="container">

        @foreach($posts as $post)

            <div class="row">
                <div class="col-lg-12">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->contenido }}</p>
                    <p>Documento: {{ $post->document_id }}</p>
                    <p>Usuario: {{ $post->user->name }}</p>
                    <p>Usuario rol: {{ $post->user->getRoleNames()[0] }}</p>
                </div>
            </div>

            <hr>

        @endforeach

        <div class="row justify-content-center">
            <div class="col-md-5">
                {{ $posts->links() }}
            </div>
        </div>

    </div>

@endsection