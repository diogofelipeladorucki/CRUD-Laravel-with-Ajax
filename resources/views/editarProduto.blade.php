@extends('layout.app', ["current" => "produtos"])

<style>
    #categoria{
        margin-bottom: 10px;
    }
</style>

@section('body')
    <div class="card border">
        <div class="card-body">
            <form  action="/produtos/{{ $produto->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nome" id="nomeProduto" placeholder="Produto" value="{{ $produto->nome }}">
                    <label for="estoque">Estoque</label>
                    <input type="text" class="form-control" name="estoque" id="estoque" placeholder="Estoque" value="{{ $produto->estoque }}">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control" id="preco" name="preco" placeholder="Preço" value="{{ $produto->preco }}">
                    <label for="categoria">Categoria</label>
                    <select class="form-control" name="idCategoria" id="categoria">
                        @foreach ($categorias as $categoria)
                            @if ($categoria->id == $produto->categoria_id)
                            <option selected value="{{ $categoria->id }}">{{ $categoria->nome }}</option>   
                            @else
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endif
                        @endforeach
                      </select>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection