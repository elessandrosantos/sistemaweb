<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST['regid'])) {
	$id = $_POST['regid'];
	$sql = "DELETE FROM mov_peds WHERE regid = '$id' ";
	$db_handle->executeQuery($sql);
}
?>
