@extends('adminlte::page')

@section('title', 'Cadastro de nova categoria')

@section('content_header')
    {{ Breadcrumbs::render('admin.categories.create') }}
    <hr />
    <h1>Cadastrar nova categoria</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
