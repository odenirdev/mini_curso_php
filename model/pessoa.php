<?php
class pessoa {

    private $banco;

    public function __construct()
    {
        $this->banco = new bancoDeDados();
    }

    public function cadastrarPessoa($dados){
        $retorno = $this->banco->inserir('pessoa', $dados);
        if ($retorno['status']) {
            $retorno['mensagem'] = 'Pessoa cadastrada com sucesso!';
        } else {
            $retorno['mensagem'] = 'Erro ao cadastrar pessoa!';
        }
    }

    public function buscarTodasPessoas(){
        return $this->banco->buscar('pessoa');
    }
}
?>