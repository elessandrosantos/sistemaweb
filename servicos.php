<?php

$citem = $_SESSION['param'];

include $_SESSION['pastaapp']."/_conexao/crud.php";

if(empty($citem)){
    
   $acao = 'inserir';
   $cwhereform = '';
    
   $citem         = "";
   $cdescr        = "";
   $cmsp          = "S";
   $ccodigo_a     = "";
   $ccodfamilia   = "";
   $cdescrfamilia = "Informe a Grupo do Serviço";
   $ccodfisserv   = "";
   $cdescrfisserv = "Informe o Codigo Serviço Fiscal";
   $cativo        = "";
   $nval_unit    =  1;
   $dinclusao     = date("Y/m/d");;
   $dalteracao    = date("Y/m/d");;
   
}else{
  
   $acao = 'alterar';
   $cwhereform = 'codigo=#'. $citem. '#' ;
    
   $conn = conectar();

   $ctab = "geral A";
   $cccampo = "A.codigo, A.descr, A.msp, A.codigo_a, A.familia, A.cod_fis_serv, A.ativo, A.inclusao, A.alteracao, A.valor_unit ";
   $cwhere .= " A.codigo = '" . $citem . "'";
   $res = new crud();
   $aret = $res->obter($cccampo, $ctab, $cwhere);

   foreach ($aret as $row) {

      
      $citem         = $row['codigo'];
      $cdescr        = $row['descr'];            
      $cmsp          = $row['msp'];
      $ccodigo_a     = $row['codigo_a'];
      $ccodfamilia   = $row['familia'];
      $cdescrfamilia = "";
      $ccodfisserv   = $row['cod_fis_serv'];
      $cdescrfisserv = "";
      $cativo        = $row['ativo'];
      $nval_unit     = $row['valor_unit'];
      $dinclusao     = $row['inclusao'];
      $dalteracao    = date("Y/m/d");
                           
   } 
}

?>

<form id="fped" name="formnomecadserv" method="post" onsubmit="return getdadosform('geral', '<?php echo $acao;?>', '<?php echo $cwhereform;?>'); return false;">
<main class="container-fluid">
    <body>
        <div class="row">     
            <div class="form-group col-md-5"> 
                <h2>Servicos </h2>
            </div>  
            <div style="display: none;"> <!-- Botão sem ação para evitar a tecla enter -->
                <input type="submit" name="prevent-enter-submit" onclick="return false;">
            </div>
        </div>
        
        <div class="form-group col-md-5"> 
                <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
                <a class="btn-warning"  href="index.php?p=dlgpesqservicos">Cancelar</a>
        </div> 
        
        <div class="row">
            <div class="form-group col-md-3">   
                <label for="nmgetCodigoPrincipal">Código</label>
                <input type="text" class="form-control" name="CODIGO" id="idgetCodigoPrincipal" value="<?php echo $citem; ?>" size="18" maxlength="18" placeholder=""/>
            </div> 
            <div class="form-group col-md-3">   
                <label for="nmgetCodigoAnterior">Coigo Anterior</label>
                <input type="text" class="form-control" name="CODIGO_A" id="idgetCodigoAnterior" value="<?php echo $ccodigo_a; ?>" size="18" maxlength="18" placeholder=""/>
            </div> 
            <div class="form-group col-md-5">   
                <label for="nmgetDescricao">Descriçao</label>
                <input type="text" class="form-control" name="DESCR" id="idgetDescricao" value="<?php echo $cdescr; ?>" size="60" maxlength="60" placeholder="Descrição do Serviço"/>
            </div>
            <div class="form-group col-md-1">
                <input type="checkbox" name="ATIVO" id="idchkInativo" checked value="<?php echo $cativo; ?>"/>
                <label for="nmlblInativo">Ativo</label>
            </div>            
                      
        </div>
        <div class="row">
                <div class="form-group col-md-3">   
                    <label for="nmcbxClassificacao">Classificação</label>
                    <input type="text" class="form-control" name="MSP" id="idgetDescricao" readonly value="<?php echo $cmsp; ?>" size="40" maxlength="40" placeholder=""/>
                </div>
            <div class="form-group col-md-3">   
                <label for="nmcbxFamilia">Grupo de Serviços</label>
                <select name="FAMILIA" class="form-control" id="idcbxFamilia">
                    <option>Familia do Serviços</option>
                </select> 
            </div>
            <div class="form-group col-md-3">   
                <label for="nmcbxServicoFiscal">Código Físcal do Serviços</label>
                <select name="COD_FIS_SERV" class="form-control" id="idcbxServicoFiscal">
                    <option>Serviço Fiscal</option>
                </select> 
            </div>
             <div class="form-group col-md-2">   
                <label for="nmcbxServicoFiscal">Valor Unitário Venda</label>
                <input type="number" class="form-control" name="VALOR_UNIT" id="idgetDescricao" value="<?php echo $nval_unit; ?>" step="0.01" size="40" maxlength="40" min="0"  placeholder=""/> 
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">   
                <label for="nmgetDescricao">Data Inclusão</label>
                <input type="text" class="form-control" name="INCLUSAO" id="idgetDescricao" readonly value="<?php echo $dinclusao; ?>" size="40" maxlength="40" placeholder=""/>
            </div> 
            
            <div class="form-group col-md-3">   
                <label for="nmgetDescricao">Data Alteração</label>
                <input type="text" class="form-control" name="ALTERACAO" id="idgetDescricao" readonly value="<?php echo $dalteracao; ?>" size="40" maxlength="40" placeholder=""/>
            </div> 
                        
        </div>

    </body>
</main>

    