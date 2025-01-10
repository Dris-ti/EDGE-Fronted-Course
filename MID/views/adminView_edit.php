<?php
session_start();
include("nav.php");
include("../models/dbconnection.php");
if (!isset($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <div class="div-adminView-action-container">
        <?php
        if (isset($_GET["id"]) && $_GET['table']) {
            $id = $_GET['id'];
            $table = $_GET['table'];
            switch ($table) {
                case "employeeinfo":
                    include("emp.php");
                    break;

                case "depts":
                    include("dept.php");
                    break;

                case "designations":
                    include("designation.php");
                    break;

                case "partners":
                    include("partner.php");
                    break;

                case "projects":
                    include("project.php");
                    break;

                case "reviews":
                    include("review.php");
                    break;

                case "logininfo":
                    include("loginfo.php");
                    break;

                default:
                    echo "Something went wrong";
                    header("Location: adminView.php");
            }
        }
        ?>
    </div>











    <script src="../script.js"></script>
</body>

</html>