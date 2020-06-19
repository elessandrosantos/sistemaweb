<?php

class numerador{
    
    public function obter($tabela){
        
       include_once $_SESSION['pastaapp']."/conexao.php"; 
       $conn = conectar();       
       $tabela = strtolower($tabela);
       
       $this->csql = "SELECT tabela, registro from numeradores  where tabela = '". $tabela. "'";        
       $selreg = $conn->prepare($this->csql);
      // echo $this->csql;
       
       //logcrud( "numeradorr - SCRIPT..." . $this->csql ,"logcrud",'Obter' );       
       try {
       
          if ($selreg->execute()) {
             $adado = $selreg->fetchall(PDO::FETCH_ASSOC);
       
            // echo var_dump($adado);
             if (count($adado) > 0){
                $nreg =0;                
                $nreg = $adado[0]['registro'];
                $nreg = $nreg + 1;                
                $this->csql = "UPDATE numeradores SET registro = ?  where tabela = ? ";
                $selreg = $conn->prepare($this->csql);
                $selreg->bindParam(1, $nreg, PDO::PARAM_INT);
                $selreg->bindParam(2, $tabela, PDO::PARAM_STR);
                $selreg->execute();
                
                
             }else{
                 
                $nreg = 1;
                $this->csql = "INSERT INTO numeradores (tabela, registro) VALUES (?, 1)";
                $selreg = $conn->prepare($this->csql);                
                $selreg->bindParam(1, $tabela, PDO::PARAM_STR);
                $selreg->execute();
             } 
          }   
           
       } catch (Exception $e) {
           echo $e;
           echo $this->csql;
             return $e->getMessage();
       }
        
        return $nreg;
        
    }
}