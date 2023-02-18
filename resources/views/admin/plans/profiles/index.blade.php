@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{-- {{ Breadcrumbs::render('admin.profiles.permissions.index', $id, $title) }} --}}
    <hr />
    <h1>Perfis do plano</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')
            {!! form($form) !!}
        </div>
    </div>
@stop
