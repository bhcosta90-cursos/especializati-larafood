@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    {{ Breadcrumbs::render('admin.permissions.create') }}
    <hr />
    <h1>Cadastrar nova permissão</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
