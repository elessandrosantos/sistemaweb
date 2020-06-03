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
    <main class="container">
        <div class="row">     
            <div class="form-group col-md-5"> 
                <h5> Pedido </h5>
            </div>  
            <div class="form-group col-md-5">
            </div> 
            <div class="form-group col-md-5"> 
                <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
            </div> 
        </div>    
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#abaPedido">Pedido</a>
            </li>
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
            <div id="abaPedido" class="tab-pane container active"> 
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-3">   
                        <label for="nmgetCodigoAnterior">Número</label>
                        <input type="text" class="form-control" name="nmgetCodigoAnterior" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
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
            <div id="abaItens" class="tab-pane container fade">  
                <h5></h5>
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" class="form-control" name="nmgetDDD" id="idgetDDD" readonly="readonly"  size="10" maxlength="10" placeholder=""/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">   
                        <label for="nmgetDDD">Serviços</label>
                        <input type="text" class="form-control" name="nmgetDDD" id="idgetDDD" size="10" maxlength="10" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-2">   
                        <label for="nmgetTelefone1">Quantidade</label>
                        <input type="text" class="form-control" name="nmgetTelefone1" id="idgetTelefone1" size="15" maxlength="15" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-2">   
                        <label for="nmgetTelefone2">Valor Unitário</label>
                        <input type="text" class="form-control" name="nmgetTelefone2" id="idgetTelefone2" size="15" maxlength="15" placeholder=""/>
                    </div> 
                    <div class="form-group col-md-2">   
                        <label for="nmgetEmail">Total</label>
                        <input type="email" class="form-control" name="nmgetEmail" id="idgetEmail" size="100" maxlength="100" placeholder=""/>
                    </div>
                    <div class="form-group col-md-1"> 
                        <label for="nmgetEmail"></label>
                        <input name="atualizar" class="btn btn-success" type="submit" id="cadastrar" value="Incluir!" />
                    </div>
                </div>                                                
                <div class="margin-top-sm"> 
                    <table class="table table-striped table-bordered">                        
                        <thead>
                            <tr>
                                <th class="table-header">Registro</th>
                                <th class="table-header">Pedido</th>
                                <th class="table-header">Data</th>
                                <th class="table-header">Produto</th>
                                <th class="table-header">Quantidade</th>
                                <th class="table-header">Valor Unitário</th>
                                <th class="table-header">Editar</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <tr class="table-row" id="table-row-1">
                                <td onblur="saveToDatabase(this, 'regid', '1')" onclick="editRow(this);" contenteditable="true">1</td>
                                <td onblur="saveToDatabase(this, 'pedido', '1')" onclick="editRow(this);" contenteditable="true">P101010</td>
                                <td onblur="saveToDatabase(this, 'data_criacao', '1')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                <td onblur="saveToDatabase(this, 'codigo', '1')" onclick="editRow(this);" contenteditable="true">Arroz</td>
                                <td onblur="saveToDatabase(this, 'quant', '1')" onclick="editRow(this);" contenteditable="true">10</td>
                                <td onblur="saveToDatabase(this, 'valor_unit', '1')" onclick="editRow(this);" contenteditable="true">5,50</td>
                                <td><a class="ajax-action-links" onclick="deleteRecord(1);">Deletar</a></td>
                            </tr>
                            <tr class="table-row" id="table-row-2">
                                <td onblur="saveToDatabase(this, 'regid', '1')" onclick="editRow(this);" contenteditable="true">2</td>
                                <td onblur="saveToDatabase(this, 'pedido', '2')" onclick="editRow(this);" contenteditable="true">P101011</td>
                                <td onblur="saveToDatabase(this, 'data_criacao', '2')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                <td onblur="saveToDatabase(this, 'codigo', '2')" onclick="editRow(this);" contenteditable="true">Arroz10</td>
                                <td onblur="saveToDatabase(this, 'quant', '2')" onclick="editRow(this);" contenteditable="true">15</td>
                                <td onblur="saveToDatabase(this, 'valor_unit', '2')" onclick="editRow(this);" contenteditable="true">5,60</td>
                                <td><a class="ajax-action-links" onclick="deleteRecord(2);">Deletar</a></td>
                            </tr>
                            <tr class="table-row" id="table-row-3">
                                <td onblur="saveToDatabase(this, 'regid', '1')" onclick="editRow(this);" contenteditable="true">3</td>
                                <td onblur="saveToDatabase(this, 'pedido', '3')" onclick="editRow(this);" contenteditable="true">P101012</td>
                                <td onblur="saveToDatabase(this, 'data_criacao', '3')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                <td onblur="saveToDatabase(this, 'codigo', '3')" onclick="editRow(this);" contenteditable="true">Arroz20</td>
                                <td onblur="saveToDatabase(this, 'quant', '3')" onclick="editRow(this);" contenteditable="true">5,80</td>
                                <td onblur="saveToDatabase(this, 'valor_unit', '3')" onclick="editRow(this);" contenteditable="true">1,20</td>
                                <td><a class="ajax-action-links" onclick="deleteRecord(3);">Deletar</a></td>
                            </tr>
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
