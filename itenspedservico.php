<?php

$cped = $_SESSION['npedido'];
$nregid = $_SESSION['param'];

$_SESSION['param'] = "";

include $_SESSION['pastaapp']."/_conexao/crud.php";

if(empty($cped) || empty($nregid)){
    
   $acao = 'inserir';
   $cwhereform = '';
    
   $ccod        = "";
   $cdescritem  = "";
   $nquant      = "";
   $nval_unit   = "";
   $nval_cof    = "";
   $nval_pis    = "";
   $nval_ir     = "";
   $nval_iss    = "";
   $nval_desc   = "";
   $naliq_cof   = "";
   $naliq_pis   = "";
   $naliq_iss   = "";
   $naliq_ir    = "";
   $ncodserv    = "";
   $cobs        = "";
    
}else{
  
   $acao = 'alterar';
   $cwhereform = "REGID=#" . $nregid . "#";
    
   $conn = conectar();
   
   $ctab = "mov_peds a";
   $cccampo =  "a.codigo, a.descr_item, a.quant, a.valor_unit, a.VALOR_COF, a.VALOR_PIS, a.COD_SERV_CID, ";
   $cccampo .= "a.AL_COFINS, a.AL_PIS,AL_ISS, a.AL_IR, a.VALOR_IR, a.VALOR_ISS, a.SEQ_ITEM, a.OBS, a.valor_desc ";
   $cwhere = " a.PED = '" . $cped . "'";
   $cwhere .= " and a.regid = " . $nregid ;   
   $res = new crud();
   $aret = $res->obter($cccampo, $ctab, $cwhere);

   foreach ($aret as $row) {

      $ccod       = $row['codigo'];
      $cdescritem = $row['descr_item'];
      $nquant     = $row['quant']; 
      $nval_unit  = $row['valor_unit'];
      $nval_cof   = $row['VALOR_COF'];
      $nval_pis   = $row['VALOR_PIS'];
      $nval_ir    = $row['VALOR_IR'];
      $nval_iss   = $row['VALOR_ISS'];
      $nval_desc  = $row['valor_desc'];
      $naliq_cof  = $row['AL_COFINS'];
      $naliq_pis  = $row['AL_PIS'];
      $naliq_iss  = $row['AL_ISS'];
      $naliq_ir   = $row['AL_IR'];
      $ncodserv   = $row['COD_SERV_CID'];
      $cobs       = $row['OBS'];
                                 
   } 
}

echo $acao;
echo $cwhereform;
echo $cped;
echo $cdescritem;

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
<form id="fped" name="formnomeitempedserv" method="post" onsubmit="return getdadosform('mov_peds', '<?php echo $acao ;?>', '<?php echo $cwhereform;?>'); return false;">    
    <main class="container-fluid">
       <div class="row">     
          <div class="form-group col-md-5"> 
             <h5> Pedido </h5> 
             <input type="text" readonly class="form-control" value="<?php echo $cped; ?>" name="PED" id="idgetped" size="20" maxlength="20" placeholder=""/>
          </div>  
          <div style="display: none;"> <!-- Botão sem ação para evitar a tecla enter -->
             <input type="submit" name="prevent-enter-submit" onclick="return false;">
          </div>
           
       </div>               
       <div class="row">                  
          <div class="form-group col-md-5"> 
             <a class="btn btn-success" href="index.php?p=dlgpedvendaservicos&id=<?php echo $cped ;?>">Voltar</a>                               
             <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
          </div> 
        </div>    
        <div class="row">
           <div class="form-group col-md-4">   
              <label for="nmgetCODIGO">Código</label>
              <select name="CODIGO" class="form-control" id="idcbxcodigoitem" value="<?php echo $ccod; ?>">
                       <option value="<?php echo $ccod; ?>"><?php echo $ccod; ?></option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "geral";
                                $cccampo = "codigo, descr";
                                $cwhere = " msp ='S' and ativo = 1";                            
                                $corder = " order by descr ";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere, $corder);
                                foreach ($aret as $row) {
                                   // $cdescritem = $row['descr'];
                                ?> 
                                   <option value="<?php echo $row['codigo'];?> "> <?php echo $row['descr'];?> </option>
                                <?php
                                }
                                ?> 
                   </select>   
              
           </div> 
           <div class="form-group col-md-6">   
              <label for="nmgetRazaoSocial">Descrição</label>
              <input type="text" class="form-control" name="DESCR_ITEM" id="idgetRazaoSocial"  value="<?php echo $cdescritem; ?>" size="60" maxlength="60" placeholder=""/>
           </div> 

           <div class="form-group col-md-2">   
              <label for="nmgetRazaoSocial">Quantidade</label>
              <input type="number" class="form-control" name="QUANT" id="idgetRazaoSocial" value="<?php echo $nquant; ?>" size="60" maxlength="60" placeholder=""/>
           </div> 
        </div>             
        <div class="row">
           <div class="form-group col-md-2">   
              <label for="nmgetRazaoSocial">Valor Unitário</label>
              <input type="number" class="form-control" name="VALOR_UNIT" step="0.01" id="idgetRazaoSocial" value="<?php echo $nval_unit; ?>" size="20" maxlength="20" placeholder=""/>
           </div> 
           <div class="form-group col-md-2">   
              <label for="nmgetRazaoSocial">Desconto</label>
              <input type="number" class="form-control" name="VALOR_DESC" step="0.01" id="idgetRazaoSocial" value="<?php echo $ndesconto; ?>" size="20" maxlength="20" placeholder=""/>
           </div> 
           <div class="form-group col-md-2">   
              <label for="nmgetRazaoSocial">Valor Total</label>
              <input type="number" class="form-control" name="#VALOR_TOT" readonly id="idgetRazaoSocial" value="<?php echo $ntot; ?>" size="60" maxlength="60" placeholder=""/>
           </div> 
        </div>                     
        <div class="row">                   
        </div>

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaItens">Itens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDadosfiscais">Dados Fiscais</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDemaisInformacoes">Demais Informacoes</a>
            </li>
        </ul>
        <div class="tab-content">
           
            <div id="abaItens" class="tab-pane container-fluid active">  
                
                <div class="margin-top-sm"> 
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

                            $ctab    = "mov_peds a";
                            $cccampo = "a.regid, a.seq_item, a.codigo, a.descr_item, a.quant, a.valor_unit, a.valor_unit * a.quant AS valor_tot ";                            
                            $cwhere = " a.PED = '" . $cped . "'";                            
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
                                <td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $row['regid']; ?>);">Deletar</a></td>
                            </tr>
                            <?php
                            }
                            ?> 
                        </tbody>
                    </table>
                    <!-- <div class="ajax-action-button" id="add-more" onclick="createNew();" style="display: inline-block;">Adicionar Itens</div> -->
                </div>
            </div>
            <div id="abaDadosfiscais" class="tab-pane container-fluid fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmcbxBanco">Aliq. ISS</label>
                        <input type="text" class="form-control" name="AL_ISS" id="idgetCobranca" value="<?php echo $naliq_iss; ?>" size="1" maxlength="1" placeholder=""/>
                    </div>
                    <div class="form-group col-md-3">   
                        <label for="nmgetCobranca">Aliq. IR</label>
                        <input type="text" class="form-control" name="AL_IR" id="idgetCobranca" value="<?php echo $naliq_ir; ?>" size="1" maxlength="1" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetJuros">Aliq. Pis</label>
                        <input type="text" class="form-control" name="AL_PIS" id="idgetJuros" value="<?php echo $naliq_pis; ?>" size="6" maxlength="6" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetTolerancia">Aliq. Cofins</label>
                        <input type="number" class="form-control" name="AL_COFINS" id="idgetTolerancia" value="<?php echo $naliq_cof; ?>" size="5" maxlength="5" placeholder=""/>
                    </div> 
                 </div>    
                 <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmcbxBanco">Valor ISS</label>
                        <input type="text" class="form-control" name="VALOR_ISS" id="idgetCobranca" value="<?php echo $nval_iss; ?>" size="1" maxlength="1" placeholder=""/>
                    </div>
                    <div class="form-group col-md-3">   
                        <label for="nmgetCobranca">Valor IR</label>
                        <input type="text" class="form-control" name="VALOR_IR" id="idgetCobranca" value="<?php echo $nval_ir; ?>" size="1" maxlength="1" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetJuros">Valor Pis</label>
                        <input type="text" class="form-control" name="VALOR_PIS" id="idgetJuros" value="<?php echo $nval_pis; ?>" size="6" maxlength="6" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetTolerancia">Valor Cofins</label>
                        <input type="number" class="form-control" name="VALOR_COF" id="idgetTolerancia" value="<?php echo $nval_cof; ?>" size="5" maxlength="5" placeholder=""/>
                    </div> 
                 </div> 
                
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmcbxBanco">Codigo de Serviço</label>
                        <input type="text" class="form-control" name="COD_SERV_CID" id="idgetCobranca" value="<?php echo $$ncodserv; ?>" size="1" maxlength="1" placeholder=""/>
                    </div>
                </div>    
            </div>
           
            <div id="abaDemaisInformacoes" class="tab-pane container-fluid fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-12">   
                        <label for="nmtextObservacao">Observacao</label>
                        <input type="text" class="form-control" name="OBS" id="idtextObservacao" value="<?php echo $cobs; ?>" size="10" maxlength="10" placeholder=""/>
                    </div> 
                </div>
            </div> 
            
        </div> 
    </main>
</html>

