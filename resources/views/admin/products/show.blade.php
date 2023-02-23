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

    @if($rs->categories->count())
        <div class='card'>
            <div class='card-header'><h4>Categorias do produto</h4></div>
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs->categories as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@stop
