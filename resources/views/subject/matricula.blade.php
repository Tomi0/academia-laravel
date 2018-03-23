@extends('layouts.layout')

@section('meta-title')
    Matriculación
@endsection

@section('content')

    <section class="margen-arriba-grande">
        <div class="container">

            <h3>Necesitas una clave para poder entrar en la asignatura</h3>

                <div class="matricula margen-arriba">

                    <form action="{{ route('subject.matricular', $subject) }}" method="POST">

                        {{ csrf_field() }}

                        <div class="row form-group">

                            <label class="control-label col-md-2" for="matricula">Clave: </label>

                            <input type="password" name="matricula" class="form-control col-md-6" placeholder="clave de la asignatura" id="matricula">

                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                    </form>

                </div>

        </div>
    </section>

@endsection