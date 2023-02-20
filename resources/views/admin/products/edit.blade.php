@extends('adminlte::page')

@section('title', 'Editar produto')

@section('content_header')
    {{ Breadcrumbs::render('admin.products.edit', $form->getModel()->id, $form->getModel()->title) }}
    <hr />
    <h1>Editar produto</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
