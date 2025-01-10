<?php
include ("../models/dbconnection.php");
session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = validation($_POST["id"]);
    $password = validation($_POST["password"]);
    $_SESSION['idErr'] = "";
    $_SESSION['passErr'] = "";
    $flag = 1;


    if (!empty($id)) {
        $_SESSION["id"] = $id;
    } else {
        $_SESSION['idErr'] = "Please prove an ID";
        $flag = 0;
    }

    if (!empty($password)) {
        $_SESSION["password"] = $password;
    } else {
        $_SESSION['passErr'] = "Please prove a password";
        $flag = 0;
    }

    if ($flag == 1) {
        $query = "SELECT * FROM logininfo WHERE id =  '$id'";
        $db = new DbConnect();
        $res = $db->GetData($query);
        if (!$res) {
            echo "Login Failed";
            header("Location: ../views/login.php");
        }
        $id = $res[0]['id'];

        $query = "SELECT * FROM employeeinfo WHERE id =  '$id'";
        $emp = $db->GetData($query);

        if ($emp[0]['status'] == 0) {
            die("Login Failed");
        } 
        else {
            if ($res[0]['password'] == $password) {
                header("Location: ../views/adminView.php");
            } 
            else {
                echo "Login failed.";
            }
        }
    } else {
        header("Location: ../views/login.php");
    }
}


function validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
