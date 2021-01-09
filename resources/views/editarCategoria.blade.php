@extends('layout.app', ["current" => "categorias"])
<style>
    #nomeCategoria{
        margin-bottom: 10px;
    }
</style>
@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/categorias/{{ $categoria->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" 
                        value="{{ $categoria->nome }}" id="nomeCategoria" placeholder="Categoria">
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                    <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
@endsection