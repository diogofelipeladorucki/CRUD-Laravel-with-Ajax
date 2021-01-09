@extends('layout.app', ["current" => "produtos"])

<style>
    #btnCadastrarProdutos{
        margin-bottom: 20px;
    }
</style>

@section('body')
<div class="card border">
    <div class="card-body">
        {{-- <div class="card-footer"> --}}
            <h5 class="title float-left">Cadastro de Produtos</h5>
            <a href="/produtos/novo" id="btnCadastrarProdutos" class="btn btn-primary btn-sm float-right" role="button">Novo Produto</a>

        {{-- </div> --}}
        @if (count($produtos) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>
                        <a href="/produtos/{{ $produto->id }}" class="btn btn-success btn-sm">Detalhar</a>
                        <a href="/produtos/editar/{{ $produto->id }}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="/produtos/apagar/{{ $produto->id }}" class="btn btn-primary btn-sm">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection