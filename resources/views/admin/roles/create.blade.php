@extends('adminlte::page')

@section('title', 'Cadastro de nova cargo')

@section('content_header')
    {{ Breadcrumbs::render('admin.roles.create') }}
    <hr />
    <h1>Cadastrar novo cargo</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
