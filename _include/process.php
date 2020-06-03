<?php
   
   include("../_conexao/conexao.php");
   $con=conectar();
   
          $cSql = "SELECT                            ".
                  "   A.descr_prod,                  ".  
                  "   A.VALOR,                       ". 
                  "   A.DATA_FIM,                    ".   
                  "   B.razao_social,                ". 
                  "   B.bairro,                      ". 
                  "   c.descr_marca,                 ". 
                  "   a.unidade                      ". 
                  "FROM                              ".
                  "tbl_prod_estab A,                 ".  
                  "   tbl_estabelecimentos B,        ".
                  "   tbl_marcas C                   ".
                  "WHERE                             ".
                  "   A.cod_estab=B.cod_estab and    ". 
                  "   a.cod_marca = c.cod_marca AND  ".
                  "   a.data_ini <= SYSDATE() and    ".
                  "   a.data_fim >= sysdate() and    ".
                  "    A.descr_prod LIKE ('%rr%')    ";
   
          $result = $con->query ( $sql );
   
          if(!$result->execute()) return false;
   
          if ($result->rowCount() >0){
             $json = array();
             while($row = $result->fetch()){
                $json[]= array(
                   'Fornecedor' => $row['razao_social'],
                   'Produto'    => $row['descr_produto'],
                   'Marca'      => $row['descr_marca'],
                   'Valor'      => $row['valor'],
                   'Unidade'    => $row['unidade']    
                );
             }
             $jason['sucess'] =true;
             echo json_encode($json);
          } 

?>
