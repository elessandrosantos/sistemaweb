<?php

$acao       = isset($_POST["acao"])? $_POST["acao"]:'';
$tabela     = isset($_POST["tab"])? $_POST["tab"]:''; 
$campos     = isset($_POST["campos"])? $_POST["campos"]:'';
$valores    = isset($_POST["valores"])? $_POST["valores"]:'';
$where      = isset($_POST["where"])? $_POST["where"]:'';
$setdados   = isset($_POST["setdados"])? $_POST["setdados"]:'';

$csql = "";

require_once "conexao.php";
$conn = conectar();


$tabela = strtolower($tabela);


switch ($acao):

    case 'inserir':

        $csql = "INSERT INTO " . $tabela . " (".$campos.") VALUES (".$valores.")";       
        $adicionadadaos = $conn->prepare($csql);          
        logcrudjs( "Inserir - SCRIPT..." . $csql ,"logcrudjs",'Insert' );
        try{
           if ($adicionadadaos->execute()) {
               echo "Cadastro Realizado com Sucesso";
           }else{
               echo "Cadastro não Realizado";
           }
        } catch(PDOException $e){           
           echo $e->getMessage();
         }
        break;

    case 'alterar':
        
        $csql = "UPDATE " . $tabela . " SET " . $setdados . " WHERE " . $where;        
        $alterardados = $conn->prepare($csql);
        logcrudjs( "Alterar - SCRIPT..." . $csql ,"logcrudjs",'UPDATE' );
        try{
           if ($alterardados->execute()) {
               //echo "Cadastro Atualizado";
               return "Cadastro Atualizado";
           }else{
               return "Falha ao Atualizar";
               
           }
        } catch(PDOException $e){           
           echo $e->getMessage();
        }
        break;        

    case 'excluir':
        $csql = "DELETE FROM " . $tabela . " WHERE " . $where;
        $excluirdados = $conn->prepare($csql);
        logcrudjs( "Excluir - SCRIPT..." . $csql ,"logcrudjs",'DELETE' );
        if ($excluirdados->execute()) {
            echo(" Registro Apagado");            
        }else{
            echo(" Falha ao remover");            
        }
        break;        

    case 'obter':
        
        $csql = "SELECT " . $campos . " from " . $tabela . " where " . $where;
        $selectdados = $conn->prepare($csql);
        logcrudjs( "Obter - SCRIPT..." . $csql ,"logcrudjs",'Select' );
        if ($selectdados->execute()) {
            return $selectdados;
        }
        break;        

endswitch;

function logcrudjs($msg, $fileparam, $level = 'info', $carq = '')
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

