<?php
//include $_SESSION['pastaapp']."/_conexao/conexao.php"; 

$_SESSION['param'] = "";

include $_SESSION['pastaapp'] . "/_conexao/crud.php";

$cwherefiltro = "";

If ($_POST) {

    $ccodigo = $_POST['pesqcod'];
    $cdescr = $_POST['pesqdescr'];
    $cativo = $_POST['pesqativos'];    

    If (!empty($ccodigo)) {
        $cwherefiltro = " AND a.CODIGO LIKE '%" . $ccodigo . "%'";
    }

    If (!empty($cdescr)) {
        $cwherefiltro .= " AND a.DESCR LIKE '%" . $cdescr . "%'";
    }

    If ($cativo == 'on') {
        $cwherefiltro .= " AND a.ativo = 1";
    }
}else{
             
   $ctab = "prepeds";
   $cwhere = " usuario='" . $_SESSION['usuario'] . "'";
   $res = new crud();
   $res->excluir($ctab, $cwhere);        
    
    
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

        <div class="form-group col-md-1"> 
            <label for="nmgetpesquisa">Ativos</label> 
            <input type="checkbox" class="form-control" name="pesqativos" id="idchkativo" checked=/> 
        </div>
        <div class="form-group col-md-2">
            <input class="btn btn-success" name="nmbtnpesq" type="submit" id="idbtnpesquisar" value="Pesquisar" /> 
        </div> 
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <div class="row table-responsive"> 
                <a href="index.php?p=dlgservicos" class="btn btn-success">+ Incluir</a> 
                <table class="table-responsive table-striped table-bordered"> 
                    <thead>  
                        <tr>     
                            <th width=250>Codigo Principal</th>
                            <th width=250>Descricao</th>
                            <th width=250>Valor Unitário</th>
                            <th width=50>Ativo</th>
                            <th width=200>Action</th> 
                        </tr>    
                    </thead> 
                    <tbody> 
                        <?php
                        $conn = conectar();
                        $ctab = "geral a";
                        $cccampo = "a.codigo, a.descr, a.valor_unit, a.ativo ";
                        $cwhere = " a.msp='S'";
                        $cwhere = $cwhere . $cwherefiltro;
                        $res = new crud();
                        $aret = $res->obter($cccampo, $ctab, $cwhere);
                        foreach ($aret as $row) {
                            if ($row['ativo'] == 1) {
                                $cexatv = "Sim";
                            } else {
                                $cexatv = "Não";
                            }
                            echo '<tr>';
                            echo '<td>' . $row['codigo'] . '</td>';
                            echo '<td>' . $row['descr'] . '</td>';
                            echo '<td>' . $row['valor_unit'] . '</td>';
                            echo '<td>' . $cexatv . '</td>';
                            echo '<td width=100>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="index.php?p=dlgservicos&id=' . $row['codigo'] . '">Alterar</a>';
                            echo '<a> <    >  </a>';
                            //echo '<a class="btn btn-success" onclick="return criapreped('."'". $_SESSION['usuario'] ."'". ');return false;">Vender</a>';
                            echo '<a class="btn btn-success" onclick="return criapreped('."'". $_SESSION['usuario'] ."', '" . $row['codigo'] ."', '" . $row['descr'] ."'," . $row['valor_unit'] .');return false;">Vender</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?> 
                    </tbody> 
                </table> 
                <a href="index.php" class="btn btn-info"><-Voltar</a> 
            </div> 
        </div>

        <div class="form-group col-md-6">
            <div class="row table-responsive">                
                <table class="table-responsive table-striped table-bordered"> 
                    <h4> Pré-Pedido </h4>
                    <thead>  
                        <tr>     
                            <th width=100>Codigo Principal</th>
                            <th width=250>Descrção</th>
                            <th width=100>Quant.</th>
                            <th width=100>Valor Unitário</th>                                                        
                        </tr>    
                    </thead> 
                    <tbody> 
                        <?php
                        $conn = conectar();
                        $ctab = "prepeds a";
                        $cccampo = "a.usuario, a.cod_item, a.descr, a.valor_unit, a.quant ";
                        $cwhere = " a.usuario='". $_SESSION['usuario']."'";
                        $res = new crud();
                        $aret = $res->obter($cccampo, $ctab, $cwhere);
                        foreach ($aret as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['cod_item'] . '</td>';
                            echo '<td>' . $row['descr'] . '</td>';
                            echo '<td>' . $row['quant'] . '</td>';
                            echo '<td>' . $row['valor_unit'] . '</td>';
                            echo '</tr>';
                        }
                        ?> 
                    </tbody> 
                </table> 
                <input class="btn btn-info" name="nmbtnatualizar" type="submit" id="idbtnatualizar" value="Atualizar" /> 
                <a class="btn btn-info">Gerar Pedido</a> <!--href=""-->
            </div>   

        </div>         
    </div>


</div>
</main>

