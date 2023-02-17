@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    {{ Breadcrumbs::render('admin.plans.index') }}
    <hr />
    <h1>
        Planos
        <a class='btn btn-outline-primary' href="{{ route('admin.plans.create') }}">
            <i class='fas fa-plus-square'></i>
            Cadastrar
        </a>
    </h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form class='form form-inline'>
                <div class="input-group">
                    {!! Form::text('search', request('search'), ['class' => 'form-control', 'placeholder' => 'Nome ou descrição']) !!}
                    <div class="input-group-append">
                        {!! Form::submit('Filtrar', ['class' => 'btn btn-outline-secondary']) !!}
                  </div>
                </div>
            </form>
        </div>
        <div class='card-body'>
            @include('admin.includes.alerts')
            <table class='table table-condensed'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th style='width:120px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>{{ number_format($plan->price, 2, ',', '.') }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.plans.details.index', $plan->url) }}" class='btn btn-sm btn-outline-info'>Detalhe</a>
                                <a href="{{ route('admin.plans.show', $plan->url) }}" class='btn btn-sm btn-outline-warning'>Ver</a>
                                <a href="{{ route('admin.plans.edit', $plan->url) }}" class='btn btn-sm btn-outline-info'>Editar</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($plans->lastPage() > 1)
            <div class='card-footer'>
                {!! $plans->appends(request()->all())->links() !!}
            </div>
        @endif
    </div>
@stop
