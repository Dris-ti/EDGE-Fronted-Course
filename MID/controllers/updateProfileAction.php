<?php
session_start();
include ("../models/dbconnection.php");
if (!isset($_SESSION['id'])) {
	header("Location: Login.php");
	exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];"";
    $dept = $_POST["dept"];
    $designation = $_POST["designation"];
    $status = $_POST["status"];
    $linkedin = $_POST["linkedin"];
    $github = $_POST["github"];

    $query = "UPDATE employeeinfo SET `name`='$name', `email` = '$email', `phone` = '$phone', `linkedin` = '$linkedin', `github` = '$github',
    `status` = $status, `dept_id` = '$dept', `designation_id` = '$designation'  
    WHERE `id`='$id';";

    $db = new DbConnect();
    $res = $db->ExecuteData($query);

    if ($res === false) {
        echo "Error occured while inserting data.";
        header("Location: ../views/profile.php");
    } else {
        header("Location: ../views/profile.php");
    }
}

else {
    echo "Unathrized Access";
    header("Location: ../views/login.php");
}



?>