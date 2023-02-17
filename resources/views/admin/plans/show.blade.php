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

            @include('admin.includes.alerts')

            <a href="{{ route('admin.plans.details.index', $rs->url) }}" class='btn btn-sm btn-outline-info'>Detalhe</a>
            {!! Form::open(['route' => ['admin.plans.destroy', $rs->url], 'method' => 'delete', 'class' => 'form-delete d-inline ml-3']) !!}
            <button type='submit' class='btn btn-outline-danger btn-sm'>
                <i class='fas fa-trash'></i>
                Deletar
            </button>
            {!! Form::close() !!}
        </div>

    </div>

    @if($rs->details->count())
        <div class='card'>
            <div class='card-header'><h4>Detalhes do plano</h4></div>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->details as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
