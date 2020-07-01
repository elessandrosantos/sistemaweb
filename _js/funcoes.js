
$(function () {
    function Adicionar() {
        $("#tblCadastro tbody").append(
                "<tr>" +
                "<td><input type='text'/></td>" +
                "<td><input type='text'/></td>" +
                "<td><input type='text'/></td>" +
                "<td><img src='images/disk.png' class='btnSalvar'><img src='images/delete.png' class='btnExcluir'/></td>" +
                "</tr>");

        $(".btnSalvar").bind("click", Salvar);
        $(".btnExcluir").bind("click", Excluir);
    }
    ;

    function Salvar() {
        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        var tdTelefone = par.children("td:nth-child(2)");
        var tdEmail = par.children("td:nth-child(3)");
        var tdBotoes = par.children("td:nth-child(4)");

        tdNome.html(tdNome.children("input[type=text]").val());
        tdTelefone.html(tdTelefone.children("input[type=text]").val());
        tdEmail.html(tdEmail.children("input[type=text]").val());
        tdBotoes.html("<img src='images/delete.png'class='btnExcluir'/><img src='images/pencil.png' class='btnEditar'/>");

        $(".btnEditar").bind("click", Editar);
        $(".btnExcluir").bind("click", Excluir);
    }
    ;

    function Editar() {
        var par = $(this).parent().parent(); //tr
        var tdNome = par.children("td:nth-child(1)");
        var tdTelefone = par.children("td:nth-child(2)");
        var tdEmail = par.children("td:nth-child(3)");
        var tdBotoes = par.children("td:nth-child(4)");

        tdNome.html("<input type='text' id='txtNome' value='" + tdNome.html() + "'/>");
        tdTelefone.html("<input type='text'id='txtTelefone' value='" + tdTelefone.html() + "'/>");
        tdEmail.html("<input type='text' id='txtEmail' value='" + tdEmail.html() + "'/>");
        tdBotoes.html("<img src='images/disk.png' class='btnSalvar'/>");

        $(".btnSalvar").bind("click", Salvar);
        $(".btnEditar").bind("click", Editar);
        $(".btnExcluir").bind("click", Excluir);
    }
    ;

    function Excluir() {
        var par = $(this).parent().parent(); 
        par.remove();
    }
    ;

    $(".btnEditar").bind("click", Editar);
    $(".btnExcluir").bind("click", Excluir);
    $("#btnAdicionar").bind("click", Adicionar);
});

function getdadosform(tabela, acao, idwhere) {

    var campos = "";
    var dados = "'";
    var dadosinput = document.getElementsByTagName("INPUT");
    var dadosselect = document.getElementsByTagName("SELECT");
    var where = "";
    var lret  = true;

    switch (tabela) {
       case 'clientes':
           lret = validacliente();
           break;
       case 'geral':
           validageral();
           break;
       case 'pedido':
           validapedido();
           break;
       case 'mov_peds':
           validamovpeds();
           break;
       default:
          alert("Nenhuma função definida para para a tabela " + tabela + "!");
    }
    
    if (!lret){
      alert ("saiu pelo lret");  
      return ;  
    }
    alert ("passou lret");
    var cpagina = window.location.pathname;
    var pos = 0;

    pos = cpagina.indexOf("/", 1);
    cpagina = cpagina.substr(0, pos);

    switch (acao) {
        case 'inserir':
            for (var i = 0; i < dadosinput.length; i++) {
                var item = dadosinput[i];

                if (item.type == "checkbox") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {
                        if (item.checked) {
                            campos += item.name + ", ";
                            dados += 1 + "','";
                        } else {
                            campos += item.name + ", ";
                            dados += 0 + "','";
                        }
                    }
                }

                if (item.type == "text") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {
                        campos += item.name + ", ";
                        dados += item.value + "','";
                    }

                }

                if (item.type == "date") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        campos += item.name + ", ";
                        dados += item.value + "','";
                    }

                }
                
                if (item.type == "email") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        campos += item.name + ", ";
                        dados += item.value + "','";
                    }
                }
                if (item.type == "number") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {
                        campos += item.name + ", ";
                        dados += item.value + "','";
                    }
                }

            }
            // Faz o loop para os dados de select
            for (var i = 0; i < dadosselect.length; i++) {
                var item = dadosselect[i];
                pos = item.name.indexOf("#", 0);
                if (pos < 0) {

                    campos += item.name + ", ";
                    dados += item.value + "','";
                }
            }

            campos = campos.substr(0, campos.length - 2);
            dados = dados.substr(0, dados.length - 2);

            // inserir - acao, tab, campos, valores, where 

            $.ajax({
                url: cpagina + "/_conexao/crud_ajax.php",
                type: "POST",
                data: 'acao=inserir' + '&tab=' + tabela + '&campos=' + campos + '&valores=' + dados + '&where=' + where,
                success: function (data) {
                    alert(data);
                    alert('Cadastro Realizado');
                }
            });
            break;

        case 'alterar':

            where = idwhere;
            where = where.replace(/#/g, "'");

            var setdados = "";

            for (var i = 0; i < dadosinput.length; i++) {
                var item = dadosinput[i];
                pos = item.name.indexOf("#", 0);
                if (pos < 0) {

                    if (item.type == "checkbox") {

                        if (item.checked) {
                            setdados += item.name + "='" + 1 + "',";
                        } else {
                            setdados += item.name + "='" + 0 + "',";
                        }
                    }
                }

                if (item.type == "text") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        setdados += item.name + "='" + item.value + "',";
                    }
                }

                if (item.type == "date") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        setdados += item.name + "='" + item.value + "',";
                    }
                }


                if (item.type == "email") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        setdados += item.name + "='" + item.value + "',";
                    }
                }
                if (item.type == "number") {
                    pos = item.name.indexOf("#", 0);
                    if (pos < 0) {

                        setdados += item.name + "='" + item.value + "',";
                    }
                }

            }

            // Faz o loop para os dados de select
            for (var i = 0; i < dadosselect.length; i++) {
                var item = dadosselect[i];
                //     alert(item.name);
                //     alert(item.value);
                pos = item.name.indexOf("#", 0);
                if (pos < 0) {

                    setdados += item.name + "='" + item.value + "',";
                }
                //campos += item.name + ", ";
                //dados += item.value + "','";

            }



            setdados = setdados.substr(0, setdados.length - 1);
            //dados = dados.substr(0, dados.length - 2);
            //  alert(setdados);

            $.ajax({
                url: cpagina + "/_conexao/crud_ajax.php",
                type: "POST",
                data: 'acao=alterar' + '&tab=' + tabela + '&setdados=' + setdados + '&where=' + where,
                success: function (data) {
                    alert(data);
                    //alert('Cadastro Atualizado');
                }
            });
            break;
        default:
            alert("Nenhuma função definida para para a acão" + acao + "!");

    }

}

function verificapedido(cpedido) {

   var tabela = 'pedidos';
   var campos =  'ped';
   var where =  "ped='"+cpedido+"'";
   var cpagina = window.location.pathname;
  
   pos = cpagina.indexOf("/", 1);
   cpagina = cpagina.substr(0, pos);
   
   
   $.ajax({
        url: cpagina + "/_conexao/crud_ajax.php",
        type: "POST",
        data: 'acao=obter' + '&tab=' + tabela + '&campos=' + campos + '&where=' + where,                
        success: function (data) {
            //alert(data.length);
            
            if ( data.length <= 2 ){               
               alert("Necessário Salvar o pedido antes de incluir o item!");
               //return false;
            }else{
               location.href='index.php?p=dlgitenspedserv';
            }     
            
            // retfunc = data;
            // alert('Cadastro Atualizado 522');
        }
    });

 }  
 
 
 function validacliente() {
     alert("clientes_Alert");
     return false;
 }
 
 function validageral() {
     alert("geral_Alert");
 }
 
 function validapedido() {
     alert("pedidos_Alert");
 }
 
 function validamovpeds() {
     alert("movpeds_Alert");     
 }
 
 
 
 


