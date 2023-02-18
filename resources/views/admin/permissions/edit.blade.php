@extends('adminlte::page')

@section('title', 'Editar permissão')

@section('content_header')
    {{ Breadcrumbs::render('admin.permissions.edit', $form->getModel()->id, $form->getModel()->name) }}
    <hr />
    <h1>Editar permissão</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
