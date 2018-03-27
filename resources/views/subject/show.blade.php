@extends('layouts.layout')

@section('meta-title')
    {{ $subject->name }}
@endsection

@section('content')

    <div class="container">

        <h2>{{ $subject->course->name }}: {{ $subject->name }}</h2>

        @if(auth()->user()->getRoleNames()[0] === 'profesor')
            <a href="{{ route('subject.edit', $subject) }}" class="btn btn-secondary">Editar asignatura</a>
        @endif

        @if(isset($subject->documents) && count($subject->documents) > 0)

            <div class="list-group margen-arriba">
                @foreach($subject->documents as $doc)

                    <a href="{{ route('document.show', $doc) }}" class="list-group-item list-group-item-action">{{ $doc->name }}</a>

                @endforeach
            </div>

        @else

            <h3 class="margen-arriba">No hay documentos en esta asignatura</h3>

        @endif
    </div>

@endsection