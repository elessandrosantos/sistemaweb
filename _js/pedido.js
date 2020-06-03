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
   // alert("Executou " + column + " valor campo " + $(editableObj).text() + " id " + id);
    $.ajax({
        url: "/_conexao/edit.php",
        type: "POST",
        data: 'column=' + column + '&editval=' + $(editableObj).text() + '&id=' + id,
        success: function (data) {            
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
        url: "/_conexao/add.php",
        type: "POST",
        data: '&regid=' + regid + '&pedido=' + pedido + '&data=' + dataped + '&produto=' + produto + '&quant=' + quantidade + '&valor_uni=' + valor_uni,
        success: function (data) {
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
    if (confirm('Tem certeza que vai deletar a tabela?')) {
        $.ajax({
            url: "/_conexao/delete.php",
            type: "POST",
            data: 'regid=' + id,
            success: function (data) {

                $("#table-row-" + id).remove();
            }
        });
    }
}

