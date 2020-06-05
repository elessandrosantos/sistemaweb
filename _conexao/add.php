<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$posts = "";

if(!empty($_POST["pedido"])) {
    
   $pedido = $_POST["pedido"];
   $data = $_POST["data"];
   $produto = $_POST["produto"];
   $quant = $_POST["quant"];
   $vlruni = $_POST["valor_uni"];
   
   $quant = str_replace(',', '.', $quant);        
   $vlruni = str_replace(',', '.', $vlruni);        
        
   $sql = "INSERT INTO mov_peds (ped, data_criacao, codigo, quant, valor_unit) VALUES ('" . $pedido . "','" . $data . "','".$produto."',".$quant.",".$vlruni.")";
              
   $faq_id = $db_handle->executeInsert($sql);
   
   if(!empty($faq_id)) {
      $sql = "SELECT * from mov_peds WHERE regid = $faq_id ";
      echo $sql;
      $posts = $db_handle->runSelectQuery($sql);
   }
?>

   <tr class="table-row" id="table-row-<?php echo $posts[0]["regid"]; ?>">
   <td contenteditable="true" onBlur="saveToDatabase(this,'regid','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["regid"]; ?></td>
   <td contenteditable="true" onBlur="saveToDatabase(this,'ped','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["ped"]; ?></td>
   <td contenteditable="true" onBlur="saveToDatabase(this,'data_criacao','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["data_criacao"]; ?></td>
   <td contenteditable="true" onBlur="saveToDatabase(this,'codigo','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["codigo"]; ?></td>
   <td contenteditable="true" onBlur="saveToDatabase(this,'quant','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["quant"]; ?></td>
   <td contenteditable="true" onBlur="saveToDatabase(this,'valor_unit','<?php echo $posts[0]["regid"]; ?>')" onClick="editRow(this);"><?php echo $posts[0]["valor_unit"]; ?></td>
   <td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[0]["regid"]; ?>);">Deletar</a></td>
   </tr>  

<?php }

?>
