@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.detail.create', $url, $title) }}
    <hr />
    <h1>Detalhes do plano</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            {!! form($form) !!}
        </div>
        <div class='card-body'>
            @include('admin.includes.alerts')
            @if($details->count())
                <table class='table table-condensed'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th style='width:120px'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>
                            <td>
                                <div class="btn-group">
                                    {!! Form::open(['route' => ['admin.plan.detail.destroy', $url, $detail->id], 'method' => 'delete', 'class' => 'form-delete']) !!}
                                    <button type='submit' class='btn btn-outline-danger'>
                                        <i class='fas fa-trash'></i>
                                        Deletar
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
