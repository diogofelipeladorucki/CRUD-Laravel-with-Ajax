@extends('layout.app', ["current" => "produtos"])

<style>
        #categoria{
        margin-bottom: 10px;
    }
</style>

@section('body')
    <div class="card border">
        <div class="card-body">
            <form  action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nomeProduto" placeholder="Produto" >
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" id="estoque" placeholder="Estoque" >
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço" >
                    @if (count($categorias) > 0)
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="idCategoria" id="categoria">
                        <option>Selecione uma Categoria</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                      </select>
                    @endif
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection