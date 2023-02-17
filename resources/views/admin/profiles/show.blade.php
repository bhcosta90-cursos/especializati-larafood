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
            <a href="{{ route('admin.profiles.permissions.index', $rs->id) }}" class='btn btn-sm btn-outline-primary'><i class='fas fa-lock'></i></a>
            {!! Form::open(['route' => ['admin.profiles.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline ml-3']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>

    @if($rs->permissions->count())
        <div class='card'>
            <div class='card-header'><h4>Permissão do perfil</h4></div>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @if($rs->plans->count())
        <div class='card'>
            <div class='card-header'><h4>Planos do perfil</h4></div>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->plans as $plans)
                    <tr>
                        <td>{{ $plans->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
