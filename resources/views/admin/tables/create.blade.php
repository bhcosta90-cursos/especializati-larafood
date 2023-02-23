@extends('adminlte::page')

@section('title', 'Cadastro de nova mesa')

@section('content_header')
    {{ Breadcrumbs::render('admin.tables.create') }}
    <hr />
    <h1>Cadastrar nova mesa</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
