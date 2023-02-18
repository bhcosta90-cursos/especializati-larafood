@extends('adminlte::page')

@section('title', 'Perfis do plano')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.profiles.index', $url, $title) }}
    <hr />
    <h1>Perfis do plano</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')
            {!! form($form) !!}
        </div>
    </div>
@stop
