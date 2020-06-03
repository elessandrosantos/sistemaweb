<!DOCTYPE html>
<html lang="en">

    <head>
        <title>jQuery AJAX Inline CRUD com PHP - Viviane Nonato</title>

        <script src="_js/jquery-2.js" type="text/javascript"></script>
        <script>

            function createNew() {
            $("#add-more").hide();
            var data = '<tr class="table-row" id="new_row_ajax">' +
                    '<td contenteditable="true" id="regid" onBlur="addToHiddenField(this,\'regid\')" onClick="editRow(this);"></td>' +
                    '<td contenteditable="true" id="pedido" onBlur="addToHiddenField(this,\'pedido\')" onClick="editRow(this);"></td>' +
                    '<td contenteditable="true" id="data" onBlur="addToHiddenField(this,\'data\')" onClick="editRow(this);"></td>' +
                    '<td contenteditable="true" id="produto" onBlur="addToHiddenField(this,\'produto\')" onClick="editRow(this);"></td>' +
                    '<td contenteditable="true" id="quantidade" onBlur="addToHiddenField(this,\'quantidade\')" onClick="editRow(this);"></td>' +
                    '<td contenteditable="true" id="valorunitario" onBlur="addToHiddenField(this,\'valorunitario\')" onClick="editRow(this);"></td>' +
                    '<td><input type="hidden" id="pedido" /><input type="hidden" id="data" /><input type="hidden" id="produto" /><input type="hidden" id="quantidade" /><input type="hidden" id="valorunitario" /><span id="confirmAdd"><a onClick="addToDatabase()" class="ajax-action-links">Salvar</a> / <a onclick="cancelAdd();" class="ajax-action-links">Cancelar</a></span></td>' +
                    '</tr>';
            $("#table-body").append(data);
            }
            function cancelAdd() {
            $("#add-more").show();
            $("#new_row_ajax").remove();
            }
            function editRow(editableObj) {
            $(editableObj).css("background", "#FFF");
            }

            function saveToDatabase(editableObj, column, id) {
            $(editableObj).css("background", "#FFF url(loaderIcon.gif) no-repeat right");
            $.ajax({
            url: "edit1.php",
                    type: "POST",
                    data:'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id,
                    success: function(data){
                    $(editableObj).css("background", "#FDFDFD");
                    }
            });
            }

            function addToDatabase() {
               var regid = $("#regid").val();
               var pedido = $("#pedido").val();
               var dataped = $("#data").val();
               var produto = $("#produto").val();
               var quantidade = $("#quantidade").val();
               var valor_uni = $("#valorunitario").val();
               $("#new_row_ajax").remove();
               $("#add-more").show();
             //  $("#table-body").append('<tr class="table-row" id="table-row-0">' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + regid + '</td>' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + pedido + '</td>' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + dataped + '</td>' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + produto + '</td>' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + quantidade + '</td>' +
             //                          '<td contenteditable="true" onBlur="saveToDatabase(this)" onClick="editRow(this);">' + valor_uni + '</td>' +    
             //                          '<td><a class="ajax-action-links" onclick="deleteRecord(0);">Delete</a></td>' +
                  //  '<td><input type="hidden" id="pedido" /><span id="DeleteItem"><a onClick="deleteRecord(0)" class="ajax-action-links">Deletar</a>'+
             //                           '</tr>');
               $("#confirmAdd").html('<img src="loaderIcon.gif" />');
               
               $.ajax({
               url: "add1.php",
               type: "POST",
               data:'&regid='+regid+'&pedido='+pedido+'&data='+dataped+'&produto='+produto+'&quant='+quantidade+'&valor_uni='+ valor_uni,
               success: function(data){               
                  $("#new_row_ajax").remove();
                  $("#add-more").show();
                  $("#table-body").append(data);
               }
               });
            }
            
            function addToHiddenField(addColumn, hiddenField) {
               var columnValue = $(addColumn).text();
               $("#" + hiddenField).val(columnValue);
            }

            function deleteRecord(id) {     
              // var id = $("#regid").val();
               //alert("Alerta"+id);
               if (confirm('Tem certeza que vai deletar a tabela?'  )) {
               $.ajax({
                  url: "delete1.php",
                  type: "POST",
                  data:'regid='+id,
                  success: function(data){
                 
                     $("#table-row-" + id).remove();
                  }
               });
            }
            }
            

        </script>

        <!-- BootstrapCDN e Ajax-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sketchy/bootstrap.min.css"> 
        <style type="text/css">    
            .tbl-qa{width: 98%;font-size:0.9em;border-bottom: 5px solid #D5D5D5;}
            .tbl-qa th.table-header {margin-top: 80px;padding: 10px; text-align: left;padding:12px;border-bottom: 5px solid #D5D5D5;}
            .tbl-qa .table-row td { height: 2px;padding:10px;border-bottom: 1px solid #D5D5D5;}
            .ajax-action-links {color: #09F; margin: 10px 0px;cursor:pointer;}
            .ajax-action-button { border:2px solid #D5D5D5; margin: 10px 1px;cursor:pointer;display: inline-block;padding: 10px 20px;}
            .margin-top-md{margin-top: 80px;}
        </style>

    </head>        


    <div class="content">
        <div id="tutorial-body">
            <div id="tutorial">
                <div class="demo-content">

                    <body>                       

                        <!-- Final do Ajax poll code  -->
                        <div class="container">    
                            <div class="margin-top-md"> 

                                <table class="tbl-qa">
                                    <h1>jQuery AJAX Inline CRUD com PHP </h1>

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
                                            <td onblur="saveToDatabase(this, 'data', '1')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                            <td onblur="saveToDatabase(this, 'produto', '1')" onclick="editRow(this);" contenteditable="true">Arroz</td>
                                            <td onblur="saveToDatabase(this, 'quantidade', '1')" onclick="editRow(this);" contenteditable="true">10</td>
                                            <td onblur="saveToDatabase(this, 'valorunitario', '1')" onclick="editRow(this);" contenteditable="true">5,50</td>
                                            <td><a class="ajax-action-links" onclick="deleteRecord(1);">Deletar</a></td>
                                        </tr>
                                        <tr class="table-row" id="table-row-2">
                                            <td onblur="saveToDatabase(this, 'regid', '1')" onclick="editRow(this);" contenteditable="true">2</td>
                                            <td onblur="saveToDatabase(this, 'pedido', '2')" onclick="editRow(this);" contenteditable="true">P101011</td>
                                            <td onblur="saveToDatabase(this, 'data', '2')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                            <td onblur="saveToDatabase(this, 'produto', '2')" onclick="editRow(this);" contenteditable="true">Arroz10</td>
                                            <td onblur="saveToDatabase(this, 'quantidade', '2')" onclick="editRow(this);" contenteditable="true">15</td>
                                            <td onblur="saveToDatabase(this, 'valorunitario', '2')" onclick="editRow(this);" contenteditable="true">5,60</td>
                                            <td><a class="ajax-action-links" onclick="deleteRecord(2);">Deletar</a></td>
                                        </tr>
                                        <tr class="table-row" id="table-row-3">
                                            <td onblur="saveToDatabase(this, 'regid', '1')" onclick="editRow(this);" contenteditable="true">3</td>
                                            <td onblur="saveToDatabase(this, 'pedido', '3')" onclick="editRow(this);" contenteditable="true">P101012</td>
                                            <td onblur="saveToDatabase(this, 'data', '3')" onclick="editRow(this);" contenteditable="true">19/05/2020</td>
                                            <td onblur="saveToDatabase(this, 'produto', '3')" onclick="editRow(this);" contenteditable="true">Arroz20</td>
                                            <td onblur="saveToDatabase(this, 'quantidade', '3')" onclick="editRow(this);" contenteditable="true">5,80</td>
                                            <td onblur="saveToDatabase(this, 'valorunitario', '3')" onclick="editRow(this);" contenteditable="true">1,20</td>
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
