<?php

class crud {

    private $tabela = "";
    private $csql = "";
    
    public function inserir($campos, $valores) {
        $this->tabela = strtolower($this->tabela);
        $this->csql = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";

        $adicionadadaos = $conn->prepare($this->cqsl);

        if ($adicionadadaos->execute()) {
            
        }
    }

    public function alterar($setdados, $where) {

        $this->tabela = strtolower($this->tabela);   
        $this->csql = "UPDATE" . $this->tabela . " SET " . $setdados . " WHERE " . $where;

        $alterardados = $conn->prepare($this->csql);
       // echo $this->csql;
        if ($alterardados->execute()) {
            
        }
    }

    public function excluir($where) {

        $this->tabela = strtolower($this->tabela);
        
        $this->csql = "DELETE FROM " . $this->tabela . " WHERE " . $where;
         //echo $this->csql;
        $excluirdados = $conn->prepare($this->csql);

        if ($excluirdados->execute()) {
            
        }
    }

    public function obter($campos, $tabela, $where, $order = null) {
       
       include_once $_SESSION['pastaapp']."/conexao.php"; 
       $conn = conectar();
       
       $tabela = strtolower($tabela);
       
       $this->csql = "SELECT " . $campos . " from " . $tabela . " where " . $where . " " . $order;        
       $selectdados = $conn->prepare($this->csql);
       // echo $this->csql;
       try {
          if ($selectdados->execute()) {
             $adado = $selectdados->fetchall(PDO::FETCH_ASSOC);
             return $adado;
          } 
           
       } catch (Exception $e) {
           echo $e;
           echo $this->csql;
             return $e->getMessage();
           
       }
       
        
    }

}
