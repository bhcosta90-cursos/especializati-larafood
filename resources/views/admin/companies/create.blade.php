@extends('adminlte::page')

@section('title', 'Cadastro de nova empresa')

@section('content_header')
    {{ Breadcrumbs::render('admin.companies.create') }}
    <hr />
    <h1>Cadastrar nova empresa</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
