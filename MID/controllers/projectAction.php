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
    $status = $_POST["status"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    $website = $_POST["website"];

    $query = "UPDATE partners SET `name`='$name', `status` = '$status', `description` = '$description', `image` = '$image', `website` = '$website' WHERE `id`='$id';";

    $db = new DbConnect();
    $res = $db->ExecuteData($query);

    if ($res === false) {
        echo "Error occured while inserting data.";
        header("Location: ../views/adminView.php");
    } else {
        header("Location: ../views/adminView.php");
    }
} else {
    echo "Unathrized Access";
    header("Location: ../views/login.php");
}
