<?php

require_once "../../config/config.php";

class Conexao
{

    public function getConexao()
    {
        try {
            $conexao = new PDO("mysql:host=" . HOST . ";dbname" . BANCO, USUARIO, SENHA);

        }catch (Exception $e){
            echo "Ocorreu um erro: {$e->getMessage()} na linha {$e->getLine()}";
        }
    }
}
//teste
//$conexao = new Conexao();
//$conexao->getConexao();