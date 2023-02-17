@extends('adminlte::page')

@section('title', 'Detalhe do Plano')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.show', $rs->url, $rs->name) }}
    <hr />
    <h1>Detalhe do Plano - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            <ul>
                <li>
                    <strong>URL: </strong> {{ $rs->url }}
                </li>
                <li>
                    <strong>Preço: </strong> {{ number_format($rs->price, 2, ',', '.') }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $rs->description ?: "-" }}
                </li>
            </ul>
        </div>
        <div class='card-footer'>
            {!! Form::open(['route' => ['admin.plans.destroy', $rs->url], 'method' => 'delete']) !!}
            <button type='submit' class='btn btn-outline-danger'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
