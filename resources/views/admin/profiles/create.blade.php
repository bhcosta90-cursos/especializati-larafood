@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    {{ Breadcrumbs::render('admin.profiles.create') }}
    <hr />
    <h1>Cadastrar novo perfil</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
