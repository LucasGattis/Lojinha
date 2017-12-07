<?php

require_once 'cabecalho.php';

require_once "../../models/CrudProdutos.php";

$crud = new CrudProdutos();

$crud->getProduto($_GET['id']);

//seguranca
$id = filter_input(INPUT_GET, 'codigo', FILTER_VALIDATE_INT); //consulte os slides.

$produto = $crud->getProduto($_GET['id']);


?>


    <h2>Editar Produtos</h2>
    <form action="../../controllers/controladorProduto.php?acao=editar&id=<?= $_GET['id']?>" method="post">
        <div class="form-group">
            <label for="produto">Produto:</label>
            <input value="<?= $produto->nome?>" name="titulo" type="text" class="form-control" id="produto" aria-describedby="nome produto" placeholder="">
        </div>

        <div class="form-group">
            <label for="preco">Preco</label>
            <input value="<?= $produto->preco?>"name="preco" type="number" step="0.01" class="form-control" id="preco" placeholder="">
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input value="<?= $produto->estoque?>"name="quantidade" type="number" class="form-control" id="quantidade" placeholder="">
        </div>

        <div class="form-group">
            <label for="Categoria">Categoria</label>
            <select  name="categoria" class="form-control" id="Categoria">
                <option>Fruta</option>
                <option>Legume</option>
                <option>Hortaliça</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Editar</button>

    </form>
<?php require_once "rodape.php";?>