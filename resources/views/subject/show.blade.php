@extends('layouts.layout')

@section('meta-title')
    {{ $subject->name }}
@endsection

@section('content')

    <div class="container">

        <h2>{{ $subject->category->name }}: {{ $subject->name }}</h2>

        @if($subject->user_id === auth()->user()->id)
            <a href="{{ route('subject.edit', $subject) }}" class="btn btn-secondary">Editar asignatura</a>
        @endif

        @if(isset($subject->documents) && count($subject->documents) > 0)

            <div class="card margen-arriba">
                <div class="card-header">
                    Documentos de la asignatura:
                </div>
                <div class="card-body">

                    @foreach($subject->documents as $doc)

                        <p><a href="{{ route('document.show', $doc) }}" target="_blank">{{ $doc->name }}</a></p>

                        <p>{{ $doc->description }}</p>

                        <a href="{{ route('document.show', $doc) }}" target="_blank" class="btn btn-primary">Ver documento</a>

                        <hr />

                    @endforeach

                </div>
            </div>

        @else

            <h3 class="margen-arriba">No hay documentos en esta asignatura</h3>

        @endif
    </div>

@endsection