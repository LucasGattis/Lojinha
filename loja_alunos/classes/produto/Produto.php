<?php

require_once "../conexao/Conexao.php";

class Produto{
    private $codigo;
    private $titulo;
    private $preco;
    private $categoria;
    private $conexao;


    /**
     * Produto constructor.
     * @param $codigo
     * @param $titulo
     * @param $preco
     * @param $categoria
     */
    public function __construct($codigo, $titulo, $preco, $categoria)
    {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->preco = $preco;
        $this->categoria = $categoria;

        $this->conexao = new Conexao();
    }


    public function cadastrarProduto(){
        $sql = "INSERT INTO tb_produtos (titulo, preco, categoria) VALUES ()";
    }


}