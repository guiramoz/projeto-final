<?php
class dadosCurso{
    private $nome;
    private $email;
    private $senha;

    //-------------------------------------------
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($Nm)
    {
        $this->nome = $Nm;
    }
    //------------------------------------------------
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($Em)
    {
        $this->email = $Em;
    }
    //------------------------------------------------
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($Sn)
    {
        $this->senha = $Sn;
    }
}