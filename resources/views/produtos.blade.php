@extends('layout.app', ["current" => "produtos"])

<style>
    #btnCadastrarProdutos{
        margin-bottom: 20px;
    }
</style>

@section('body')
<div class="card border">
    <div class="card-body ">
        <h5 class="title float-left">Cadastro de Produtos</h5>
        <button id="btnCadastrarProdutos" class="btn btn-primary btn-sm float-right" role="button" onclick="novoProduto()">Novo Produto</button>

        <table class="table table-ordered table-hover" id="tabelaProdutos">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalProduto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="formProduto">
                <div class="modal-header bg-dark">
                    <h5 class="text-white">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" class="form-control">
                    <div class="form-group">
                        <label for="nome" class="control-label">Nome do Produto</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do Produto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="preco" class="control-label">Preço</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="preco" id="preco" placeholder="Preço">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estoque" class="control-label">Estoque</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="estoque" id="estoque" placeholder="Estoque">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idCategoria" class="control-label">Categoria</label>
                        <div class="input-group">
                            <select class="form-control" name="idCategoria" id="idCategoria"></select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-Secondary" data-dismiss="modal" >Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
        });

        function novoProduto() {
            $('#id').val('')
            $('#nome').val('')
            $('#preco').val('')
            $('#estoque').val('')
            $('#modalProduto').modal('show')
        }

        function carregarCategorias() {
            $.getJSON('/api/categorias', function(categorias) { 
                $('#idCategoria').append('<option value="">Escolha uma Categoria</option>')
                for (let i = 0; i < categorias.length; i++) {
                    opcao = '<option value="' + categorias[i].id + '">' + categorias[i].nome + '</option>'
                    $('#idCategoria').append(opcao)
                }
            })
        }

        function carregarProdutos() {
            $.getJSON('/api/produtos', function(produtos) { 
                for (let i = 0; i < produtos.length; i++) {
                    linha = montarLinha(produtos[i])
                    $('#tabelaProdutos>tbody').append(linha)
                }
            })
        }

        function montarLinha(produto){
            var linha = "<tr>" + 
                            "<td>" + produto.id + "</td>" +
                            "<td>" + produto.nome + "</td>" +
                            "<td>" + produto.estoque + "</td>" +
                            "<td>" + produto.preco + "</td>" +
                            "<td>" + produto.idCategoria + "</td>" +
                            "<td>" + 
                                '<button class="btn btn-sm btn-primary" onclick="editar(' + produto.id + ')"> Editar </button> ' +
                                '<button class="btn btn-sm btn-danger" onclick="remover(' + produto.id + ')"> Apagar </button> ' +
                            "</td>" +
                        "</tr>"
            return linha;
        }

        function criarProduto(){
            produto = {
                nome: $('#nome').val(),
                preco: $('#preco').val(),
                estoque: $('#estoque').val(),
                idCategoria: $('#idCategoria').val()
            }
            
            $.post("/api/produtos", produto, function(data){
                produto = JSON.parse(data)
                linha = montarLinha(produto)
                $('#tabelaProdutos>tbody').append(linha)
            })
        }

        function salvarProduto(){
            produto = {
                id: $('#id').val(),
                nome: $('#nome').val(),
                preco: $('#preco').val(),
                estoque: $('#estoque').val(),
                idCategoria: $('#idCategoria').val()
            }
            $.ajax({
                type: "PUT",
                url: "/api/produtos/" + produto.id,
                context: this,
                data: produto,
                success: function(data){
                    produto = JSON.parse(data)
                    linhas = $('#tabelaProdutos>tbody>tr')
                    
                    e = linhas.filter(function(i, element){
                        return (element.cells[0].textContent == produto.id)
                    })
                    if(e){
                        e[0].cells[0].textContent = produto.id
                        e[0].cells[1].textContent = produto.nome
                        e[0].cells[2].textContent = produto.estoque
                        e[0].cells[3].textContent = produto.preco
                        e[0].cells[4].textContent = produto.idCategoria
                    }
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        $('#formProduto').submit(function(event){
            event.preventDefault() // impede a página de dar reflesh
            if ($('#id').val() != '' ) {
                salvarProduto()
            }else{
                criarProduto()
            }
            $('#modalProduto').modal('hide')
        })

        function remover(id){
            $.ajax({
                type: "DELETE",
                url: "/api/produtos/" + id,
                context: this,
                success: function(){
                    linhas = $('#tabelaProdutos>tbody>tr')
                    
                    e = linhas.filter(function(i, elemento){
                        return elemento.cells[0].textContent == id
                    })

                    if(e){
                       e.remove() 
                    }
                },
                error: function(error){
                    console.log(error)
                }
            })
        }

        function editar(id){
            $.getJSON('/api/produtos/' + id, function(data) { 
                $('#id').val(data.id)
                $('#nome').val(data.nome)
                $('#preco').val(data.preco)
                $('#estoque').val(data.estoque)
                $('#idCategoria').val(data.idCategoria)
                $('#modalProduto').modal('show')
            })
        }

        $(function(){
            carregarCategorias()
            carregarProdutos()
        })
    </script>
@endsection