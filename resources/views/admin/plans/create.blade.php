@extends('adminlte::page')

@section('title', 'Cadastro de plano')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.create') }}
    <hr />
    <h1>Cadastrar novo plano</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
