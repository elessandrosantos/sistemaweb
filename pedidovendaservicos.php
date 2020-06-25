<?php

$cped = $_SESSION['npedido'];
$cuser = $_SESSION['usuario'];
$codemp = $_SESSION['cod_emp'];

include $_SESSION['pastaapp']."/_conexao/crud.php";

if(empty($cped)){
    
   $acao = 'inserir';
   $cwhereform = '';
   
   include $_SESSION['pastaapp']."/_conexao/numerador.php";
   
   $nReg = new numerador();
   
   $nped = $nReg->obter('pedido');
   
   $nped = str_pad($nped, 10 , '0', STR_PAD_LEFT);
   echo $nped;
   
   $ctpped = "PS";
   $cped   = $ctpped . $nped;
   $_SESSION['npedido'] = $cped;
   $cdata  = date("Y-m-d");
   $cusuario = $cuser;            
   $cempresa = $codemp;
   $ccliente = '';
   $ccondpagto = '';
   $ctpoperacao = '';
   $cseupedido = '';
   $cdoc_fiscal = '';
   $cobs = '';
   $cobs1 = '';
   $ndesconto = '';
   $nacrescimo = '';
   $cnmcliente = 'Informe o Cliente'    ;
   
}else{
  
   $acao = 'alterar';
   $cwhereform = 'PED=#'. $cped. '#' ;
    
   $conn = conectar();

   $ctab = "pedidos a, clientes b, condicoes c, operacoes d";
   $cccampo = "a.aberta, a.usuario, a.cod_emp, a.cod_cli, b.nome, a.cod_con, a.cod_ser, a.seu_ped, a.doc_fiscal, a.obs1, a.obs2 ";
   $cccampo .= ", a.desconto, a.acrescimo, c.descr as descrcond, d.descr as descroper";
   $cwhere = "a.cod_cli = b.xclientes AND a.cod_con = c.codigo AND a.cod_ser = d.codigo";
   $cwhere .= " and a.PED = '" . $cped . "'";
   $res = new crud();
   $aret = $res->obter($cccampo, $ctab, $cwhere);

   foreach ($aret as $row) {

      
      $cdata  = $row['aberta'];
      $cusuario = $row['usuario'];            
      $cempresa = $row['cod_emp'];
      $ccliente = $row['cod_cli'];
      $cnmcliente = $row['nome'];
      $ccondpagto = $row['cod_con'];
      $cconddescr = $row['descrcond'];
      $ctpoperacao = $row['cod_ser'];
      $ctpoperdesc = $row['descroper'];
      $cseupedido = $row['seu_ped'];
      $cdoc_fiscal = $row['doc_fiscal'];
      $cobs = $row['obs1'];
      $cobs1 = $row['obs2'];
      $ndesconto = $row['desconto'];
      $nacrescimo = $row['acrescimo'];
                           
   } 
}

echo $acao;
echo $cwhereform;



?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Pedido</title>

        <script src="_js/pedido.js" type="text/javascript"></script>
        <!--<link rel="stylesheet" type="text/css" href="_css\pedido.css"/>-->        
        <!-- BootstrapCDN e Ajax
        <script src="_js/jquery-351.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"> -->


    </head>
<form id="fped" name="formnomepediserv" method="post" onsubmit="return getdadosform('pedidos', '<?php echo $acao;?>', '<?php echo $cwhereform;?>'); return false;">
    <main class="container-fluid">            
            <div class="form-group col-md-12"> 
                <h5> Pedido </h5>
            </div>  
            <div style="display: none;"> <!-- Botão sem ação para evitar a tecla enter -->
                <input type="submit" name="prevent-enter-submit" onclick="return false;">
            </div>

            <div class="form-group col-md-5"> 
                <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
            </div> 
                     
            <div class="row">
               <div class="form-group col-md-3">   
                  <label for="nmgetCodigoAnterior">Número</label>
                  <input type="text" class="form-control" readonly value="<?php echo $cped; ?>" name="PED" id="idgetPED" size="20" maxlength="20" placeholder=""/>
               </div> 
               <div class="form-group col-md-3">   
                  <label for="nmgetCNPJCPF">Data</label>
                  <input type="date" class="form-control" readonly value="<?php echo $cdata; ?>" name="ABERTA" id="idgetABERTA" size="20" maxlength="20" placeholder=""/>
               </div> 
               <div class="form-group col-md-3">   
                  <label for="nmgetRazaoSocial">Usuários</label>
                  <input type="text" class="form-control" readonly value="<?php echo $cusuario; ?>" name="USUARIO" id="idgetUSUARIO" size="60" maxlength="60" placeholder=""/>
               </div> 
               <div class="form-group col-md-3">   
                  <label for="nmgetRazaoSocial">Empresa</label>
                  <input type="text" class="form-control" readonly value="<?php echo $cempresa; ?>" name="COD_EMP" id="idgetEMPRESA" size="60" maxlength="60" placeholder=""/>
               </div> 

             </div>                     
             <div class="row">                   
                <div class="form-group col-md-6">   
                   <label for="nmgetNomeFantasia">Cliente</label>
                   <select name="COD_CLI" class="form-control" id="idcbxcliente" value="<?php echo $ccliente; ?>">
                       <option value="<?php echo $ccliente; ?>"><?php echo $cnmcliente; ?></option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "clientes";
                                $cccampo = "xclientes, nome ";
                                $cwhere = "1=1";                            
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                ?> 
                                   <option value="<?php echo $row['xclientes'];?> "> <?php echo $row['nome'];?> </option>
                                <?php
                                }
                                ?> 
                   </select>                       
                </div> 

                <div class="form-group col-md-3">   
                   <label for="nmgetNomeFantasia">Cond. Parcelamento</label>                   
                   <select name="COD_CON" class="form-control" value="<?php echo $ccondpagto; ?>" id="idcbxcoondicao" value="<?php echo $ccondpagto; ?>">
                       <option value="<?php echo $ccondpagto; ?>"><?php echo $cconddescr; ?></option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "condicoes";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";                            
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                ?> 
                                   <option value="<?php echo $row['codigo'];?> "> <?php echo $row['descr'];?> </option>
                                <?php
                                }
                                ?> 
                   </select>    
                </div> 
                <div class="form-group col-md-3">   
                   <label for="nmgetCEP">Tipo da Operação</label>
                   <select name="COD_SER" class="form-control" id="idcbxoperacao" value="<?php echo $ctpoperacao; ?>">
                       <option value="<?php echo $ctpoperacao; ?>"><?php echo $ctpoperdesc; ?></option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "operacoes";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";                            
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                ?> 
                                   <option value="<?php echo $row['codigo'];?> "> <?php echo $row['descr'];?> </option>
                                <?php
                                }
                                ?> 
                   </select>                       
                </div> 
               
             </div>
             

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaItens">Itens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDadosComplementares">Dados Complementares</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDemaisInformacoes">Demais Informacoes</a>
            </li>
        </ul>
        <div class="tab-content">
           
            <div id="abaItens" class="tab-pane container-fluid active">  
                <div class="row">                                                                                        <!-- href="index.php?p=dlgitenspedserv"-->
                    <a class="btn btn-success" onclick="return verificapedido('<?php echo $cped;?>'); return false;">Incluir Itens</a>
                </div>    
                <div class="margin-top-sm table-responsive"> 
                    <table class="table table-striped table-bordered">                        
                        <thead>
                            <tr>
                                <th class="table-header">Id</th>
                                <th class="table-header">Seq. Item</th>                                
                                <th class="table-header">Código</th>
                                <th class="table-header">Descrição</th>
                                <th class="table-header">Quantidade</th>
                                <th class="table-header">Valor Unitário</th>
                                <th class="table-header">Valor Total</th>
                                <th class="table-header">Ação</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            
                            <?php
                            $conn = conectar();

                            $ctab = "MOV_PEDS a";
                            $cccampo = "a.regid, a.seq_item, a.codigo, a.descr_item, a.quant, a.valor_unit, (a.valor_unit - a.valor_desc) * a.quant AS valor_tot ";
                            $cwhere = "a.PED = '" . $cped . "'";                            
                            $res = new crud();
                            $aret = $res->obter($cccampo, $ctab, $cwhere);

                            foreach ($aret as $row) {
                                ?>
                             <tr class="table-row" id="table-row-<?php echo $row['regid']; ?>">
                                <td onblur="saveToDatabase(this, 'regid', '<?php echo $row['regid']; ?>')" onclick="editRow(this);" ><?php echo $row['regid']; ?></td>
                                <td onblur="saveToDatabase(this, 'seq_item', <?php echo $row['regid']; ?>)" onclick="editRow(this);" contenteditable="true"><?php echo $row['seq_item']; ?></td>
                                <td onblur="saveToDatabase(this, 'codigo', <?php echo $row['regid']; ?>)" onclick="editRow(this);" ><?php echo $row['codigo']; ?></td>
                                <td onblur="saveToDatabase(this, 'descr_item', <?php echo $row['regid']; ?>)" onclick="editRow(this);" contenteditable="true"><?php echo $row['descr_item']; ?></td>
                                <td onblur="saveToDatabase(this, 'quant', <?php echo $row['regid']; ?>)" onclick="editRow(this);" contenteditable="true"><?php echo $row['quant']; ?></td>
                                <td onblur="saveToDatabase(this, 'valor_unit', <?php echo $row['regid']; ?>)" onclick="editRow(this);" contenteditable="true"><?php echo $row['valor_unit']; ?></td>                                
                                <td onblur="saveToDatabase(this, 'valor_tot', <?php echo $row['regid']; ?>)" onclick="editRow(this);"> <?php echo $row['valor_tot']; ?></td>
                                <td>
                                    <a a class="btn btn-success" href="index.php?p=dlgitenspedserv&id=<?php echo $row['regid'];?>">Alterar</a>                                   
                                   <a class="ajax-action-links btn btn-success" onclick="deleteRecord(<?php echo $row['regid']; ?>);">Deletar</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?> 
                        </tbody>
                    </table>
                    <!-- <div class="ajax-action-button" id="add-more" onclick="createNew();" style="display: inline-block;">Adicionar Itens</div> -->
                </div>
            </div>
            <div id="abaDadosComplementares" class="tab-pane container-fluid fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmcbxBanco">Seu Pedido</label>
                        <input type="text" class="form-control" value="<?php echo $cseupedido; ?>" name="SEU_PED" id="idgetCobranca" size="20" maxlength="20" placeholder=""/>
                    </div>
                    <div class="form-group col-md-3">   
                        <label for="nmgetCobranca">Doc. Fiscal</label>
                        <input type="text" class="form-control" value="<?php echo $cdoc_fiscal; ?>" name="DOC_FISCAL" id="idgetCobranca" size="10" maxlength="10" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-6">   
                        <label for="nmgetJuros">Observação</label>
                        <input type="text" class="form-control" value="<?php echo $cobs; ?>" name="OBS" id="idgetJuros" size="5" maxlength="500" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetTolerancia">Desconto R$</label>
                        <input type="number" class="form-control" value="<?php echo $ndesconto; ?>" name="DESCONTO" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetMulta">Acréscimo</label>
                        <input type="number" class="form-control" value="<?php echo $nacrescimo; ?>" name="ACRESCIMO" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                    </div>                     
                </div>
            </div>
            <div id="abaDemaisInformacoes" class="tab-pane container-fluid fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-12">   
                        <label for="nmtextObservacao">Observacao</label>
                        <input type="text" class="form-control" value="<?php echo $cobs1; ?>" name="OBS1" id="idtextObservacao" size="100" maxlength="500" placeholder=""/>
                    </div> 
                </div>
            </div> 
            
        </div> 
    </main>
</html>


