@extends('admin.layouts.layout')

@section('meta-title')
    Editar usuario
@endsection

@section('meta-title-header')
    Editar usuario existente
@endsection

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    Formulario de edición de usuarios
                </div>

                <div class="panel-body">

                    <form action="{{ route('admin.user.update', $user) }}" method="POST">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label" for="name">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="introduce el nombre" value="{{ old('name', $user->name) }}">
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label class="control-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="introduce el email" value="{{ old('email', $user->email) }}">
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label class="control-label" for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="introduce contraseña">
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Verificado</label>
                                    <select class="form-control" name="verified">
                                        <option value="1" {{ old('verified', $user->verified) == 1 ? 'selected' : '' }}>Si</option>
                                        <option value="0" {{ old('verified', $user->verified) == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">Editar usuario</button>
                                <a href="{{ route('admin.user') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection