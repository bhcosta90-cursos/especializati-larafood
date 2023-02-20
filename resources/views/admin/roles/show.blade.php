@extends('adminlte::page')

@section('title', 'Detalhe do cargo')

@section('content_header')
    {{ Breadcrumbs::render('admin.roles.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe do cargo - <strong>{{ $rs->name }}</strong></h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-body'>
            @include('admin.includes.alerts')

            <ul>
                <li>
                    <strong>Nome: </strong> {{ $rs->name }}
                </li>
            </ul>

            {!! Form::open(['route' => ['admin.roles.destroy', $rs->id], 'method' => 'delete', 'class' => 'form-delete d-inline']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>
    </div>

    @if($rs->permissions->count())
        <div class='card'>
            <div class='card-header'><h4>Permissões do cargo</h4></div>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->permissions as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
