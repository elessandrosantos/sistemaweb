<form id="idcadCLIENTES" name="nmcadCLIENTES" method="post" onsubmit="return getdadosform('CLIENTES', 'inserir'); return false;">  
   <body>   
      <main class="container">      
         <div class="row">               
            <div class="form-group col-md-5">              <h2>Clientes </h2>         
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
         <div class="tab-content">
            <div id="abaPrincipal" class="tab-pane container active">   <h4>Principal</h4>   
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblCodigo Cliente">Codigo Cliente
                     </label>   
                     <input type="number" class="form-control" readonly="readonly" name="XCLIENTES" id="idgetCodigoCliente" size="6" maxlength="6" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-3">
                     <input type="checkbox" name="PESS" id="idchkPessoaFisica" />
                     <label for="nmlblPessoa Fisica">Pessoa Fisica
                     </label>
                  </div>
                  <div class="form-group col-md-3">
                     <input type="checkbox" name="INATIVO" id="idchkInativo" />
                     <label for="nmlblInativo">Inativo
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblCodigo Anterior">Codigo Anterior
                     </label>   
                     <input type="text" class="form-control"  name="CODIGO_A" id="idgetCodigoAnterior" size="20" maxlength="20" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblCNPJ / CPF">CNPJ / CPF
                     </label>   
                     <input type="text" class="form-control"  name="CGC" id="idgetCNPJCPF" size="20" maxlength="20" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-6">       
                     <label for="nmlblRazao Social">Razao Social
                     </label>   
                     <input type="text" class="form-control"  name="RAZAO" id="idgetRazaoSocial" size="60" maxlength="60" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-6">       
                     <label for="nmlblNome Fantasia">Nome Fantasia
                     </label>   
                     <input type="text" class="form-control"  name="NOME" id="idgetNomeFantasia" size="50" maxlength="50" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblCEP">CEP
                     </label>   
                     <input type="text" class="form-control"  name="CEP" id="idgetCEP" size="10" maxlength="10" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">   
                     <label for="nmlblLogradouro">Logradouro
                     </label>   
                     <select name="LOGRA" class="form-control" id="idcbxLogradouro">
                        <option>Logradouro
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    CODIGO + " - " + DESCR  ' .  
          'FROM       ' .  
          '   MK_LOGRA ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' CODIGO + " - " + DESCR'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-6">       
                     <label for="nmlblEndereco">Endereco
                     </label>   
                     <input type="text" class="form-control"  name="ENDERECO" id="idgetEndereco" size="50" maxlength="50" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-2">       
                     <label for="nmlblNo.">No.
                     </label>   
                     <input type="text" class="form-control"  name="NUMERO" id="idgetNo" size="6" maxlength="6" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-4">       
                     <label for="nmlblComplemento">Complemento
                     </label>   
                     <input type="text" class="form-control"  name="CJ" id="idgetComplemento" size="15" maxlength="15" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblBairro">Bairro
                     </label>   
                     <input type="text" class="form-control"  name="BAIRRO" id="idgetBairro" size="30" maxlength="30" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">   
                     <label for="nmlblCidade">Cidade
                     </label>   
                     <select name="CIDADE" class="form-control" id="idcbxCidade">
                        <option>Cidade
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    CODIGO+" - "+ESTADO  ' .  
          'FROM       ' .  
          '   CIDADES ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' CODIGO+" - "+ESTADO'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
                  <div class="form-group col-md-3">   
                     <label for="nmlblEstado">Estado
                     </label>   
                     <select name="ESTADO" class="form-control" id="idcbxEstado">
                        <option>Estado
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    CODIGO  ' .  
          'FROM       ' .  
          '   ESTADOS ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' CODIGO'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
                  <div class="form-group col-md-3">   
                     <label for="nmlblPais">Pais
                     </label>   
                     <select name="COD_PAIS" class="form-control" id="idcbxPais">
                        <option>Pais
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    codigo, ' .  
          '    codigo + " - " + descr  ' .  
          'FROM       ' .  
          '   PAIS ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' codigo '];?> "> 
                        <?php echo  $row[' codigo + " - " + descr'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-2">       
                     <label for="nmlblDDD">DDD
                     </label>   
                     <input type="text" class="form-control"  name="DDD" id="idgetDDD" size="10" maxlength="10" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-2">       
                     <label for="nmlblTelefone 1">Telefone 1
                     </label>   
                     <input type="text" class="form-control"  name="TEL1" id="idgetTelefone1" size="15" maxlength="15" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-2">       
                     <label for="nmlblTelefone 2">Telefone 2
                     </label>   
                     <input type="text" class="form-control"  name="TEL2" id="idgetTelefone2" size="15" maxlength="15" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-6">       
                     <label for="nmlblE-mail">E-mail
                     </label>   
                     <input type="email" class="form-control"  name="EMAIL" id="idgetEmail" size="100" maxlength="100" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-12">       
                     <label for="nmlblWebSite">WebSite
                     </label>   
                     <input type="text" class="form-control"  name="HOMEPAGE" id="idgetWebSite" size="50" maxlength="50" placeholder=""/>
                  </div>  
               </div>
            </div>
            <div id="abaEnderecosEntrega" class="tab-pane container fade">   <h4>Enderecos Entrega</h4>   
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblCep">Cep
                     </label>   
                     <input type="text" class="form-control"  name="CEP_E" id="idgetCep" size="10" maxlength="10" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblLogradouro">Logradouro
                     </label>   
                     <input type="text" class="form-control"  name="LOGRA_E" id="idgetLogradouro" size="6" maxlength="6" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-6">       
                     <label for="nmlblEndereco">Endereco
                     </label>   
                     <input type="text" class="form-control"  name="ENTREGA" id="idgetEndereco" size="80" maxlength="80" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblNo.">No.
                     </label>   
                     <input type="text" class="form-control"  name="NUM_E" id="idgetNo" size="6" maxlength="6" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblBairro">Bairro
                     </label>   
                     <input type="text" class="form-control"  name="BAIRRO_E" id="idgetBairro" size="30" maxlength="30" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-6">       
                     <label for="nmlblComplemento">Complemento
                     </label>   
                     <input type="text" class="form-control"  name="CJ_E" id="idgetComplemento" size="15" maxlength="15" placeholder=""/>
                  </div>  
               </div>
               <div class="row">
                  <div class="form-group col-md-3">   
                     <label for="nmlblCidade">Cidade
                     </label>   
                     <select name="CIDADE_E" class="form-control" id="idcbxCidade">
                        <option>Cidade
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    CODIGO  ' .  
          'FROM       ' .  
          '   CIDADES ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' CODIGO'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
                  <div class="form-group col-md-3">   
                     <label for="nmlblEstado">Estado
                     </label>   
                     <select name="ESTADO_E" class="form-control" id="idcbxEstado">
                        <option>Estado
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    CODIGO  ' .  
          'FROM       ' .  
          '   ESTADOS ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' CODIGO'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
                  <div class="form-group col-md-6">   
                     <label for="nmlblPais">Pais
                     </label>   
                     <select name="PAIS_E" class="form-control" id="idcbxPais">
                        <option>Pais
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    DESCR  ' .  
          'FROM       ' .  
          '   PAIS ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' DESCR'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
               </div>
            </div>
            <div id="abaDadosdeCobranca" class="tab-pane container fade">   <h4>Dados de Cobranca</h4>   
               <div class="row">
                  <div class="form-group col-md-6">   
                     <label for="nmlblBanco">Banco
                     </label>   
                     <select name="COD_BAN" class="form-control" id="idcbxBanco">
                        <option>Banco
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    codigo, ' .  
          '    codigo  ' .  
          'FROM       ' .  
          '   BANCOS ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' codigo '];?> "> 
                        <?php echo  $row[' codigo'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
                  <div class="form-group col-md-6">   
                     <label for="nmlblCobranca">Cobranca
                     </label>   
                     <select name="COD_COB" class="form-control" id="idcbxCobranca">
                        <option>Cobranca
                        </option>
<?php 
   $conn = conectar();     
   $sql = 'SELECT      ' . 
          '    CODIGO, ' .  
          '    DESCR  ' .  
          'FROM       ' .  
          '   COBRANCA ';   
foreach ($conn->query($sql) as $row) {  
                        ?>
                        <option value="<?php echo $row[' CODIGO '];?> "> 
                        <?php echo  $row[' DESCR'];?> 
                        </option>  
<?php  
}      
                        ?>       
                     </select>  
                  </div>
               </div>
               <div class="row">
                  <div class="form-group col-md-3">       
                     <label for="nmlblJuros">Juros
                     </label>   
                     <input type="number" class="form-control"  name="PER_JUROS" id="idgetJuros" size="6" maxlength="6" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblTolerancia">Tolerancia
                     </label>   
                     <input type="number" class="form-control"  name="DATA_JUROS" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblMulta">Multa
                     </label>   
                     <input type="number" class="form-control"  name="PER_MULTA" id="idgetMulta" size="6" maxlength="6" placeholder=""/>
                  </div>  
                  <div class="form-group col-md-3">       
                     <label for="nmlblTolerancia">Tolerancia
                     </label>   
                     <input type="number" class="form-control"  name="DATA_MULTA" id="idgetTolerancia" size="5" maxlength="5" placeholder=""/>
                  </div>  
               </div>
            </div>
            <div id="abaDemaisInformacoes" class="tab-pane container fade">   <h4>Demais Informacoes</h4>   
               <div class="row">
                  <div class="form-group col-md-12">       
                     <label for="nmlblObservacao">Observacao
                     </label>   
                     <input type="text" class="form-control" name="OBS" id="idtextObservacao" size="10" maxlength="10" placeholder=""/>
                  </div>  
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
      </main>
   </body>