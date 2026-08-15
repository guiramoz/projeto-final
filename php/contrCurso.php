<?php
// -- LINKS PARA FILTROS E LIMPEZA  (filter/sanitize) -- SUGESTÃO
//https://categoriaoutros.com.br/?p=4299
//https://www.phpit.com.br/artigos/filtrando-e-validando-dados-no-php-com-filter_var.phpit

//manipulação e envio dados para classe
include_once "dadosCurso.php";
include_once "clsCurso.php";

$model = new modelCurso();
$dadosCurso = new dadosCurso();


$nome = filter_input(INPUT_POST,"nome", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);
$senhaHtml = filter_input(INPUT_POST,"senha");
$acao = filter_input(INPUT_POST, "acao");

$senha = password_hash($senhaHtml, PASSWORD_DEFAULT);


$dadosCurso->setNome($nome);
$dadosCurso->setEmail($email);
$dadosCurso->setSenha($senha);

if ($acao == "inserir")
{
    $Resultado = $model->Inserir($dadosCurso);

    if ($Resultado === "Gravação com sucesso") {
        echo '<script>alert(' . json_encode('Dados inseridos no banco de dados!') . '); window.location = "index.html";</script>'; 
    } else {
        echo '<script>alert(' . json_encode('Erro ao inserir no banco de dados') . '); window.history.back();</script>';
    }
}