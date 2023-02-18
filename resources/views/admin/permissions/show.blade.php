@extends('adminlte::page')

@section('title', 'Detalhe da permissão')

@section('content_header')
    {{ Breadcrumbs::render('admin.permissions.show', $rs->id, $rs->name) }}
    <hr />
    <h1>Detalhe da permissão - <strong>{{ $rs->name }}</strong></h1>
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

    @if($rs->profiles->count())
        <div class='card'>
            {{-- <div class='card-header'><h4><a href="{{ route('admin.plan.detail.index', $rs->url) }}">Detalhes do plano</a></h4></div> --}}
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
