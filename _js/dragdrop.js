
function dragstart_handler(ev) {
    
  //alert("dragStart");
  
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    alert("Browser does not support DataTransferItem interface");    
    return;
  }
  //alert('120');
  //alert(ev);
  //alert('200');
  //alert(dti);
  // Change the source element's background color to signify drag has started
 // ev.currentTarget.style.border = "dashed";
  // Add the id of the drag source element to the drag data payload so
  // it is available when the drop event is fired
  dti.add(ev.target.id, "text/menu");
  // Tell the browser both copy and move are possible
  ev.effectAllowed = "copyMove";
   //alert(ev.target.id);
 
    var opcao = ev.target.id;
    var textmenu =  opcao.substr(0,4);

    if (textmenu !== "menu"){
    
       var b = document.getElementById("menu_trash"); 
       b.removeAttribute("hidden", "hidden");
    }       
  //b.setAttribute("hidden", "hidden"); 
 
}

function dragover_handler(ev) {
  console.log("dragOver");  
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    console.log("Browser does not support DataTransferItem interface");    
    return;
  }
  // Change the target element's border to signify a drag over event
  // has occurred
  ev.currentTarget.style.background = "lightblue";
  ev.preventDefault();
}

function drop_handler(ev) {
   
  ev.preventDefault();
  var dti = ev.dataTransfer.items;
  
  if (dti === undefined || dti == null) {
    alter("Browser does not support DataTransferItem interface");    
    return;
  }
  // Get the id of the drag source element (that was added to the drag data
  // payload by the dragstart event handler). Even though only one drag item
  // was explicitly added, the browser may include other items so need to search
  // for the plain/text item.
  
          
  for (var i=0; i < dti.length; i++) {
   
      
   // alert("Drop: dti[i] [" + dti[i]+ "] Drop: item[" + i + "].kind = " + dti[i].kind + " ; item[" + i + "].type = " + dti[i].type);
   // alert("700" + "Drop: item[" + i + "].kind = " + dti[i].kind + " ; item[" + i + "].type = " + dti[i].type);
    if ((dti[i].kind == 'string') && (dti[i].type.match('^text/menu'))) {
      // This item is the target node
      
        dti[i].getAsString(function (id){        
	//if (id == "menu" && ev.target.id == "menu_favoritos")
	//  ev.target.appendChild(document.getElementById(id));
	// Copy the element if the source and destination ids are both "copy"
        var opcao = id;
        var textmenu =  opcao.substr(0,4);

	if (textmenu == "menu" && ev.target.id == "menu_favoritos") {            
	   var nodeCopy = document.getElementById(id).cloneNode(true);
	   nodeCopy.id = "newId";
	   ev.target.appendChild(nodeCopy);           
           incluifavoritos(document.getElementById(id).name, 'EDSANTOS', document.getElementById(id));      
	}
        if (textmenu == "favo" && ev.target.id == "menu_trash") {
            
           var nid ;
           var n = opcao.indexOf("_"); 
           nid = opcao.substr(n+1,4);

           var p = document.getElementById(id); 
           p.setAttribute("hidden", "hidden"); 
           excluirfavoritos(nid);      
	}
                
      });
    
    
    } 
  
   }
}

function dragend_handler(ev) {
  //console.log("dragEnd");
  
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    console.log("Browser does not support DataTransferItem interface");
    alert("Browser does not support DataTransferItem interface");
    return;
  }
  // Restore source's border
 
    var b = document.getElementById("menu_trash"); 
    //b.removeAttribute("hidden", "hidden");
    b.setAttribute("hidden", "hidden"); 
 
  //ev.target.style.border = "solid black";
  // Remove all of the items from the list.
  dti.clear();
  
  
}

function incluifavoritos(cdescr, cuser, clink){
    
    var tabela = 'menu_user';
    
    var campos = "cod_menu, descr, user , sn_visivel, link";
    var dados = "'1', '"+cdescr+"', '"+ cuser + "', '1', '"+ clink +"'";
    var where = "";
            
    
    $.ajax({
       url: "/_conexao/crud_ajax.php",
       type: "POST",
       data: 'acao=inserir' + '&tab=' + tabela + '&campos=' + campos + '&valores=' + dados + '&where=' + where,
       success: function (data) {   
           alert("Menu favorito criado com sucesso!")
        }
       });
  
    
}

function excluirfavoritos(id){
    
    var tabela = 'menu_user';    
    var where = 'regid = '+id;
            
    
    $.ajax({
       url: "/_conexao/crud_ajax.php",
       type: "POST",
       data: 'acao=excluir' + '&tab=' + tabela + '&where=' + where,
       success: function (data) {               
           alert(data);
        }
       });
  
    
}

