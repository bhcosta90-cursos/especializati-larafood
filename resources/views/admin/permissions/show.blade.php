@extends('adminlte::page')

@section('title', 'Detalhe do Permissão')

@section('content_header')
    {{ Breadcrumbs::render('admin.permissions.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do Permissão - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')
            {!! Form::open(['route' => ['admin.permissions.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
            <button type='submit' class='btn btn-outline-danger'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>

    </div>
@stop
