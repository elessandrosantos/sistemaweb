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
        var par = $(this).parent().parent(); //tr
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
      alert(acao);
      alert(idwhere);
      
      
    switch (acao) {
        case 'inserir':
            for (var i = 0; i < dadosinput.length; i++) {
                var item = dadosinput[i];

                if (item.type == "checkbox") {
                    if (item.checked) {
                        campos += item.name + ", ";
                        dados += 1 + "','";
                    } else {
                        campos += item.name + ", ";
                        dados += 0 + "','";
                    }
                }

                if (item.type == "text") {
                    campos += item.name + ", ";
                    dados += item.value + "','";

                }

                if (item.type == "email") {
                    campos += item.name + ", ";
                    dados += item.value + "','";

                }
                if (item.type == "number") {
                    campos += item.name + ", ";
                    dados += item.value + "','";

                }

            }
            // Faz o loop para os dados de select
            for (var i = 0; i < dadosselect.length; i++) {
               var item = dadosselect[i];

                  campos += item.name + ", ";
                  dados += item.value + "','";

            }
            
            campos = campos.substr(0, campos.length - 2);
            dados = dados.substr(0, dados.length - 2);

            // inserir - acao, tab, campos, valores, where 

            $.ajax({
                url: "/_conexao/crud_ajax.php",
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
            
            var setdados = "";
            for (var i = 0; i < dadosinput.length; i++) {
                var item = dadosinput[i];

                if (item.type == "checkbox") {
                    alert
                    if (item.checked) {
                        setdados += item.name + "='" + 1 + "'," ;
                    } else {
                        setdados += item.name + "='" + 0 + "'," ;
                    }
                }

                if (item.type == "text") {
                    setdados += item.name + "='" + item.value + "'," ;
                }

                if (item.type == "email") {
                    setdados += item.name + "='" + item.value + "'," ;
                }
                if (item.type == "number") {
                    setdados += item.name + "='" + item.value + "'," ;
                }

            }
            
            // Faz o loop para os dados de select
            for (var i = 0; i < dadosselect.length; i++) {
               var item = dadosselect[i];

                  campos += item.name + ", ";
                  dados += item.value + "','";

            }
 
            

            setdados = setdados.substr(0, setdados.length - 1);
            //dados = dados.substr(0, dados.length - 2);
            alert(setdados);
            $.ajax({
                url: "/_conexao/crud_ajax.php",
                type: "POST",
                data: 'acao=alterar' + '&tab=' + tabela + '&setdados=' + setdados + '&where=' + where,
                success: function (data) {               
                    alert(data);
                    alert('Cadastro Atualizado');
                }
            });
            break;
        default:
            alert("Nenhuma função definipara para a acão"+ acao + "!");
       
    }

}
