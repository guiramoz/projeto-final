<?php

require_once __DIR__ . "/Conexao.php";
class modelCurso
{
    //Metodo - Gravar os dados no Banco -------------
    public function Inserir(dadosCurso $dadosCurso)
    {
        $con = new conexao();
        $bd = $con->conexao();

        try {

            $bd->beginTransaction();

            $sqlComando = "insert into aluno(nome,senha) values (?, ?)";

            $conDados = $bd->prepare($sqlComando);
            $conDados->bindValue(1, $dadosCurso->getNome());
            $conDados->bindValue(2, $dadosCurso->getSenha());

            $conDados->execute();
            $alunoId = $bd->lastInsertId();

            $sqlComando = "insert into contato(id_aluno, email) values (?, ?)";
            $conDados = $bd->prepare($sqlComando);
            $conDados->bindValue(1, $alunoId);
            $conDados->bindValue(2, $dadosCurso->getEmail());

            $conDados->execute();

            $bd->commit();
            return "Gravação com sucesso";
        } catch (PDOException $Erro) {
            $bd->rollback();
            return "Erro ao gravar os dados: " . $Erro->getMessage();
        }
    }

}

