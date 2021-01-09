@extends('layout.app', ["current" => "home"])

@section('body')
    <div class="jumbotron bg-light border border-secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui cadastra produtos. Só não se esqueça de cadastrar suas categorias
                        </p>
                        <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Ctegorias</h5>
                        <p class="card-text">
                            Aqui cadastra categorias
                        </p>
                        <a href="/categorias" class="btn btn-primary">Cadastre seus categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection