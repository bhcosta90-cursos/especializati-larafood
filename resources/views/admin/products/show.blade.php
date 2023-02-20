@extends('adminlte::page')

@section('title', 'Detalhe do produto')

@section('content_header')
    {{ Breadcrumbs::render('admin.products.show', $rs->id, $rs->title) }}
    <hr />
    <h1>Detalhe do produto - <strong>{{ $rs->title }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')

            <ul>
                <li>
                    <strong>Título: </strong> {{ $rs->title }}
                </li>
                <li>
                    <strong>FLAG: </strong> {{ $rs->flag }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $rs->description }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.products.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
