<?php
session_start();

$_SESSION['npedido'] = "";

include $_SESSION['pastaapp']."/_conexao/crud.php";

$cwherefiltro = "";

If ($_POST) {


   $cped = $_POST['pesqpedido'];    
   $cnome = $_POST['pesqcliente'];    
   $cdata = $_POST['pesqdata'];    
   $cstatus = $_POST['pesstatus']; 


   If (!empty($cped)){
      $cwherefiltro = " AND a.PED LIKE '%". $cped . "%'";
   }

   If (!empty($cnome)){
      $cwherefiltro = " AND a.NOME LIKE '%". $cnome . "%'";
   }

   If (!empty($cdata)){
      $cwherefiltro = " AND a.ABERTA = '". $cdata . "'";
   }

   If (!empty($cstatus)){
      $cwherefiltro = " AND a.STATUS_PED = '". $cstatus . "'";
   }

}
?>
<form id="fpesqped" name="formnomepesqped   " method="post" />
    <main class="container-fluid">
        
        <div class="row"><h3>Pesquisa de Pedido de Serviços</h3> 
        </div> 
        <div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nmgetpesquisa">Pedido</label>
                    <input type="text" class="form-control" name="pesqpedido" id="idgetpesquisa" size="20" maxlength="100" placeholder="Numero do Pedido"/>
                </div>
                <div class="form-group col-md-3">
                    <label for="nmgetpesquisa">Cliente</label>
                    <input type="text" class="form-control" name="pesqcliente" id="idgetpesquisa" size="20" maxlength="100" placeholder="Nome do Cliente"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="nmgetdata">Data</label>
                    <input type="date" class="form-control" name="pesqdata" id="idgetpesquisa" size="20" maxlength="100" placeholder="Data do Pedido"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="nmgetpesquisa">Status</label>
                    <input type="text" class="form-control" name="pesstatus" id="idgetpesquisa" size="20" maxlength="100" placeholder="Status do Pedido"/> 
                </div>
                <div class="form-group col-md-2">
                    <input class="btn btn-success" name="nmbtnpesq" type="submit" id="idbtnSalvar" value="Pesquisar" /> 
                </div>   

            </div> 

        </div> 
        <div class="row"> 
            <a href="index.php?p=dlgpedvendaservicos" class="btn btn-success">+ Incluir</a> 
            <table class="table table-striped table-bordered table-responsive"> 
                <thead>  
                    <tr>     
                        <th width=250>Pedido</th>
                        <th width=250>Empresa</th>
                        <th width=250>Cliente</th>
                        <th width=250>Data</th>                    
                        <th width=250>Valor Ped</th>
                        <th width=250>Status</th>
                        <th width=100>Action</th> 
                    </tr>    
                </thead> 
                <tbody> 
                    
                    <?php
                    $conn = conectar();

                    $ctab = "PEDIDOS a, CLIENTES b";
                    $cccampo = "a.PED, a.COD_EMP, a.COD_CLI, b.NOME, a.ABERTA, a.VALOR_TOT, a.STATUS_PED ";
                    $cwhere = 'a.COD_CLI = b.XCLIENTES';
                    $cwhere = $cwhere .  $cwherefiltro;
                    $res = new crud();
                    $aret = $res->obter($cccampo, $ctab, $cwhere);

                    foreach ($aret as $row) {

                        echo '<tr>';
                        echo '<td>' . $row['PED'] . '</td>';
                        echo '<td>' . $row['COD_EMP'] . '</td>';
                        echo '<td>' . $row['COD_CLI'] . " - " . $row['NOME'] . '</td>';
                        echo '<td>' . $row['ABERTA'] . '</td>';
                        echo '<td>' . $row['VALOR_TOT'] . '</td>';
                        echo '<td>' . $row['STATUS_PED'] . '</td>';
                        echo '<td width=350>';                        
                        echo '<a class="btn btn-success" href="index.php?p=dlgpedvendaservicos&id=' . $row['PED'] . '">Alterar</a>';     
                        echo ' ';
                        echo '<a class="btn btn-success" href="index.php?p=fatara&id=' . $row['PED'] . '">Faturar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?> 
                </tbody> 
            </table> <a href="index.php" class="btn btn-info"><-Voltar</a> 
        </div> 
    </main> 