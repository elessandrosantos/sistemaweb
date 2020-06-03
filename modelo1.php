
<html lang="en">
<head>
    <!--
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>ERP Cloud</title>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <link rel="stylesheet" type="text/css" href="_css/menu.css"/>    


        <!-- Bootstrap CSS CDN v-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
-->
        <!-- Our Custom CSS -->
        <!--<link rel="stylesheet" href="style.css">-->

        <!-- Font Awesome JS 
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>    
-->
    
    
    
    
    
</head>
<body>

<div class="container">
 <div class="row">            
                <div class="form-group col-md-5">           <h2>Clientes </h2>     
                </div>     
            </div> 

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
                          <div class="row">
                        <div class="form-group col-md-3">
                            <input type="checkbox" name="nmchkPessoaFisica" id="idchkPessoaFisica" checked/>
                            <label for="nmlblPessoa Fisica">Pessoa Fisica
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="checkbox" name="nmchkInativo" id="idchkInativo" checked/>
                            <label for="nmlblInativo">Inativo
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">       
                            <label for="nmgetCodigoAnterior">Codigo Anterior
                            </label>   
                            <input type="text" class="form-control" name="nmgetCodigoAnterior" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmgetCNPJCPF">CNPJ / CPF
                            </label>   
                            <input type="text" class="form-control" name="nmgetCNPJCPF" id="idgetCNPJCPF" size="20" maxlength="20" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-6">       
                            <label for="nmgetRazaoSocial">Razao Social
                            </label>   
                            <input type="text" class="form-control" name="nmgetRazaoSocial" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">       
                            <label for="nmgetNomeFantasia">Nome Fantasia
                            </label>   
                            <input type="text" class="form-control" name="nmgetNomeFantasia" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmgetCEP">CEP
                            </label>   
                            <input type="text" class="form-control" name="nmgetCEP" id="idgetCEP" size="10" maxlength="10" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmcbxLogradouro">Logradouro
                            </label>   
                            <select name="nmcbxLogradouro" class="form-control" id="idcbxLogradouro">
                                <option>Logradouro
                                </option>
                            </select>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">       
                            <label for="nmgetEndereco">Endereco
                            </label>   
                            <input type="text" class="form-control" name="nmgetEndereco" id="idgetEndereco" size="50" maxlength="50" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-2">       
                            <label for="nmgetNo">No.
                            </label>   
                            <input type="text" class="form-control" name="nmgetNo" id="idgetNo" size="6" maxlength="6" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-4">       
                            <label for="nmgetComplemento">Complemento
                            </label>   
                            <input type="text" class="form-control" name="nmgetComplemento" id="idgetComplemento" size="15" maxlength="15" placeholder=""/>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">       
                            <label for="nmgetBairro">Bairro
                            </label>   
                            <input type="text" class="form-control" name="nmgetBairro" id="idgetBairro" size="30" maxlength="30" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmcbxCidade">Cidade
                            </label>   
                            <select name="nmcbxCidade" class="form-control" id="idcbxCidade">
                                <option>Cidade
                                </option>
                            </select>  
                        </div>
                        <div class="form-group col-md-3">       
                            <label for="nmcbxEstado">Estado
                            </label>   
                            <select name="nmcbxEstado" class="form-control" id="idcbxEstado">
                                <option>Estado
                                </option>
                            </select>  
                        </div>
                        <div class="form-group col-md-3">       
                            <label for="nmcbxPais">Pais
                            </label>   
                            <select name="nmcbxPais" class="form-control" id="idcbxPais">
                                <option>Pais
                                </option>
                            </select>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">       
                            <label for="nmgetDDD">DDD
                            </label>   
                            <input type="text" class="form-control" name="nmgetDDD" id="idgetDDD" size="10" maxlength="10" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-2">       
                            <label for="nmgetTelefone1">Telefone 1
                            </label>   
                            <input type="text" class="form-control" name="nmgetTelefone1" id="idgetTelefone1" size="15" maxlength="15" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-2">       
                            <label for="nmgetTelefone2">Telefone 2
                            </label>   
                            <input type="text" class="form-control" name="nmgetTelefone2" id="idgetTelefone2" size="15" maxlength="15" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-6">       
                            <label for="nmgetEmail">E-mail
                            </label>   
                            <input type="email" class="form-control" name="nmgetEmail" id="idgetEmail" size="100" maxlength="100" placeholder=""/>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">       
                            <label for="nmgetWebSite">WebSite
                            </label>   
                            <input type="text" class="form-control" name="nmgetWebSite" id="idgetWebSite" size="50" maxlength="50" placeholder=""/>
                        </div>  
                    </div>
  
    </div>
    <div id="menu1" class="tab-pane fade">
           <div class="row">
                        <div class="form-group col-md-3">       
                            <label for="nmgetCep">Cep
                            </label>   
                            <input type="text" class="form-control" name="nmgetCep" id="idgetCep_E" size="10" maxlength="10" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmgetLogradouro">Logradouro
                            </label>   
                            <input type="text" class="form-control" name="nmgetLogradouro" id="idgetLogradouro_E" size="6" maxlength="6" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-5">       
                            <label for="nmgetEndereco">Endereco
                            </label>   
                            <input type="text" class="form-control" name="nmgetEndereco" id="idgetEndereco_E" size="80" maxlength="80" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-1">       
                            <label for="nmgetNo">No.
                            </label>   
                            <input type="text" class="form-control" name="nmgetNo" id="idgetNo_E" size="6" maxlength="6" placeholder=""/>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">       
                            <label for="nmgetComplemento">Complemento
                            </label>   
                            <input type="text" class="form-control" name="nmgetComplemento" id="idgetComplemento_E" size="15" maxlength="15" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-3">       
                            <label for="nmgetBairro">Bairro
                            </label>   
                            <input type="text" class="form-control" name="nmgetBairro" id="idgetBairro_E" size="30" maxlength="30" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-4">       
                            <label for="nmgetCidade">Cidade
                            </label>   
                            <input type="text" class="form-control" name="nmgetCidade" id="idgetCidade_E" size="40" maxlength="40" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-2">       
                            <label for="nmgetPais">Pais
                            </label>   
                            <input type="text" class="form-control" name="nmgetPais" id="idgetPais_E" size="4" maxlength="4" placeholder=""/>
                        </div>  
                    </div>

      
    </div>
    <div id="menu2" class="tab-pane fade">
     
      <div class="row">
                        <div class="form-group col-md-3">       
                            <label for="nmcbxBanco">Banco
                            </label>   
                            <select name="nmcbxBanco" class="form-control" id="idcbxBanco">
                                <option>Banco
                                </option>
                            </select>  
                        </div>
                        <div class="form-group col-md-3">       
                            <label for="nmgetCobranca">Cobranca
                            </label>   
                            <input type="text" class="form-control" name="nmgetCobranca" id="idgetCobranca" size="1" maxlength="1" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-1">       
                            <label for="nmgetJuros">Juros
                            </label>   
                            <input type="number" class="form-control" name="nmgetJuros" id="idgetJuros" size="6" maxlength="6" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-1">       
                            <label for="nmgetTolerancia">Tolerancia
                            </label>   
                            <input type="number" class="form-control" name="nmgetTolerancia" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-1">       
                            <label for="nmgetMulta">Multa
                            </label>   
                            <input type="number" class="form-control" name="nmgetMulta" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                        </div>  
                        <div class="form-group col-md-1">       
                            <label for="nmgetTolerancia">Tolerancia
                            </label>   
                            <input type="number" class="form-control" name="nmgetTolerancia" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                        </div>  
                    </div>
    </div>
    <div id="menu3" class="tab-pane fade">    
       <div class="row">
                        <div class="form-group col-md-12">       
                            <label for="nmtextObservacao">Observacao
                            </label>   
                            <input type="text" class="form-control" name="nmtextObservacao" id="idtextObservacao" size="10" maxlength="10" placeholder=""/>
                        </div>  
                        <div class="row">         
                            <div class="form-group col-md-1">          
                                <input name="nmbtnnmbtnBuscaCEP" type="submit" id="idbtnidbtnBuscaCEP" value="Busca CEP" />   
                            </div>   
                            <div class="form-group col-md-1">          
                                <input name="nmbtnnmbtnFinanceiro" type="submit" id="idbtnidbtnFinanceiro" value="Financeiro" />   
                            </div>
                        </div>
                    </div>
    </div>
  </div>
</div>

</body>
</html>
