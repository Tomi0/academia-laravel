@extends('admin.layouts.layout')

@section('meta-title-header')

    Dashboard

@endsection

@section('content')

    <div class="row">
        <div class="col">
            <h2>Usuario autenticado: {{ auth()->user()->name }}</h2>
        </div>
    </div>

@endsection