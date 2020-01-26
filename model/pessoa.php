<?php
class pessoa {

    private $banco;

    public function __construct()
    {
        $this->banco = new bancoDeDados();
    }

    public function cadastrarPessoa($nome, $sobrenome){
        $dados = [
            'nome' => $nome, 
            'sobrenome' => $sobrenome
        ];
        $retorno = $this->banco->inserir('pessoa', $dados);
        if ($retorno['status']) {
            $retorno['mensagem'] = 'Pessoa cadastrada com sucesso!';
        } else {
            $retorno['mensagem'] = 'Erro ao cadastrar pessoa!';
        }
        return $retorno;
    }

    public function buscarTodasPessoas(){
        return $this->banco->buscar('pessoa');
    }

    public function buscarUmaPessoa($id){
        return $this->banco->buscarUm('pessoa', '*', ['id' => $id]);
    }
}
?>