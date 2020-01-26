<?php
require_once "../model/bancoDeDados.php";
require_once "../model/pessoa.php";

if (isset($_POST['nome'])){
    $pessoa = new pessoa();
    $retorno = $pessoa->cadastrarPessoa($_POST);
    header('Location: ../');
    //$_SESSION['mensagem'] = $retorno['mensagem'];    
}
?>