<?php


// O Controlador é a peça de código que sabe qual classe chamar, para onde redirecionar e etc.
// Use o método $_GET para obter informações vindas de outras páginas.

require_once __DIR__."/../models/Produto.php";
require_once __DIR__."/../models/CrudProdutos.php";

//quando um valor da URL for igual a cadastrar faça isso
if ( $_GET['acao'] == 'cadastrar'){

    $produto = new Produto($_POST['nome'],$_POST['preco'],$_POST['quantidade'],$_POST['categoria']);
    //crie um objeto $crud
    $crud = new CrudProdutos();
    $crud->salvar($produto);

    //redirecione para a página de produtos
    header('location: ../views/admin/produtos.php');
}

//quando um valor da URL for igual a editar faça isso
if ( $_GET['acao']== 'editar'){

    //algoritmo para editar]]
    if ($_POST['quantidade'] == null) {
        $_POST['quantidade'] = 0;
        $crud = new CrudProdutos();
        $crud->editar($_GET['id'], $_POST['preco'], $_POST['quantidade'], $_POST['categoria'], $_POST['titulo']);
        header('location: ../views/admin/produtos.php');
    }else{
        $crud = new CrudProdutos();
        $crud->editar($_GET['id'], $_POST['preco'], $_POST['quantidade'], $_POST['categoria'], $_POST['titulo']);
        header('location: ../views/admin/produtos.php');
    }

    //redirecione para a página de produtos
}

//quando um valor da URL for igual a excluir faça isso
if ( $_GET['acao']== 'excluir'){

    echo "chamou o excluir";

    //algoritmo para excluir
    $crud = new CrudProdutos();
    $crud->excluir($_GET['id']);

    header('location: ../views/admin/produtos.php');
}
if ($_GET['acao'] == 'compra'){


    $crud = new CrudProdutos();
    $crud = compra($_GET['id'],$_POST['qtd']);
    header('Location: ../views/produto.php');
}