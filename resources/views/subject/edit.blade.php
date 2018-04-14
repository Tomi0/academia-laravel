@extends('layouts.layout')

@section('meta-title')
    Editar asignatura
@endsection

@section('content')

        <div class="container">

            @include('partials.messages')

            <h3>Edición de {{ $subject->name }} en el curso {{ $subject->category->name }}:</h3>
                <a href="{{ route('subject', $subject) }}" class="btn btn-info mini-margen-bot">Volver</a>

            <div class="card">
                <div class="card-header">
                    Documentos
                </div>
                <div class="card-body">

                    @if(isset($subject->documents) && count($subject->documents) > 0)

                        <table class="table text-center">

                            <tr>
                                <th>Nombre</th>
                                <th>Descrición</th>
                                <th>Acciones</th>
                            </tr>

                            @foreach($subject->documents as $document)

                                <tr>
                                    <td>{{ $document->name }}</td>
                                    <td>{{ $document->description }}</td>
                                    <td>

                                        <a href="{{ route('document.show', $document) }}" target="_blank" class="btn btn-xs btn-primary mini-margen-bot">Ver</a>

                                        <form action="{{ route('document.delete', $document) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}

                                            <button href="{{ route('document.show', $document) }}" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quire eliminar el documento?');">Eliminar</button>

                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                        </table>

                    @else

                        <strong>No hay documentos en esta asignatura</strong>

                    @endif

                </div>
            </div>

            <hr>

            <strong>Nuevo documento:</strong>

            <form action="{{ route('document.store', $subject) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="nombre del documento" value="{{ old('name') }}">
                    {!! $errors->first('name', '<span class="help-block text-danger">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Descripción</label>
                    <textarea type="text" name="description" id="description" class="form-control" placeholder="descripción del documento">{{ old('description') }}</textarea>
                    {!! $errors->first('description', '<span class="help-block text-danger">:message</span>') !!}
                </div>

                <div class="form-group {{ $errors->has('document-file') ? 'has-error' : '' }}">
                    <label for="exampleFormControlFile1">Documento</label>
                    <input type="file" class="form-control-file" name="document-file" id="exampleFormControlFile1">
                    {!! $errors->first('document-file', '<span class="help-block text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Crear documento</button>
                </div>

            </form>

        </div>

@endsection