<?php
class bancoDeDados
{
    private $conexao;

    private function conectar()
    {
        if (empty($this->conexao)) {
            $banco = 'mysql:dbname=mini_curso_php;host=127.0.0.1';
            $usuario = 'root';
            $senha = '';
            try {
                $this->conexao = new PDO($banco, $usuario, $senha);
            } catch (Exception $e) {
                die("Unable to connect: " . $e->getMessage());
            }
            return $this->conexao;
        }
    }

    private function desconectar()
    {
        if (!empty($this->conexao)) {
            $this->conexao = null;
        }
    }

    public function comando($sql)
    {
        $retorno = [];
        $conexao = $this->conectar();
        try {
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->beginTransaction();
            $conexao->exec($sql);
            $conexao->commit();
            $retorno['status'] = true;
        } catch (Exception $e) {
            $conexao->rollBack();
            $retorno['status'] = false;
            $retorno['mensagem'] = "Failed: " . $e->getMessage();
        }
        $this->desconectar();
        return $retorno;
    }

    public function buscar($tabela, $colunas = '*', $where = []) {
        $retorno = [];
        $strWhere = '';
        $conexao = $this->conectar();

        $sql = "SELECT $colunas FROM $tabela ";

        if (!empty($where)) {
            foreach ($where as $c => $v) {
                if (empty($strWhere)){
                    $strWhere = "WHERE $c = '$v'";
                } else {
                    $strWhere .= "AND $c = '$v'";
                }
            }
            $sql .= $strWhere;
        }

        try {
            $retorno['status'] = true;
            $retorno['dados'] = $conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $retorno['status'] = false;
        }
        return $retorno;
    }

    public function inserir($tabela, $dados)
    {
        $colunas = '';
        $valores = '';
        foreach ($dados as $c => $v) {
            if (empty($colunas)) {
                $colunas =  "($c";
            } else {
                $colunas .= ", $c";
            }

            if (empty($valores)) {
                $valores = "('$v'";
            } else {
                $valores .= ", '$v'";
            }
        }
        $colunas .= ')';
        $valores .= ')';

        $sql = 'INSERT INTO ' . $tabela . $colunas . ' VALUES ' . $valores;

        $retorno = $this->comando($sql);
        return $retorno;
    }
}
