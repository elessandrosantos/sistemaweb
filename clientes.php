<?php

include $_SESSION['pastaapp']."/_conexao/crud.php";

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <!-- <script src="_js/funcoes.js" type="text/javascript"></script>  -->
    </head>
</html>     


<form id="fcadcli" name="formnomecadclie" method="post" onsubmit="return getdadosform('CLIENTES', 'inserir'); return false;">  <!--action="fu_cadcliente.php" -->
        <main class="container">

            <div class="row">     
                <div class="form-group col-md-12"> 
                    <h2>Clientes </h2>
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
                            <input type="checkbox" name="PESS" id="idchkPessoaFisica" checked/>
                            <label for="nmlblPessoa Fisica">Pessoa Fisica</label> 
                        </div>
                        <div class="form-group col-md-3">
                            <input type="checkbox" name="INATIVO" id="idchkInativo" checked/>
                            <label for="nmlblInativo">Inativo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetCodigoAnterior">Codigo Anterior</label>
                            <input type="text" class="form-control" name="CODIGO_A" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetCNPJCPF">CNPJ / CPF</label>
                            <input type="text" class="form-control" name="CGC" id="idgetCNPJCPF" size="20" maxlength="20" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-6">   
                            <label for="nmgetRazaoSocial">Razao Social</label>
                            <input type="text" class="form-control" name="RAZAO" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmgetNomeFantasia">Nome Fantasia</label>
                            <input type="text" class="form-control" name="NOME" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetCEP">CEP</label>
                            <input type="text" class="form-control" name="CEP" id="idgetCEP" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmcbxLogradouro">Logradouro</label>
                            <select name="LOGRA" class="form-control" id="idcbxLogradouro"><option>Logradouro</option>
                            <?php                                
                                $ctab = "logradouros";
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmgetEndereco">Endereco</label>
                            <input type="text" class="form-control" name="ENDERECO" id="idgetEndereco" size="50" maxlength="50" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetNo">No.</label>
                            <input type="text" class="form-control" name="NUMERO" id="idgetNo" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-4">   
                            <label for="nmgetComplemento">Complemento</label>
                            <input type="text" class="form-control" name="CJ" id="idgetComplemento" size="15" maxlength="15" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetBairro">Bairro</label>
                            <input type="text" class="form-control" name="BAIRRO" id="idgetBairro" size="30" maxlength="30" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmcbxCidade">Cidade</label>
                            <select name="CIDADE" class="form-control" id="idcbxCidade"><option>Informe a Cidade</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "cidades";
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
                            <label for="nmcbxEstado">Estado</label>
                            <select name="ESTADO" class="form-control" id="idcbxEstado"><option>Informe o Estado</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "estados";
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
                            <label for="nmcbxPais">Pais</label>
                            <select name="COD_PAIS" class="form-control" id="idcbxPais"><option>Informe o Pais</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "pais";
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
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">   
                            <label for="nmgetDDD">DDD</label>
                            <input type="text" class="form-control" name="DDD" id="idgetDDD" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetTelefone1">Telefone 1</label>
                            <input type="text" class="form-control" name="TEL1" id="idgetTelefone1" size="15" maxlength="15" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-2">   
                            <label for="nmgetTelefone2">Telefone 2</label>
                            <input type="text" class="form-control" name="TEL2" id="idgetTelefone2" size="15" maxlength="15" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-6">   
                            <label for="nmgetEmail">E-mail</label>
                            <input type="email" class="form-control" name="EMAIL" id="idgetEmail" size="100" maxlength="100" placeholder=""/>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">   
                            <label for="nmgetWebSite">WebSite</label>
                            <input type="text" class="form-control" name="HOMEPAGE" id="idgetWebSite" size="50" maxlength="50" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div id="abaEnderecosEntrega" class="tab-pane container fade">
                    <h4>Enderecos Entrega</h4>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetCep">Cep</label>
                            <input type="text" class="form-control" name="CEP_E" id="idgetCepEnt" size="10" maxlength="10" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetLogradouro">Logradouro</label>
                             <select name="LOGRA_E" class="form-control" id="idcbxLogradouro"><option>Logradouro</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "logradouros";
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
                            <label for="nmgetEndereco">Endereco</label>
                            <input type="text" class="form-control" name="ENTREGA" id="idgetEnderecoEnt" size="80" maxlength="80" placeholder=""/>
                        </div>                     
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetNo">No.</label>
                            <input type="text" class="form-control" name="NUM_E" id="idgetNoEnt" size="6" maxlength="6" placeholder=""/>
                        </div> 

                        <div class="form-group col-md-3">   
                            <label for="nmgetBairro">Bairro</label>
                            <input type="text" class="form-control" name="BAIRRO_E" id="idgetBairroEnt" size="30" maxlength="30" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-6">   
                            <label for="nmgetComplemento">Complemento</label>
                            <input type="text" class="form-control" name="CJ_E" id="idgetComplementoEnt" size="15" maxlength="15" placeholder=""/>
                        </div> 
                    </div>    
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetCidade">Cidade</label>
                            <select name="CIDADE_E" class="form-control" id="idcbxCidadeEnt"><option>Informe a Cidade</option>
                            <?php
                                $conn = conectar();                               
                                $ctab = "cidades";
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
                            <label for="nmgetEstadoEnt">Estado</label>
                            <select name="ESTADO_E" class="form-control" id="idcbxEstadoEnt"><option>Informe o Estado</option>
                                <?php
                                $conn = conectar();                               
                                $ctab = "estados";
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
                            <label for="nmgetPais">Pais</label>
                            <select name="PAIS_E" class="form-control" id="idcbxPaisEnt"><option>Informe o Pais</option>
                                <?php
                                $conn = conectar();                               
                                $ctab = "pais";
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
                    </div>
                </div>
                <div id="abaDadosdeCobranca" class="tab-pane container fade">
                    <h4>Dados de Cobranca</h4>
                    <div class="row">
                        <div class="form-group col-md-6">   
                            <label for="nmcbxBanco">Banco</label>
                            <select name="COD_BAN" class="form-control" id="idcbxBanco"><option>Informe o Banco</option>
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
                            <select name="COD_COB" class="form-control" id="idcbxCobranca"><option>Informe o tipoo de Cobrança</option>
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
                    </div>                     
                    <div class="row">
                        <div class="form-group col-md-3">   
                            <label for="nmgetJuros">Juros</label>
                            <input type="number" class="form-control" name="PER_JUROS" id="idgetJuros" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetToleranciajuros">Tolerancia</label>
                            <input type="number" class="form-control" name="DATA_JUROS" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetMulta">Multa</label>
                            <input type="number" class="form-control" name="PER_MULTA" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                        </div> 
                        <div class="form-group col-md-3">   
                            <label for="nmgetToleranciamulta">Tolerancia</label>
                            <input type="number" class="form-control" name="DATA_MULTA" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div> 
                    </div>
                </div>
                <div id="abaDemaisInformacoes" class="tab-pane container fade">
                    <h4>Demais Informacoes</h4>
                    <div class="row">
                        <div class="form-group col-md-12">   
                            <label for="nmtextObservacao">Observacao</label>
                            <input type="text" class="form-control" name="OBS" id="idtextObservacao" size="500" maxlength="5000" placeholder=""/>
                        </div> 
                    </div>
                </div> 
            </div>
                    </body>
        </main>
    
