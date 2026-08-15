<?php
class conexao
{
    private static $instancia;
    function conexao()
    {
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO(
                    "mysql:host=localhost;dbname=curso;charset=utf8",
                    "root",
                    ""
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $erro) {
                echo "Erro na conexão: " . $erro->getMessage();
                return null;
            }
        }
        return self::$instancia;
    }
}