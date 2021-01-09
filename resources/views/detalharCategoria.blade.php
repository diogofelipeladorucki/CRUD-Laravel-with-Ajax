@extends('layout.app', ["current" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form>
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" 
                        value="{{ $categoria->nome }}" id="nomeCategoria" placeholder="Categoria" disabled>
                </div>
            </form>
        </div>
    </div>
@endsection