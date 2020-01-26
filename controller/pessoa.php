<?php
session_start();

require_once "model/bancoDeDados.php";
require_once "model/pessoa.php";

$pessoa = new pessoa();
$id = 
$nome = 'teste';
$sobrenome = 'teste';

if (isset($_REQUEST['cadastrar'])){
    $retorno = $pessoa->cadastrarPessoa($_REQUEST['nome'], $_REQUEST['sobrenome']);
    $_SESSION['mensagem'] = $retorno['mensagem'];   
    header('Location: /mini_curso_php'); 
}

if (isset($_REQUEST['visualizar'])){
    echo 'pre';
    print_r($_REQUEST);
    die();
    $retorno = $pessoa->buscarUmaPessoa();
    
    $id = 
    $nome = 'teste';
    $sobrenome = 'teste';
}
?>