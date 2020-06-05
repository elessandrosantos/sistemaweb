<?php

$cped = $_SESSION['npedido'];

include $_SERVER['DOCUMENT_ROOT']."/_conexao/crud.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Pedido</title>

        <script src="_js/pedido.js" type="text/javascript"></script>
        <!--<link rel="stylesheet" type="text/css" href="_css\pedido.css"/>-->        
        <!-- BootstrapCDN e Ajax
        <script src="_js/jquery-351.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"> -->


    </head>        
    <main class="container-fluid">
        <div class="row">     
            <div class="form-group col-md-5"> 
                <h5> Pedido </h5>
            </div>  
            <div class="form-group col-md-5">
            </div> 
            <div class="form-group col-md-5"> 
                <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
            </div> 
                     
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmgetCodigoAnterior">Número</label>
                        <input type="text" class="form-control" value="<?php echo $cped; ?>" name="nmgetCodigoAnterior" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetCNPJCPF">Data</label>
                        <input type="text" class="form-control" name="nmgetCNPJCPF" id="idgetCNPJCPF" size="20" maxlength="20" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetRazaoSocial">Usuários</label>
                        <input type="text" class="form-control" name="nmgetRazaoSocial" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetRazaoSocial">Empresa</label>
                        <input type="text" class="form-control" name="nmgetRazaoSocial" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                    </div> 

                </div>                     
                <div class="row">                   
                    <div class="form-group col-md-6">   
                        <label for="nmgetNomeFantasia">Cliente</label>
                        <input type="text" class="form-control" name="nmgetNomeFantasia" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                    </div> 

                    <div class="form-group col-md-3">   
                        <label for="nmgetNomeFantasia">Cond. Parcelamento</label>
                        <input type="text" class="form-control" name="nmgetNomeFantasia" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetCEP">Tipo da Operacao</label>
                        <input type="text" class="form-control" name="nmgetCEP" id="idgetCEP" size="10" maxlength="10" placeholder=""/>
                    </div> 
               
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

                            $ctab = "MOV_PEDS A";
                            $cccampo = "A.regid, A.seq_item, A.codigo, A.descr_item, A.quant, A.valor_unit, A.valor_unit * A.quant AS valor_tot ";
                            $cwhere = "A.PED = '" . $cped . "'";                            
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
                                <td><a class="ajax-action-links" onclick="index.php?p=dlgitenspedserv&id=(<?php echo $row['regid']; ?>);">Alterar</a></td>
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
            <div id="abaDadosComplementares" class="tab-pane container fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmcbxBanco">Seu Pedido</label>
                        <input type="text" class="form-control" name="nmgetCobranca" id="idgetCobranca" size="1" maxlength="1" placeholder=""/>
                    </div>
                    <div class="form-group col-md-3">   
                        <label for="nmgetCobranca">Doc. Fiscal</label>
                        <input type="text" class="form-control" name="nmgetCobranca" id="idgetCobranca" size="1" maxlength="1" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-6">   
                        <label for="nmgetJuros">Observação</label>
                        <input type="text" class="form-control" name="nmgetJuros" id="idgetJuros" size="6" maxlength="6" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetTolerancia">Desconto R$</label>
                        <input type="number" class="form-control" name="nmgetTolerancia" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-3">   
                        <label for="nmgetMulta">Acréscimo</label>
                        <input type="number" class="form-control" name="nmgetMulta" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                    </div>                     
                </div>
            </div>
            <div id="abaDemaisInformacoes" class="tab-pane container fade">
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-12">   
                        <label for="nmtextObservacao">Observacao</label>
                        <input type="text" class="form-control" name="nmtextObservacao" id="idtextObservacao" size="10" maxlength="10" placeholder=""/>
                    </div> 
                </div>
            </div> 
            <div class="row">     
                <div class="form-group col-md-3">   
                    <input name="nmbtnnmbtnBuscaCEP" type="submit" id="idbtnidbtnBuscaCEP" value="Emitir Nota Fiscal" />
                </div>

                <div class="form-group col-md-3">   
                    <input name="nmbtnnmbtnFinanceiro" type="submit" id="idbtnidbtnFinanceiro" value="Financeiro" />
                </div>
            </div>
        </div> 
    </main>
</html>
