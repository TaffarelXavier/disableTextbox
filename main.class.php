<?php

class Main extends Connection {

    public function insert($cat_id, $nome, $exemplo, $cat_type, $func_descricao) {


        $stmt = $this->conn()->prepare("INSERT INTO `funcoes_tbl` (`func_id`, `func_categoria_id`, `func_nome`, `func_exemplo`,`cat_type`,`func_descricao`) VALUES (NULL, ?,?,?,?,?)");

        $stmt->bindValue(1, $cat_id);
        $stmt->bindValue(2, $nome);
        $stmt->bindValue(3, $exemplo);
        $stmt->bindValue(4, $cat_type);
        $stmt->bindValue(5, $func_descricao);
        
        $stmt->execute();
        
        return $stmt->rowCount();
    }

    public function get_categorias() {
        $q = $this->conn()->prepare("SELECT * FROM `categoria`");
        $q->execute();
        return $q;
    }

    public function get_funcoes() {
        $q = $this->conn()->prepare("SELECT * FROM `funcoes_tbl`");
        $q->execute();
        return $q;
    }

    public function get_dados_por_id($id) {
        $q = $this->conn()->prepare("SELECT * FROM `funcoes_tbl` WHERE  func_id ='$id' ");
        $q->execute();
        return $q;
    }

}
