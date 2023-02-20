@extends('adminlte::page')

@section('title', 'Editar mesa')

@section('content_header')
    {{ Breadcrumbs::render('admin.tables.edit', $form->getModel()->id, $form->getModel()->identify) }}
    <hr />
    <h1>Editar mesa</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
