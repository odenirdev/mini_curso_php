<?php
class pessoa {

    private $banco;

    public function __construct()
    {
        $this->banco = new bancoDeDados();
    }

    public function cadastrarPessoa($dados){
        $retorno['status'] = false;
        if (!empty($dados['nome'])){
            $dados['status'] = 1;
            $retorno = $this->banco->inserir('pessoa', $dados);
            if ($retorno['status']) {
                $retorno['mensagem'] = 'Pessoa cadastrada com sucesso!';
            } else {
                $retorno['mensagem'] = 'Erro ao cadastrar pessoa!';
            }
        } else {
            $retorno['mensagem'] = 'Campo "Nome" é obrigátorio!';
        }
        return $retorno;
    }

    public function buscarTodasPessoas(){
        return $this->banco->buscar('pessoa', 'id, nome, sobrenome', ['status' => 1]);
    }

    public function buscarUmaPessoa($id){
        return $this->banco->buscarUm('pessoa', '*', ['id' => $id]);
    }

    public function deletarPessoa($dados, $id){
        $retorno = $this->banco->atualizar('pessoa', $dados, ['id' => $id]);
        if ($retorno['status']) {
            $retorno['mensagem'] = 'Pessoa deletada!';
        } else {
            $retorno['mensagem'] = 'Erro ao deletar pessoa!';
        }
        return $retorno;
    }

    public function atualizarPessoa($dados, $id) {
        if (!empty($dados['nome'])){
            $retorno = $this->banco->atualizar('pessoa', $dados, ['id' => $id]);
            if ($retorno['status']) {
                $retorno['mensagem'] = 'Pessoa atualizada com sucesso!';
            } else {
                $retorno['mensagem'] = 'Erro ao atualizar pessoa!';
            }
        }
        return $retorno;
    }
}
?>