<?php


// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

require_once __DIR__."/../models/Produto.php";
require_once __DIR__."/../models/CrudProduto.php";

//quando um valor da URL for igual a cadastrar faça isso
if ( $_GET['acao'] == 'cadastrar'){

    $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['categoria'],$_POST['quantidade']);
    //crie um objeto $crud
    $crud = new CrudProdutos();
    $crud->salvar($produto);

    //redirecione para a página de produtos
    header('location: ../views/admin/produtos.php?msg=OK')
}

//quando um valor da URL for igual a editar faça isso
if ( $_GET['acao']== 'editar'){

    //algoritmo para editar
    //redirecione para a página de produtos
}

//quando um valor da URL for igual a excluir faça isso
if ( $_GET['acao'] == 'excluir'){

    //algoritmo para excluir
    //redirecione para a página de produtos
}