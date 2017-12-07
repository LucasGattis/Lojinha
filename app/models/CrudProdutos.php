<?php
/**
 * Created by PhpStorm.
 * User: JEFFERSON
 * Date: 16/11/2017
 * Time: 10:56
 */

require_once "Conexao.php";
require_once "Produto.php";

class CrudProdutos
{

    private $conexao;
    private $produto;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function salvar(Produto $produto)
    {
        $sql = "INSERT INTO tb_produtos (nome, preco,quantidade_estoque,categoria) VALUES ('$produto->nome','$produto->preco','$produto->estoque','$produto->categoria')";
        $this->conexao->exec($sql);
    }

    public function getProduto(int $codigo)
    {
        //$nome, $preco,$estoque,$categoria, $codigo
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos WHERE codigo = $codigo");
        $produto = $consulta->fetch(PDO::FETCH_ASSOC); //SEMELHANTES JSON ENCODE E DECODE

        return new Produto($produto['nome'], $produto['preco'],$produto['quantidade_estoque'], $produto['categoria']);

    }

    public function getProdutos()
    {
        $consulta = $this->conexao->query("SELECT * FROM tb_produtos");
        $arrayProdutos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        //Fabrica de Produtos
        $listaProdutos = [];
        foreach ($arrayProdutos as $produto) {
            //$nome, $preco,$estoque,$categoria, $codigo
            $listaProdutos[] = new Produto($produto['nome'], $produto['preco'], $produto['quantidade_estoque'], $produto['categoria'], $produto['codigo']);
        }

        return $listaProdutos;

    }

    public function excluir(int $id)
    {

        $this->conexao->exec("DELETE FROM tb_produtos WHERE codigo = $id");


    }

    public function editar($codigo, $preco, $qtd, $categoria, $nome)
    {

        $this->conexao->exec("UPDATE tb_produtos set nome = '$nome',categoria = '$categoria',preco =$preco,quantidade_estoque = $qtd WHERE codigo = $codigo");

    }


    public function comprar($id, $qtd)
    {
        $qtd2 = $this->getProduto($id);

        if ($qtd > $qtd2){
            return "compra invalida";
        }else {
            $nova = $qtd2->estoque - $qtd;
            $this->conexao->exec("UPDATE tb_produtos set quantidade_estoque = $nova WHERE codigo = $id");
        }
    }



}
