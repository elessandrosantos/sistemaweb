<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Pedido</title>
        <script src="_js/jquery-2.js" type="text/javascript"></script>
        <script src="_js/pedido.js" type="text/javascript"></script>
        <!-- BootstrapCDN e Ajax-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"> 
        <link rel="stylesheet" type="text/css" href="_css\pedido.css"/>
                 
    </head>        
    <main class="container">
        <div class="row">     
            <div class="form-group col-md-5"> 
                <h2>Clientes </h2>
            </div>  
            <div class="form-group col-md-5">
            </div> 
            <div class="form-group col-md-5"> 
                <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
            </div> 
        </div>    
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#abaPrincipal">Principal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaEnderecosEntrega">Enderecos Entrega</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDadosdeCobranca">Dados de Cobranca</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#abaDemaisInformacoes">Demais Informacoes</a>
            </li>
        </ul>
                            <div class="margin-top-md"> 
                                <table class="tbl-qa">
                                    <h1>Itens do Pedido </h1>
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
                                <div class="ajax-action-button" id="add-more" onclick="createNew();" style="display: inline-block;">Adicionar Itens</div>

                            </div>
                        </div> 
                    </body>
                </div>
            </div>
        </div>
    </div>
</html>
