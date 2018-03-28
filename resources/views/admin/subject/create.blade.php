@extends('admin.layouts.layout')

@section('meta-title')
    Crear asignatura
@endsection

@section('meta-title-header')
    Crear una asignatura
@endsection

@section('content')

    <div class="panel panel-green">
        <div class="panel-heading">
            Crear una asignatura
        </div>
        <div class="panel-body">

            <form action="{{ route('admin.subject.store') }}" method="POST">
                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-lg-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name">Nombre de la asignatura</label>
                        <input type="text" name="name" id="name" placeholder="introduzca un nombre" class="form-control">
                        {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group col-lg-6 {{ $errors->has('course_id') ? 'has-error' : '' }}">
                        <label for="course_id">Curso</label>
                        <select name="course_id" id="course_id" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('course_id', '<span class="help-block text-danger">:message</span>') !!}
                    </div>
                </div>

                <div class="row">

                    <div class="form-group col-lg-3 {{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="user_id" class="control-label">Profesor:</label>
                    </div>
                    <div class="form-group col-lg-9">
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($profesores as $profesor)
                                <option value="{{ $profesor->id }}">{{ $profesor->name }}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('user_id', '<span class="help-block text-danger">:message</span>') !!}
                    </div>

                </div>

                <div class="row">
                    <div class="form-group">
                        <button class="btn btn-primary margen-izquierda-normal">Crear</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection