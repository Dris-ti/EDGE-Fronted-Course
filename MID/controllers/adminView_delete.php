<?php
session_start();
include ("../models/dbconnection.php");
if (!isset($_SESSION['id'])) {
	header("Location: Login.php");
	exit();
}

if (isset($_GET["id"]) && $_GET['table']) {
	$id = $_GET['id'];
	$table = $_GET['table'];

	$query = "DELETE FROM $table WHERE id=$id;";
	$db = new DbConnect();
	$res = $db->ExecuteData($query);

	if($res){
		echo "One row effected.";
	}
	else
	{
		echo "No rows effected.";
	}
}

?>
