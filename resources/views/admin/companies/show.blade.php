@extends('adminlte::page')

@section('title', 'Detalhe do empresa')

@section('content_header')
    {{ Breadcrumbs::render('admin.companies.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do empresa - <strong>{{ $rs->title }}</strong></h1>
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
                    <strong>Documento: </strong> {{ $rs->cnpj }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $rs->email }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.companies.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
