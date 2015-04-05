<?php

class Connection {

    protected $link;
    private $server, $username, $password, $db;

    public function __construct() {
        $server = $_SERVER["SERVER_NAME"];
        try {
            switch ($server) {
                case "localhost":
                    $this->link = new PDO("mysql:host=localhost;dbname=javascript_db", "root", "");
                    break;
                case "meu server":
                    $this->server = "server-web";
                    $this->username = "user-web";
                    $this->password = "mysql-passwordv";
                    $this->db = "mysql-db";
                    $this->link = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->db . "", $this->username, $this->password);
                    break;
            }
        } catch (PDOException $e) {
            exit(utf8_decode("<div style='max-width:500px;border:1px solid #ccc;padding:0px;margin:100px auto;text-align:center;'>"
                    . "<h1 style='color:red;'>Erro!</h1>Mensagem:<h2>" .$e->getMessage() ."</h2>Código: <h2>" . $e->getCode() . "</h2>Linha: <h2>" . $e->getLine() . "</h2><div>"));
        }
    }

    public  function conn() {
        return $this->link;
    }

    public function __sleep() {
        return array($this->server, $this->username, $this->password, $this->db);
    }

    public function __wakeup() {
        $this->connect();
    }

}