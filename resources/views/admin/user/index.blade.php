@extends('admin.layouts.layout')

@section('meta-title')

    Administrar usuarios

@endsection

@section('meta-title-header')

    Usuarios

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Todos los usuarios
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->verified ? 'Si' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('admin.user.destroy', $user) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button href="{{ route('admin.user.destroy', $user) }}" class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quiere eliminar este usuario?')">
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
        </div>

        <div class="col-lg-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Usuarios sin verificar
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verify</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                                @if(!$user->verified)

                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.update', $user) }}" class="btn btn-info btn-circle mini-margen-bot">
                                                <i class="fa fa-check"></i>
                                            </a>

                                            <form action="{{ route('admin.user.destroy', $user) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button href="{{ route('admin.user.destroy', $user) }}" class="btn btn-warning btn-circle" onclick="return confirm('El usuario no verificado será eliminado, ¿Está seguro?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endif

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>

    </div>

@endsection