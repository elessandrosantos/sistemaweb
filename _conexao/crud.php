<?php

class crud {

    private $tabela = "";
    private $csql = "";
    
    public function inserir($campos, $valores) {

        $this->csql = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";

        $adicionadadaos = $conn->prepare($this->cqsl);

        if ($adicionadadaos->execute()) {
            
        }
    }

    public function alterar($setdados, $where) {

        $this->csql = "UPDATE" . $this->tabela . " SET " . $setdados . " WHERE " . $where;

        $alterardados = $conn->prepare($this->cqsl);

        if ($alterardados->execute()) {
            
        }
    }

    public function excluir($where) {

        $this->csql = "DELETE FROM " . $this->tabela . " WHERE " . $where;

        $excluirdados = $conn->prepare($this->cqsl);

        if ($excluirdados->execute()) {
            
        }
    }

    public function obter($campos, $tabela, $where) {
       
       include $_SERVER['DOCUMENT_ROOT']."/conexao.php"; 
       $conn = conectar();
       
       $this->csql = "SELECT " . $campos . " from " . $tabela . " where " . $where;        
       $selectdados = $conn->prepare($this->csql);
       //echo $this->csql;
       try {
          if ($selectdados->execute()) {
             $adado = $selectdados->fetchall(PDO::FETCH_ASSOC);
             return $adado;
          } 
           
       } catch (Exception $e) {
       //    echo $e;
       //    echo $this->csql;
             return $e->getMessage();
           
       }
       
        
    }

}
