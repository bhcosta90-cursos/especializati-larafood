@extends('adminlte::page')

@section('title', 'Detalhe do categoria')

@section('content_header')
    {{ Breadcrumbs::render('admin.categories.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do categoria - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')

            <ul>
                <li>
                    <strong>Nome: </strong> {{ $rs->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $rs->url }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $rs->description }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.categories.destroy', $rs->url], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
