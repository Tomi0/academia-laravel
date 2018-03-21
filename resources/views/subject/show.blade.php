@extends('layouts.layout')

@section('meta-title')
    {{ $subjectName }}
@endsection

@section('content')

    <section>
        <div class="container">

            <h2>{{ $subjectName }}</h2>

            @if(isset($docs) && count($docs) > 0)



                <div class="list-group margen-arriba">
                    @foreach($docs as $doc)

                        <a href="{{ route('document.show', $doc) }}" class="list-group-item list-group-item-action">{{ $doc->name }}</a>

                    @endforeach
                </div>

            @else

                <h3>No hay documentos en esta asignatura</h3>

            @endif
        </div>
    </section>

@endsection