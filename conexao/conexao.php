<?php

class conexao_db {

    private $link = null;

    public function __construct() {
        try {
            //error_reporting(false);
            if ($_SERVER["SERVER_NAME"] == "localhost") {
                $this->link = new PDO("mysql:host=localhost;dbname=javascript_db", "root", "");
            } else {
                $mysql_host = "mysql.hostinger.com.br";
                $mysql_user = "u369672736_user";
                $mysql_database = "u369672736_db";
                $mysql_password = '6$SvGV]#zAiICIAdEp';
                $this->link = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);
            }
        } catch (PDOException $e) {
            exit("<div style='max-width:500px;border:1px solid #ccc;padding:0px;margin:100px auto;text-align:center;'>"
                    . "<h1 style='color:red;'>Erro!</h1>Mensagem:<h2>" .
                    utf8_encode($e->getMessage()) .
                    "</h2>Código: <h2>" . $e->getCode() . "</h2>Linha: <h2>" . $e->getLine() . "</h2><div>");
        }
    }

    public function conn() {
        return $this->link;
    }

    public function close_conn() {
        $this->link = null;
    }

}
