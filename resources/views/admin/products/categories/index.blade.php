@extends('adminlte::page')

@section('title', 'Cadastro de nova produto')

@section('content_header')
    {{ Breadcrumbs::render('admin.products.create') }}
    <hr />
    <h1>Vincular categoria</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
