<!DOCTYPE html>
<html lang=en>
<head>
<title>Using Drag and Drop API to copy and move elements</title>
<!-- 
   This example demonstrates using the HTML Drag and Drop
   DataTransferItem, and DataTransferItemList interfaces to copy
   and move elements. 
-->
<style>
  div {
    margin: 0em;
    padding: 2em;
  }
  #src_copy, #src_move  {
    color: blue;
    border: 5px solid black;
    width: 300px;
    height: 50px;
  }
  #dest_copy, #dest_move {
    border: 5px solid blue;
    width: 300px;
    height: 50px;
  }
</style>
<script>
function dragstart_handler(ev) {
  console.log("dragStart");
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    console.log("Browser does not support DataTransferItem interface");
    return;
  }
  // Change the source element's background color to signify drag has started
  ev.currentTarget.style.border = "dashed";
  // Add the id of the drag source element to the drag data payload so
  // it is available when the drop event is fired
  dti.add(ev.target.id, "text/plain");
  // Tell the browser both copy and move are possible
  ev.effectAllowed = "copyMove";
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
  console.log("Drop");
  ev.preventDefault();
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    console.log("Browser does not support DataTransferItem interface");
    return;
  }
  // Get the id of the drag source element (that was added to the drag data
  // payload by the dragstart event handler). Even though only one drag item
  // was explicitly added, the browser may include other items so need to search
  // for the plain/text item.
  for (var i=0; i < dti.length; i++) {
    console.log("Drop: item[" + i + "].kind = " + dti[i].kind + " ; item[" + i + "].type = " + dti[i].type);
    if ((dti[i].kind == 'string') && (dti[i].type.match('^text/plain'))) {
      // This item is the target node
      dti[i].getAsString(function (id){
	// Only Move the element if the source and destination ids are both "move"
	if (id == "src_move" && ev.target.id == "dest_move")
	  ev.target.appendChild(document.getElementById(id));
	// Copy the element if the source and destination ids are both "copy"
	if (id == "src_copy" && ev.target.id == "dest_copy") {
	   var nodeCopy = document.getElementById(id).cloneNode(true);
	   nodeCopy.id = "newId";
	   ev.target.appendChild(nodeCopy);
	}
      });
    }
  }
}
function dragend_handler(ev) {
  console.log("dragEnd");
  var dti = ev.dataTransfer.items;
  if (dti === undefined || dti == null) {
    console.log("Browser does not support DataTransferItem interface");
    return;
  }
  // Restore source's border
  ev.target.style.border = "solid black";
  // Remove all of the items from the list.
  dti.clear();
}
</script>
</head>
<body>
    
<h1>Drag and Drop: Copy and Move elements with <code>DataTransferItemList</code> interface</h1>
 
<div draggable="true" id="src_copy" ondragstart="dragstart_handler(event);" ondragend="dragend_handler(event);">
     Select this element and drag to the <strong>Copy Drop Zone</strong>.
 </div>
 <div id="dest_copy" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"><strong>Copy Drop Zone</strong></div>
 
 <div draggable="true" id="src_move" ondragstart="dragstart_handler(event);">
     Select this element and drag to the <strong>Move Drop Zone</strong>.
 </div>
 <div id="dest_move" ondrop="drop_handler(event);" ondragover="dragover_handler(event);"><strong>Move Drop Zone</strong></div>
</body>
</html>
