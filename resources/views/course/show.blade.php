@extends('layouts.layout')

@section('meta-title')

    Cursos

@endsection

@section('content')

    <section>
        <div class="container">

            @if(isset($courses) && count($courses) > 0)

                <h2>Cursos disponibles:</h2>

                <div class="list-group margen-arriba">
                    @foreach($courses as $course)

                        <a href="{{ route('course.show', $course) }}" class="list-group-item list-group-item-action" href="#">{{ $course->name }}</a>

                    @endforeach
                </div>

            @else

                <h2>Asignaturas:</h2>

                <div class="list-group margen-arriba">
                    @foreach($subjects as $subject)

                        <a href="{{ route('subject', $subject) }}" class="list-group-item list-group-item-action">{{ $subject->name }}</a>

                    @endforeach
                </div>

            @endif

        </div>
    </section>

@endsection