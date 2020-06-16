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
        echo ($csql);
        $adicionadadaos = $conn->prepare($csql);          
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
        
        echo ($csql);
        
        $alterardados = $conn->prepare($csql);
        if ($alterardados->execute()) {
           echo "Cadastro Atualizado";
        }else{
           echo "Falha ao Atualizar"; 
        }
        break;        

    case 'excluir':
        $csql = "DELETE FROM " . $tabela . " WHERE " . $where;
        
        //echo ($csql);
        
        $excluirdados = $conn->prepare($csql);
        if ($excluirdados->execute()) {
            echo(" Registro Apagado");            
        }else{
            echo(" Falha ao remover");            
        }
        break;        

    case 'obter':
        $csql = "SELECT " . $campos . " from " . $tabela . " where " . $where;
        
        //echo $csql;
        $selectdados = $conn->prepare($csql);
        if ($selectdados->execute()) {
            return $selectdados;
        }
        break;        

endswitch;

