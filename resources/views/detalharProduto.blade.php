@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" 
                        value="{{ $produto->nome }}" id="nomeProduto" placeholder="Produto" disabled>
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" 
                        value="{{ $produto->estoque }}" id="estoque" placeholder="Estoque" disabled>
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco" 
                        value="{{ $produto->preco }}" placeholder="Preço" disabled>
                    <label for="categoria">Categoria</label>
                    <input type="text" class="form-control" id="categoria" name="categoria" 
                        value="{{ $produto->categoria->nome }}" placeholder="Categoria" disabled>
                </div>
            </form>
        </div>
    </div>
@endsection