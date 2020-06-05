<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$sql = "UPDATE mov_peds set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  regid=".$_POST["id"];
$result = $db_handle->executeUpdate($sql);

?>

