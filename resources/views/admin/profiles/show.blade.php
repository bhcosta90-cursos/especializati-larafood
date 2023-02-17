@extends('adminlte::page')

@section('title', 'Detalhe do Perfil')

@section('content_header')
    {{ Breadcrumbs::render('admin.profiles.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do Perfil - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')
            {!! Form::open(['route' => ['admin.profiles.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
            <button type='submit' class='btn btn-outline-danger'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>

    </div>
@stop
