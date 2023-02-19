@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    {{ Breadcrumbs::render('admin.categories.index') }}
    <hr />
    <h1>
        Categoria
        <a class='btn btn-outline-primary' href="{{ route('admin.categories.create') }}">
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
                        <th style='width:120px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.categories.show', $profile->url) }}" class='btn btn-sm btn-outline-warning'>Ver</a>
                                <a href="{{ route('admin.categories.edit', $profile->url) }}" class='btn btn-sm btn-outline-info'>Editar</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($profiles->lastPage() > 1)
            <div class='card-footer'>
                {!! $profiles->appends(request()->all())->links() !!}
            </div>
        @endif
    </div>
@stop
