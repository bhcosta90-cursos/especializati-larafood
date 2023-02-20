@extends('adminlte::page')

@section('title', 'Detalhe do mesa')

@section('content_header')
    {{ Breadcrumbs::render('admin.tables.show', $rs->id, $rs->identify) }}
    <hr />
    <h1>Detalhe do mesa - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')

            <ul>
                <li>
                    <strong>Identificador: </strong> {{ $rs->identify }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $rs->description }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.tables.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
