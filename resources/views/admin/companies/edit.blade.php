@extends('adminlte::page')

@section('title', 'Editar empresa')

@section('content_header')
    {{ Breadcrumbs::render('admin.companies.edit', $form->getModel()->id, $form->getModel()->name) }}
    <hr />
    <h1>Editar empresa</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
