@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')
    {{ Breadcrumbs::render('admin.companies.index') }}
    <hr />
    <h1>Empresa</h1>
@stop

@section('content')
    <div class='card'>
        <div class='card-header'>
            <form class='form form-inline'>
                <div class="input-group">
                    {!! Form::text('search', request('search'), ['class' => 'form-control', 'placeholder' => 'Nome, url, CNPJ ou e-mail']) !!}
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
                        <th width="100">Imagem</th>
                        <th>Nome</th>
                        <th>URL</th>
                        <th>E-mail</th>
                        <th>CNPJ</th>
                        <th style='width:120px'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>
                            <img src="{{ url("storage/{$profile->logo}") }}" alt="{{ $profile->title }}" style="max-width: 90px;">
                        </td>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->url }}</td>
                        <td>{{ $profile->email }}</td>
                        <td>{{ $profile->cnpj }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.companies.show', $profile->id) }}" class='btn btn-sm btn-outline-warning'>Ver</a>
                                <a href="{{ route('admin.companies.edit', $profile->id) }}" class='btn btn-sm btn-outline-info'>Editar</a>
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
