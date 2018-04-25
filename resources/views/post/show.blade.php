@extends('layouts.layout')

@section('meta-title')
    {{ $post->title }}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{ $post->subject->name }} en {{ $post->subject->category->name }}</h4>
                    </div>
                    <div class="col-lg-5 text-right">
                        <a href="{{ route('post') }}" class="btn btn-primary mini-margen-bot">Volver</a>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">{{ $post->user->name }} at {{ $post->created_at->format('M d Y H:i') }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        {!! $post->contenido !!}
                        <a href="{{ route('document.show', $post->document) }}" target="_blank">Ver documento</a>
                        <br />
                        <a href="#">Responder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection