@extends('adminlte::page')

@section('title', 'Editar cargo')

@section('content_header')
    {{ Breadcrumbs::render('admin.roles.edit', $form->getModel()->id, $form->getModel()->name) }}
    <hr />
    <h1>Editar cargo</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
