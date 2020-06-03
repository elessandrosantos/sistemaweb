<main class="container">
   <body>   
      <div class="row">            
         <div class="form-group col-md-5">           <h2>Produtos </h2>     
         </div>     
      </div>     
      <div class="row">
         <div class="form-group col-md-4">       
            <label for="nmgetCodigoPrincipal">Codigo Principal
            </label>   
            <input type="text" class="form-control" name="nmgetCodigoPrincipal" id="idgetCodigoPrincipal" size="18" maxlength="18" placeholder=""/>
         </div>  
         <div class="form-group col-md-4">       
            <label for="nmcbxFamilia">Familia
            </label>   
            <select name="nmcbxFamilia" class="form-control" id="idcbxFamilia">
               <option>Familia
               </option>
            </select>  
         </div>
         <div class="form-group col-md-4">       
            <label for="nmgetDescricao">Descricao
            </label>   
            <input type="text" class="form-control" name="nmgetDescricao" id="idgetDescricao" size="40" maxlength="40" placeholder=""/>
         </div>  
      </div>
      <div class="row">
         <div class="form-group col-md-4">       
            <label for="nmgetPesoBruto">Peso Bruto
            </label>   
            <input type="number" class="form-control" name="nmgetPesoBruto" id="idgetPesoBruto" size="18" maxlength="18" placeholder=""/>
         </div>  
         <div class="form-group col-md-4">       
            <label for="nmgetPesoLiquido">Peso Liquido
            </label>   
            <input type="number" class="form-control" name="nmgetPesoLiquido" id="idgetPesoLiquido" size="18" maxlength="18" placeholder=""/>
         </div>  
         <div class="form-group col-md-4">       
            <label for="nmcbxUnidadedePeso">Unidade de Peso
            </label>   
            <select name="nmcbxUnidadedePeso" class="form-control" id="idcbxUnidadedePeso">
               <option>Unidade de Peso
               </option>
            </select>  
         </div>
      </div>
      <div class="row">
         <div class="form-group col-md-4">
            <input type="checkbox" name="nmchkInativo" id="idchkInativo" checked/>
            <label for="nmlblInativo">Inativo
            </label>
         </div>
      </div>
      <div class="row">         
         <div class="form-group col-md-4">          
            <input name="nmbtnnmbtnFiscais" type="submit" id="idbtnidbtnFiscais" value="Fiscais" />   
         </div>   
         <div class="form-group col-md-4">          
            <input name="nmbtnnmbtnEstoque" type="submit" id="idbtnidbtnEstoque" value="Estoque" />   
         </div>
      </div>     
   </body>
</main>