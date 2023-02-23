@extends('adminlte::page')

@section('title', 'Detalhe do usuário')

@section('content_header')
    {{ Breadcrumbs::render('admin.users.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do usuário - <strong>{{ $rs->name }}</strong></h1>
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
                    <strong>E-mail: </strong> {{ $rs->email }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.users.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>
@stop
