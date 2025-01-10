<?php
session_start();
include("nav.php");
include("../models/dbconnection.php");
if (!isset($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}

$tableInfo = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin View</title>
</head>

<body>
    <!-- Dynamically collect table names from db. -->
    <!-- <div class="div-tabs">
    <?php
    $table="";
    $query = "SHOW TABLES FROM farm;";

    $db = new DbConnect();
    $row = $db->GetData($query);

    foreach ($row as $key => $value) {
        echo "<button>" . $value['Tables_in_farm'] . "</button>";
        $tableInfo[$key] = $value['Tables_in_farm'];
    }
    ?>
    </div> -->


    <div class="div-tabs">
        <button onclick="showTab(0)">Employees</button>
        <button onclick="showTab(1)">Departments</button>
        <button onclick="showTab(2)">Designations</button>
        <button onclick="showTab(3)">Partners</button>
        <button onclick="showTab(4)">Projects</button>
        <button onclick="showTab(5)">Reviews</button>
        <button onclick="showTab(6)">LoginInfo</button>
    </div>



    <div class="div-tab-contents">
        <div class="emp-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Skills</td>
                        <td>Email</td>
                        <td>Phone No</td>
                        <td>Image</td>
                        <td>Dept</td>
                        <td>Designation</td>
                        <td>LinkedIn</td>
                        <td>Github</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $table = "employees";
                    $query = "SELECT 
                                employeeinfo.id AS ID, 
                                employeeinfo.name AS Name, 
                                employeeinfo.skills AS Skills, 
                                employeeinfo.email AS Email, 
                                employeeinfo.phone AS 'Phone No', 
                                employeeinfo.image AS Image, 
                                depts.name AS Dept, 
                                designations.title AS Designation, 
                                employeeinfo.linkedin AS LinkedIn, 
                                employeeinfo.github AS Github,
                                CASE 
                                    WHEN employeeinfo.status = 0 THEN 'Deactive' 
                                    WHEN employeeinfo.status = 1 THEN 'Active' 
                                END AS Status
                                FROM 
                                    employeeinfo 
                                INNER JOIN 
                                    depts ON employeeinfo.dept_id = depts.id 
                                INNER JOIN 
                                    designations ON employeeinfo.designation_id = designations.id;";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["ID"] . "</td>
                        <td>" . $value["Name"] . "</td>
                        <td>" . $value["Skills"] . "</td>
                        <td>" . $value["Email"] . "</td>
                        <td>" . $value["Phone No"] . "</td>
                        <td>" . $value["Image"] . "</td>
                        <td>" . $value["Dept"] . "</td>
                        <td>" . $value["Designation"] . "</td>
                        <td>" . $value["LinkedIn"] . "</td>
                        <td>" . $value["Github"] . "</td>
                        <td>" . $value["Status"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[ID]&table=employeeinfo'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[ID]&table=employeeinfo'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>
                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="dept-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $query = "SELECT id AS ID, name AS Name FROM depts";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["ID"] . "</td>
                        <td>" . $value["Name"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[ID]&table=depts'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[ID]&table=depts'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="designation-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Title</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $query = "SELECT id AS ID, title AS Title FROM designations";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["ID"] . "</td>
                        <td>" . $value["Title"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[ID]&table=designations'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[ID]&table=designations'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="partner-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone No</td>
                        <td>Website</td>
                        <td>Address</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    $query = "SELECT id, name, email, phone, website, 'address' FROM partners";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["id"] . "</td>
                        <td>" . $value["name"] . "</td>
                        <td>" . $value["email"] . "</td>
                        <td>" . $value["phone"] . "</td>
                        <td>" . $value["website"] . "</td>
                        <td>" . $value["address"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[id]&table=partners'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[id]&table=partners'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="projects-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Status</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Website</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM projects";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["id"] . "</td>
                        <td>" . $value["name"] . "</td>
                        <td>" . $value["status"] . "</td>
                        <td>" . $value["description"] . "</td>
                        <td>" . $value["image"] . "</td>
                        <td>" . $value["website"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[id]&table=projects'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[id]&table=projects'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="reviews-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Comment</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM reviews";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["id"] . "</td>
                        <td>" . $value["name"] . "</td>
                        <td>" . $value["comments"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[id]&table=reviews'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[id]table=reviews'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="logininfo-tab TAB">
            <table class="row-table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Password</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM logininfo";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                    <tr>
                        <td>" . $value["id"] . "</td>
                        <td>" . $value["password"] . "</td>
                        <td class='action-div'>
                            <a href='adminView_edit.php?id=$value[id]&table=logininfo'>
                                <button class='action-btn edit-btn'>Edit</button>
                            </a>
                            <a href='../controllers/adminView_delete.php?id=$value[id]table=logininfo'>
                                <button class='action-btn delete-btn'>Delete</button>
                            </a>
                        </td>

                    </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>


    </div>

    <div class="div-new-btn">
        <a href="adminView_new.php">
            <i class="fa-solid fa-plus"></i>
        </a>
    </div>








    <script src="../script.js"></script>
</body>

</html>