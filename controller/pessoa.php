<?php
session_start();

require_once "model/bancoDeDados.php";
require_once "model/pessoa.php";

$pessoa = new pessoa();

if (isset($_REQUEST['cadastrar'])) {
    $retorno = $pessoa->cadastrarPessoa(['nome' => $_REQUEST['nome'], 'sobrenome' => $_REQUEST['sobrenome']]);
    $_SESSION['mensagem'] = $retorno['mensagem'];
    header('Location: /mini_curso_php');
}

if (isset($_REQUEST['visualizar'])) {
    $retorno = $pessoa->buscarUmaPessoa($_REQUEST['visualizar']);
    $id = $retorno['dados']['id'];
    $nome = $retorno['dados']['nome'];
    $sobrenome = $retorno['dados']['sobrenome'];
}

if (isset($_REQUEST['limpar'])) {
    $_SESSION['mensagem'] = null;
    header('Location: /mini_curso_php');
}

if (isset($_REQUEST['deletar'])) {
    $retorno = $pessoa->deletarPessoa(['status' => 0], $_REQUEST['id']);
    $_SESSION['mensagem'] = $retorno['mensagem'];
    header('Location: /mini_curso_php');
}

if (isset($_REQUEST['alterar'])) {
    $retorno = $pessoa->atualizarPessoa(['nome' => $_REQUEST['nome'], 'sobrenome' => $_REQUEST['sobrenome']], $_REQUEST['id']);
    $_SESSION['mensagem'] = $retorno['mensagem'];
    header('Location: /mini_curso_php');
}
