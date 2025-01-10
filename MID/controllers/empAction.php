<?php
session_start();
include("../models/dbconnection.php");
if (!isset($_SESSION['id'])) {
	header("Location: ../views/login.php");
	exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = $_POST["id"];
	$name = $_POST["name"];
	$status = $_POST['status'];
	$skills = $_POST['skills'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$image = $_POST['image'];
	$dept = $_POST['dept'];
	$designation = $_POST['designation'];
	$linkedin = $_POST['linkedin'];
	$github = $_POST['github'];

	$query = "UPDATE employeeinfo SET `name`='$name',`status`='$status',`skills`='$skills',`email`='$email',`phone`='$phone',`image`='$image',`dept_id`='$dept',`designation_id`='$designation',`linkedin`='$linkedin',`github`='$github' WHERE `id`='$id';";

	$db = new DbConnect();
	$res = $db->ExecuteData($query);

	if ($res === false) {
		echo "Error occured while inserting data.";
		header("Location: ../views/adminView.php");
	} else {
		header("Location: ../views/adminView.php");
	}
}
else
{
	echo "Unothrized Access";
	header("Location: ../views/login.php");
}
