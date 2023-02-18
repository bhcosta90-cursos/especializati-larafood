@extends('adminlte::page')

@section('title', 'Cadastro de novo usuário')

@section('content_header')
    {{ Breadcrumbs::render('admin.profiles.create') }}
    <hr />
    <h1>Cadastrar novo usuário</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
