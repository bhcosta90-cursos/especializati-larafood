@extends('adminlte::page')

@section('title', 'Editar categoria')

@section('content_header')
    {{ Breadcrumbs::render('admin.categories.edit', $form->getModel()->id, $form->getModel()->name) }}
    <hr />
    <h1>Editar categoria</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
