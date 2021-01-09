@extends('layout.app', ["current" => "categorias"])
<style>
    #btnCadastrarCategorias{
        margin-bottom: 20px;
    }
</style>
@section('body')
<div class="card border">
    <div class="card-body">
        {{-- <div class="card-footer"> --}}
            <h5 class="title float-left">Cadastro de Categorias</h5>
            <a href="/categorias/novo" id="btnCadastrarCategorias" class="btn btn-primary btn-sm float-right" role="button">Nova Categoria</a>

        {{-- </div> --}}
        @if (count($categorias) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>
                        <a href="/categorias/{{ $categoria->id }}" class="btn btn-success btn-sm">Detalhar</a>
                        <a href="/categorias/editar/{{ $categoria->id }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="/categorias/apagar/{{ $categoria->id }}" class="btn btn-primary btn-sm">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection