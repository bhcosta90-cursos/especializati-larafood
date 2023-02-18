@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.edit', $form->getModel()->url, $form->getModel()->name) }}
    <hr />
    <h1>Editar plano</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            {!! form($form) !!}
        </div>
    </div>
@stop
