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

switch ($acao):

    case 'inserir':

        $csql = "INSERT INTO " . $tabela . " (".$campos.") VALUES (".$valores.")";
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

    case 'alterar':
        $csql = "UPDATE " . $tabela . " SET " . $setdados . " WHERE " . $where;        
        $alterardados = $conn->prepare($csql);
        if ($alterardados->execute()) {
           echo "Cadastro Atualizado";
        }else{
           echo "Falha ao Atualizar"; 
        }

    case 'excluir':
        $csql = "DELETE FROM " . $tabela . " WHERE " . $where;
        $excluirdados = $conn->prepare($cqsl);
        if ($excluirdados->execute()) {
            
        }

    case 'obter':
        $csql = "SELECT " . $campos . " from " . $tabela . " where " . $where;
        $selectdados = $conn->prepare($cqsl);
        if ($selectdados->execute()) {
            return $selectdados;
        }

endswitch;

