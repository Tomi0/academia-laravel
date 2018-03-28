@extends('admin.layouts.layout')

@section('meta-title')
    Asignaturas
@endsection

@section('meta-title-header')
    Administrar asignaturas
@endsection

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Todas las asignaturas
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Pertenece a</th>
                        <th>Profesor</th>
                        <th>Matriculados</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($subjects as $subject)

                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->course->name }}</td>
                            <td>{{ $subject->user->name }}</td>
                            <td>{{ count($subject->users) }}</td>
                            <td>
                                <a href="{{ route('admin.subject.edit', $subject) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('admin.subject.destroy', $subject) }}" method="POST" style="display: inline;">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button href="{{ route('admin.subject.destroy', $subject) }}" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere eliminar esta asignatura? Se borrarán todos sus documentos.')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->

@endsection