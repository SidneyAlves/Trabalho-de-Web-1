<?php

function conectaDb(){
    try{
    $conexao = new \PDO("mysql:host=localhost;dbname=ProjetaoTop","root","");
    return $conexao;

    }catch(\PDOException $e){
        echo "Não foi possível estabelecer a conexão com o banco de dados, erro: ".$e->getCode();
    }
}
?>