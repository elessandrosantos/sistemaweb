<?php
session_start();

$idcli = $_SESSION['param'];

include $_SESSION['pastaapp']. "/_conexao/crud.php";
$conn = conectar();

$ctab = "clientes";
$cccampo = "*";
$cwhere = 'XCLIENTES=' . $idcli;

$res = new crud();
$aret = $res->obter($cccampo, $ctab, $cwhere);

foreach ($aret as $row) {

    $snPessFisica = $row['PESS'];
    $snAtivo = $row['INATIVO'];
    $ccod_ant = $row['CODIGO_A'];
    $ccnpj = $row['CGC'];
    $razao = $row['RAZAO'];
    $nome = $row['NOME'];
    $email = $row['EMAIL'];
    $website = $row['HOMEPAGE'];
    $ddd = $row['DDD'];
    $tel1 = $row['TEL1'];
    $tel2 = $row['TEL2'];
    $clogra = $row['LOGRA'];
    $endereco = $row['ENDERECO'];
    $numlog = $row['NUMERO'];
    $ccomplemento = $row['CJ'];
    $cidade = $row['CIDADE'];
    $estado = $row['ESTADO'];
    $bairro = $row['BAIRRO'];
    $pais = $row['PAIS'];
    $cep = $row['CEP'];
    $clograent = $row['LOGRA_E'];
    $enderecoent = $row['ENTREGA'];
    $numlogent = $row['NUM_E'];
    $ccomplementoent = $row['CJ_E'];
    $cidadeent = $row['CIDADE_E'];
    $estadoent = $row['ESTADO_E'];
    $bairroent = $row['BAIRRO_E'];
    $paisent = $row['PAIS_E'];
    $cepent = $row['CEP_E'];
    $ccodban = $row['COD_BAN'];
    $ccodcob = $row['COD_COB'];
    $njuros = $row['PER_JUROS'];
    $ntoleranciajuros = $row['DATA_JUROS'];
    $nmulta = $row['PER_MULTA'];
    $ntoleranciamulta = $row['DATA_MULTA'];
    $mObs = $row['OBS'];


    if ($snPessFisica == '1') {
        $snnmPess = 'on';
        $chkpess = 'checked';
    } else {
        $snnmPess = 'off';
        $chkpess = '';
    }

    if ($snAtivo == '1') {
        $snnmatv = 'on';
        $chkatv = 'checked';
    } else {
        $snnmatv = 'off';
        $chkatv = '';
    }
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<script src="_js/funcoes.js" type="text/javascript"></script>  -->
    </head>  
</html>
<form id="fatucli" name="formnomeatuclie" method="post" onsubmit="return getdadosform('CLIENTES', 'alterar', 'XCLIENTES=<?php echo $idcli; ?>'); return false;">  <!--<?php echo $idcli; ?>-->
    <body>
        <main class="container">
            <div class="row">     
                <div class="form-group col-md-5"> 
                    <h2>Clientes </h2>
                </div>  
                <div class="form-group col-md-5">
                </div> 
                <div class="form-group col-md-5"> 

                    <input class="btn btn-success" name="nmbtnSalvar" type="submit" id="idbtnSalvar" value="Salvar" /> 
                    <a class="btn-warning"  href="index.php?p=dlgpesqclientes">Cancelar</a>

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
            <div class="tab-content" id="cadastro">
                <div id="abaPrincipal" class="tab-pane container active">
                    <h4>Principal</h4>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input value ="<?php echo($snnmPess); ?>" type="checkbox" name="PESS" id="idchkPessoaFisica" <?php echo($chkpess); ?>/>
                            <label for="nmlblPessoa Fisica">Pessoa Fisica</label>
                        </div>
                        <div class="form-group col-md-3">
                            <input value ="<?php echo($snnmatv); ?>" type="checkbox" name="INATIVO" id="idchkInativo" <?php echo($chkatv); ?>/>
                            <label for="nmlblInativo">Inativo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetCodigoAnterior">Codigo Anterior</label>
                            <input value ="<?php echo($ccod_ant); ?>" type="text" class="form-control" name="CODIGO_A" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetCNPJCPF">CNPJ / CPF</label>
                            <input value ="<?php echo($ccnpj); ?>" type="text" class="form-control" name="CGC" id="idgetCNPJCPF" size="20" maxlength="20" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-6">   
                            <label for="nmgetRazaoSocial">Razao Social</label>
                            <input value ="<?php echo($razao); ?>" type="text" class="form-control" name="RAZAO" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmgetNomeFantasia">Nome Fantasia</label>
                            <input value ="<?php echo($nome); ?>" type="text" class="form-control" name="NOME" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetCEP">CEP</label>
                            <input value ="<?php echo($cep); ?>" type="text" class="form-control" name="CEP" id="idgetCEP" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmcbxLogradouro">Logradouro</label>                        
                            <select value ="<?php echo($clogra); ?>" name="LOGRA" name="LOGRA" class="form-control" id="idcbxLogradouro"><option>Logradouro</option>
                                <?php
                                $conn = conectar();
                                $ctab = "logradouros";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 
                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmgetEndereco">Endereco</label>
                            <input value ="<?php echo($endereco); ?>" type="text" class="form-control" name="ENDERECO" id="idgetEndereco" size="50" maxlength="50" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetNo">No.</label>
                            <input value ="<?php echo($numlog); ?>" type="text" class="form-control" name="NUMERO" id="idgetNo" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-4">   
                            <label for="nmgetComplemento">Complemento</label>
                            <input value ="<?php echo($ccomplemento); ?>" type="text" class="form-control" name="CJ" id="idgetComplemento" size="15" maxlength="15" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetBairro">Bairro</label>
                            <input value ="<?php echo($bairro); ?>" type="text" class="form-control" name="BAIRRO" id="idgetBairro" size="30" maxlength="30" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmcbxCidade">Cidade</label>
                            <select value ="<?php echo($cidade); ?>" name="CIDADE" class="form-control" id="idcbxCidade"><option>Cidade</option>
                                <?php
                                $conn = conectar();
                                $ctab = "cidades";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 
                            </select> 
                        </div>
                        <div class="form-group col-md-3">   
                            <label for="nmcbxEstado">Estado</label>
                            <select value ="<?php echo($estado); ?>" name="ESTADO" class="form-control" id="idcbxEstado"><option>Estado</option>
                                <?php
                                $conn = conectar();
                                $ctab = "estados";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 

                            </select> 
                        </div>
                        <div class="form-group col-md-3">   
                            <label for="nmcbxPais">Pais</label>
                            <select value ="<?php echo($pais); ?>" name="COD_PAIS" class="form-control" id="idcbxPais"><option>Pais</option>
                                <?php
                                $conn = conectar();
                                $ctab = "pais";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 

                            </select> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">   
                            <label for="nmgetDDD">DDD</label>
                            <input value ="<?php echo($ddd); ?>" type="text" class="form-control" name="DDD" id="idgetDDD" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetTelefone1">Telefone 1</label>
                            <input value ="<?php echo($tel1); ?>" type="text" class="form-control" name="TEL1" id="idgetTelefone1" size="15" maxlength="15" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetTelefone2">Telefone 2</label>
                            <input value ="<?php echo($tel2); ?>" type="text" class="form-control" name="TEL2" id="idgetTelefone2" size="15" maxlength="15" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-6">   
                            <label for="nmgetEmail">E-mail</label>
                            <input value ="<?php echo($email); ?>" type="email" class="form-control" name="EMAIL" id="idgetEmail" size="100" maxlength="100" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">   
                            <label for="nmgetWebSite">WebSite</label>
                            <input value ="<?php echo($website); ?>" type="text" class="form-control" name="HOMEPAGE" id="idgetWebSite" size="50" maxlength="50" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div id="abaEnderecosEntrega" class="tab-pane container fade">
                    <h4>Enderecos Entrega</h4>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetCep">Cep</label>
                            <input value ="<?php echo($cepent); ?>" type="text" class="form-control" name="CEP_E" id="idgetCepEnt" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetLogradouro">Logradouro</label>                        
                            <select value ="<?php echo($clograent); ?>" name="LOGRA" name="LOGRA" class="form-control" id="idcbxLogradouro"><option>Logradouro</option>
                                <?php
                                $conn = conectar();
                                $ctab = "logradouros";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 
                            </select> 


                        </div> 
                        <div class="form-group col-md-5">   
                            <label for="nmgetEndereco">Endereco</label>
                            <input value ="<?php echo($enderecoent); ?>" type="text" class="form-control" name="ENTREGA" id="idgetEnderecoEnt" size="80" maxlength="80" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-1">   
                            <label for="nmgetNo">No.</label>
                            <input value ="<?php echo($numlogent); ?>" type="text" class="form-control" name="NUM_E" id="idgetNoEnt" size="6" maxlength="6" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetComplemento">Complemento</label>
                            <input value ="<?php echo($ccomplementoent); ?>" type="text" class="form-control" name="CJ_E" id="idgetComplementoEnt" size="15" maxlength="15" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetBairro">Bairro</label>
                            <input value ="<?php echo($bairroent); ?>" type="text" class="form-control" name="BAIRRO_E" id="idgetBairroEnt" size="30" maxlength="30" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-4">   
                            <label for="nmgetCidade">Cidade</label>

                            <select value ="<?php echo($cidadeent); ?>" name="CIDADE_E" class="form-control" id="idcbxCidade"><option>Cidade</option>
                                <?php
                                $conn = conectar();
                                $ctab = "cidades";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 
                            </select> 
                        </div> 

                        <div class="form-group col-md-4">   
                            <label for="nmgetEstadoEnt">Estado</label>

                            <select value ="<?php echo($estadoent); ?>" name="ESTADO_E" class="form-control" id="idcbxEstado"><option>Estado</option>
                                <?php
                                $conn = conectar();
                                $ctab = "estados";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 

                            </select> 
                        </div> 
                    </div>
                    <div class="row">                    
                        <div class="form-group col-md-2">   
                            <label for="nmgetPais">Pais</label>                        
                            <select value ="<?php echo($paisent); ?>" name="PAIS_E" class="form-control" id="idcbxPais"><option>Pais</option>
                                <?php
                                $conn = conectar();
                                $ctab = "pais";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                    ?> 
                                    <option value="<?php echo $row['codigo']; ?> "> <?php echo $row['descr']; ?> </option>
                                    <?php
                                }
                                ?> 

                            </select> 
                        </div> 
                    </div>
                </div>
                <div id="abaDadosdeCobranca" class="tab-pane container fade">
                    <h4>Dados de Cobranca</h4>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmcbxBanco">Banco</label>
                            <select value ="<?php echo($ccodban); ?>" name="COD_BAN" class="form-control" id="idcbxBanco"><option>Banco</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "bancos";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";                            
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                ?> 
                                   <option value="<?php echo $row['codigo'];?> "> <?php echo $row['descr'];?> </option>
                                <?php
                                }
                                ?> 
                            </select> 
                        </div>
                        <div class="form-group col-md-6">   
                            <label for="nmgetCobranca">Cobranca</label>
                            <select value ="<?php echo($ccodcob); ?>" name="COD_COB" class="form-control" id="idcbxCobranca"><option>Informe o tipoo de Cobrança</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "cobrancas";
                                $cccampo = "codigo, descr ";
                                $cwhere = "1=1";                            
                                $res = new crud();
                                $aret = $res->obter($cccampo, $ctab, $cwhere);
                                foreach ($aret as $row) {
                                ?> 
                                   <option value="<?php echo $row['codigo'];?> "> <?php echo $row['descr'];?> </option>
                                <?php
                                }
                                ?> 
                            
                            </select>
                            
                        </div>
                        <div class="form-group col-md-3">   
                            <label for="nmgetJuros">Juros</label>
                            <input value ="<?php echo($njuros); ?>" type="number" class="form-control" name="PER_JUROS" id="idgetJuros" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetToleranciajuros">Tolerancia</label>
                            <input value ="<?php echo($ntoleranciajuros); ?>" type="number" class="form-control" name="DATA_JUROS" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetMulta">Multa</label>
                            <input value ="<?php echo($nmulta); ?>" type="number" class="form-control" name="PER_MULTA" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetToleranciamulta">Tolerancia</label>
                            <input value ="<?php echo($ntoleranciamulta); ?>" type="number" class="form-control" name="DATA_MULTA" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div id="abaDemaisInformacoes" class="tab-pane container fade">
                    <h4>Demais Informacoes</h4>
                    <div class="row">
                        <div class="form-group col-md-12">   
                            <label for="nmtextObservacao">Observacao</label>
                            <input value ="<?php echo($mObs); ?>" type="text" class="form-control" name="OBS" id="idtextObservacao" size="500" maxlength="5000" placeholder=""/>
                        </div> 
                    </div>
                </div> 
            </div>
        </main>
    </body>
