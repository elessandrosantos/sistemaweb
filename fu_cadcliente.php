<?php

// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$snPessFisica = filter_input(INPUT_POST, "nmchkPessoaFisica", FILTER_SANITIZE_STRING); //atribuição do campo "nome" vindo do formulário para variavel
$snAtivo = true;
$ccod_ant = filter_input(INPUT_POST, "nmgetCodigoAnterior", FILTER_SANITIZE_STRING); //atribuição do campo "nome" vindo do formulário para variavel                                
$ccnpj = filter_input(INPUT_POST, "nmgetCNPJCPF", FILTER_SANITIZE_STRING); //atribuição do campo "nome" vindo do formulário para variavel                                
$razao = filter_input(INPUT_POST, "nmgetRazaoSocial", FILTER_SANITIZE_STRING); //atribuição do campo "nome" vindo do formulário para variavel
$nome = filter_input(INPUT_POST, "nmgetNomeFantasia", FILTER_SANITIZE_STRING); //atribuição do campo "nome" vindo do formulário para variavel

$email = filter_input(INPUT_POST, "nmgetEmail", FILTER_SANITIZE_EMAIL); //atribuição do campo "email" vindo do formulário para variavel
$website = filter_input(INPUT_POST, "nmgetWebSite", FILTER_SANITIZE_STRING); //atribuição do campo "email" vindo do formulário para variavel
$ddd = filter_input(INPUT_POST, "nmgetDDD", FILTER_SANITIZE_STRING); //atribuição do campo "ddd" vindo do formulário para variavel
$tel1 = filter_input(INPUT_POST, "nmgetTelefone1", FILTER_SANITIZE_STRING); //atribuição do campo "telefone" vindo do formulário para variavel
$tel2 = filter_input(INPUT_POST, 'nmgetTelefone2', FILTER_SANITIZE_STRING); //atribuição do campo "telefone" vindo do formulário para variavel

$clogra = filter_input(INPUT_POST, "nmcbxLogradouro", FILTER_SANITIZE_STRING); //atribuição do campo "endereco" vindo do formulário para variavel
$endereco = filter_input(INPUT_POST, "nmgetEndereco", FILTER_SANITIZE_STRING); //atribuição do campo "endereco" vindo do formulário para variavel
$numlog = filter_input(INPUT_POST, "nmgetNo", FILTER_SANITIZE_STRING); // Numero Logradouro;
$ccomplemento = filter_input(INPUT_POST, "nmgetComplemento", FILTER_SANITIZE_STRING); // Numero Logradouro;
$cidade = filter_input(INPUT_POST, "nmcbxCidade", FILTER_SANITIZE_STRING); //atribuição do campo "cidade" vindo do formulário para variavel
$estado = filter_input(INPUT_POST, "nmcbxEstado", FILTER_SANITIZE_STRING); //atribuição do campo "estado" vindo do formulário para variavel
$bairro = filter_input(INPUT_POST, "nmgetBairro", FILTER_SANITIZE_STRING); //atribuição do campo "bairro" vindo do formulário para variavel
$pais = filter_input(INPUT_POST, "nmcbxPais", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
$cep = filter_input(INPUT_POST, "nmgetCEP", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
//Endereco de entrega
$clograent = filter_input(INPUT_POST, "nmgetLogradouroEnt", FILTER_SANITIZE_STRING); //atribuição do campo "endereco" vindo do formulário para variavel
$enderecoent = filter_input(INPUT_POST, "nmgetEnderecoEnt", FILTER_SANITIZE_STRING); //atribuição do campo "endereco" vindo do formulário para variavel
$numlogent = filter_input(INPUT_POST, "nmgetNoEnt", FILTER_SANITIZE_STRING); // Numero Logradouro;
$ccomplementoent = filter_input(INPUT_POST, "nmgetComplementoEnt", FILTER_SANITIZE_STRING); // Numero Logradouro;
$cidadeent = filter_input(INPUT_POST, "nmgetCidadeEnt", FILTER_SANITIZE_STRING); //atribuição do campo "cidade" vindo do formulário para variavel
//$estado            = filter_input(INPUT_POST, "nmcbxEstado", FILTER_SANITIZE_STRING);//atribuição do campo "estado" vindo do formulário para variavel
$bairroent = filter_input(INPUT_POST, "nmgetBairroEnt", FILTER_SANITIZE_STRING); //atribuição do campo "bairro" vindo do formulário para variavel
$paisent = filter_input(INPUT_POST, "nmgetPaisEnt", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
$cepent = filter_input(INPUT_POST, "nmgetCepEnt", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
// Dados de Cobrança
$ccodban = filter_input(INPUT_POST, "nmcbxBanco", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
$ccodcob = filter_input(INPUT_POST, "nmgetCobranca", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
$njuros = filter_input(INPUT_POST, "nmgetJuros", FILTER_SANITIZE_NUMBER_FLOAT); //atribuição do campo "pais" vindo do formulário para variavel
$ntoleranciajuros = filter_input(INPUT_POST, "nmgetTolerancia", FILTER_SANITIZE_NUMBER_FLOAT); //atribuição do campo "pais" vindo do formulário para variavel
$nmulta = filter_input(INPUT_POST, "nmgetMulta", FILTER_SANITIZE_NUMBER_FLOAT); //atribuição do campo "pais" vindo do formulário para variavel
$ntoleranciamulta = filter_input(INPUT_POST, "nmtextObservacao", FILTER_SANITIZE_NUMBER_FLOAT); //atribuição do campo "pais" vindo do formulário para variavel
//

$mObs = filter_input(INPUT_POST, "nmtextObservacao", FILTER_SANITIZE_STRING); //atribuição do campo "pais" vindo do formulário para variavel
$ddata = date("Y-m-d H:i:s");
//Valida Duplidade de CNPJ, Email e RG
$cret = '';

if (isset($_POST["salvar"])) {

    include_once $_SERVER['DOCUMENT_ROOT'] . "/_conexao/conexao.php";
    $conn = conectar();

    if (!Empty($ccnpj)) {
        $cSql = "SELECT             " .
                "   A.nome          " .
                "FROM               " .
                "   clientes A      " .
                "WHERE              " .
                "   A.CGC = ?       ";

        $cSql = $conn->prepare($cSql);
        $cSql->bindParam(1, $ccnpj, PDO::PARAM_STR);
        $cSql->execute();
        $areg = $cSql->fetchAll();

        if (count($areg) >= 1) {
            $valid = false;
            $cret .= 'e';
        }
    }

    if (!empty($cret)) {
        header("Location: cadastrar.php?text=" . $cret);
        return;
    }

    // Fim da Validação
    //Query que realiza a inserção dos dados no banco de dados na tabela indicada acima   
    $query = "INSERT INTO `clientes` ( `CODIGO_A`,`CGC`,`RAZAO`,`NOME`,`LOGRA`,`ENDERECO`,`NUMERO`,`CJ`,`CEP`,`BAIRRO`,`CIDADE`,"
            . "`ESTADO`,`COD_PAIS`,`DDD`,`TEL1`,`TEL2`,`EMAIL`,`HOMEPAGE`,`DATA_CAD`)"
            . "VALUES ('$ccod_ant','$ccnpj','$razao','$nome','$clogra','$endereco','$numlog','$ccomplemento','$cep','$bairro','$cidade',"
            . "'$estado','$pais','$ddd','$tel1','$tel2','$email','$website','$ddata')";

    $cadastrausuario = $conn->prepare($query);

    if ($cadastrausuario->execute()) {
        echo('Cadastro Realizado com Sucesso!!!');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    } else {
        echo('Não foi possível cadastrar o Cliente');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    }
}

if (isset($_POST["alterar"])) {

    include_once $_SERVER['DOCUMENT_ROOT'] . "/_conexao/conexao.php";
    $conn = conectar();

    $codcli = $_POST["cod_cli"];

    //Query que realiza a inserção dos dados no banco de dados na tabela indicada acima   
    $query = "UPDATE `clientes` SET `CODIGO_A`='$ccod_ant',`CGC`='$ccnpj',`RAZAO`='$razao',`NOME`='$nome',`LOGRA`='$clogra',`ENDERECO`='$endereco',`NUMERO`='$numlog',"
            . "`CJ`='$ccomplemento',`CEP`='$cep',`BAIRRO`='$bairro',`CIDADE`='$cidade',`ESTADO`='$estado',`COD_PAIS`='$pais',`DDD`='$ddd',`TEL1`='$tel1',`TEL2`='$tel2',"
            . " `EMAIL`='$email',`HOMEPAGE`='$website',`DATA_ATU`='$ddata' where `XCLIENTES`='$codcli'";

    $atualizacliente = $conn->prepare($query);

    if ($atualizacliente->execute()) {
        echo('Cadastro Atualziado com Sucesso!!!');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    } else {
        echo('Falha ao atualizado o cadastro do Cliente');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    }
}

if (isset($_POST["excluir"])) {

    include_once $_SERVER['DOCUMENT_ROOT'] . "/_conexao/conexao.php";
    $conn = conectar();

    $codcli = $_POST["cod_cli"];

    $query = "DELETE FROM `clientes` where XCLIENTES = $codcli";

    $delcliente = $conn->prepare($query);

    if ($delcliente->execute()) {
        echo('Cadastro Realizado com Sucesso!!!');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    } else {
        echo('Não foi possível cadastrar o Cliente');
        header("Location: index.php?p=dlgpesqclientes");
        return;
    }
}
?>
