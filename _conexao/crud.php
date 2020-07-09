<?php

class crud {

    private $tabela = "";
    private $csql = "";
    
    public function inserir($campos, $valores) {
        $this->tabela = strtolower($this->tabela);
        $this->csql = "INSERT INTO " . $this->tabela . " ($campos) VALUES ($valores)";

        $adicionadadaos = $conn->prepare($this->cqsl);
        logcrud( "Inserir - SCRIPT..." . $this->csql ,"logcrud",'Insert' );
      //  echo $this->csql;
        if ($adicionadadaos->execute()) {
            
        }
    }

    public function alterar($setdados, $where) {

        $this->tabela = strtolower($this->tabela);   
        $this->csql = "UPDATE" . $this->tabela . " SET " . $setdados . " WHERE " . $where;

        $alterardados = $conn->prepare($this->csql);
        logcrud( "Alterar - SCRIPT..." . $this->csql ,"logcrud",'Update' );
      //  echo $this->csql;
        if ($alterardados->execute()) {
            
        }
    }

    public function excluir($tabela, $where) {
        include_once $_SESSION['pastaapp']."/conexao.php"; 
        $conn = conectar();
        $tabela = strtolower($tabela);
        $this->csql = "DELETE FROM " . $tabela . " WHERE " . $where;
        //echo $this->csql;
        logcrud( "excluir - SCRIPT..." . $this->csql ,"logcrud",'Deletar' );
         //echo $this->csql;
        $excluirdados = $conn->prepare($this->csql);

        if ($excluirdados->execute()) {
        
          return true; //  echo "excluido";
          
        }else{
          
          return false;  
          
          //  echo "falha ao excluir";
        }
        
    }

    public function obter($campos, $tabela, $where, $order = null) {
       
       include_once $_SESSION['pastaapp']."/conexao.php"; 
       $conn = conectar();
       
       $tabela = strtolower($tabela);
       
       $this->csql = "SELECT " . $campos . " from " . $tabela . " where " . $where . " " . $order;        
       $selectdados = $conn->prepare($this->csql);
       
       logcrud( "Obter - SCRIPT..." . $this->csql ,"logcrud",'Obter' );       
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



function logcrud($msg, $fileparam, $level = 'info', $carq = '')
{
    // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
    
      // data atual
    $date = date( 'Y-m-d H:i:s' );
    
    $datearq = date( 'dH' );
    $pasta = $_SESSION['pastaapp']."/log";
    $levelStr = '';
    if (empty($fileparam)){
       $file = 'logws.log';
    }else{
       $file = $fileparam.$datearq.".log"  ;
    }
        
 
    // verifica o nível do log
    switch ( $level )
    {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;
 
        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;
 
        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }
 
  
 
    // formata a mensagem do log
    // 1o: data atual
    // 2o: nível da mensagem (INFO, WARNING ou ERROR)
    // 3o: a mensagem propriamente dita
    // 4o: uma quebra de linha
    $msgnew = sprintf( "[%s] [%s]: %s%s%s", $date, $levelStr, $msg, $carq, PHP_EOL );
        
    // escreve o log no arquivo
    // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
    file_put_contents( $pasta."/".$file, $msgnew, FILE_APPEND );
}
