<?php //include $_SESSION['pastaapp']."/_conexao/conexao.php"; 

$_SESSION['param'] = "";

include $_SESSION['pastaapp']."/_conexao/crud.php";

$cwherefiltro = "";

If ($_POST) {


   $ccodigo = $_POST['pesqcod'];    
   $cdescr = $_POST['pesqdescr'];    

   If (!empty($ccodigo)){
      $cwherefiltro = " AND A.CODIGO LIKE '%". $ccodigo . "%'";
   }

   If (!empty($cdescr)){
      $cwherefiltro = " AND A.DESCR LIKE '%". $cdescr . "%'";
   }

}

?> 
<form id="fpesqped" name="formnomepesqserv" method="post" />
<main class="container-fluid">  
    <div class="row">
        <h3>Pesquisa de Serviços</h3> 
    </div> 
    <div class="row">
        <div class="form-group col-md-3"> 
            <label for="nmgetpesquisa">Por Código</label> 
            <input type="text" class="form-control" name="pesqcod" id="idgetpesqcod" size="20" maxlength="100" placeholder="Código do Serviço"/> 
        </div> 
        
        <div class="form-group col-md-6"> 
            <label for="nmgetpesquisa">Por Descrição</label> 
            <input type="text" class="form-control" name="pesqdescr" id="idgetpesqdescr" size="20" maxlength="100" placeholder="Descrição do Serviço"/> 
        </div> 
       
        <div class="form-group col-md-2">
           <input class="btn btn-success" name="nmbtnpesq" type="submit" id="idbtnSalvar" value="Pesquisar" /> 
        </div> 
    </div> 
    <div class="row"> 
        <a href="index.php?p=dlgservicos" class="btn btn-success">+ Incluir</a> 
        <table class="table table-striped table-bordered"> 
            <thead>  
                <tr>     
                    <th width=250>Codigo Principal</th>
                    <th width=250>Descricao</th>
                    <th width=250>Valor Unitário</th>
                    <th width=100>Action</th> 
                </tr>    
            </thead> 
            <tbody> 
                <?php
                $conn = conectar();                
                $ctab = "geral A";
                $cccampo = "A.codigo, A.descr, A.valor_unit ";
                $cwhere = "A.ativo = 1 and MSP='S'";
                $cwhere = $cwhere .  $cwherefiltro;
                $res = new crud();
                $aret = $res->obter($cccampo, $ctab, $cwhere);
                foreach ($aret as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['codigo'] . '</td>';
                    echo '<td>' . $row['descr'] . '</td>';
                    echo '<td>' . $row['valor_unit'] . '</td>';
                    echo '<td width=100>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="index.php?p=dlgservicos&id=' . $row['codigo'] . '">Alterar</a>';                    
                    echo '</td>';
                    echo '</tr>';
                }
                ?> 
            </tbody> </table> <a href="index.php" class="btn btn-info"><-Voltar</a> </div> </div>