@extends('adminlte::page')

@section('title', 'Produto')

@section('content_header')
    {{ Breadcrumbs::render('admin.products.index') }}
    <hr />
    <h1>
        Produto
        <a class='btn btn-outline-primary' href="{{ route('admin.products.create') }}">
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
                        <th>Título</th>
                        <th width="100">Imagem</th>
                        <th style='width:120px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>
                            <img src="{{ url("storage/{$profile->image}") }}" alt="{{ $profile->title }}" style="max-width: 90px;">
                        </td>
                        <td>{{ $profile->title }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.products.categories.index', $profile->id) }}" class='btn btn-sm btn-outline-info'>Categorias</a>
                                <a href="{{ route('admin.products.show', $profile->id) }}" class='btn btn-sm btn-outline-warning'>Ver</a>
                                <a href="{{ route('admin.products.edit', $profile->id) }}" class='btn btn-sm btn-outline-info'>Editar</a>
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
