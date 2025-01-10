<?php
if (!isset($_SESSION['id'])) {
    header("Location: Login.php");
    exit();
}



$id = "";
$name = "";
$status = "";
$skills = "";
$email = "";
$phone = "";
$image = "";
$dept = "";
$designation = "";
$linkedin = "";
$github = "";

if (isset($_GET["id"])) {
    $query = "SELECT * FROM employeeinfo WHERE id =$_GET[id]";
    $db = new DbConnect();
    $res = $db->GetData($query);
    if ($res === false) {
        die("Error occured in data collection.");
    } else {
        foreach ($res as $key => $value) {
            $id = $value["id"];
            $name = $value["name"];
            $status = $value["status"];
            $skills = $value["skills"];
            $email = $value["email"];
            $phone = $value["phone"];
            $image = $value["image"];
            $dept = $value["dept_id"];
            $designation = $value["designation_id"];
            $linkedin = $value["linkedin"];
            $github = $value["github"];
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css" />
    <title>Document</title>
</head>

<body>
    <div class="div-adminView-action-container">
        <form action="../controllers/empAction.php" method="POST">
            <table class="col-table">
                <tr>
                    <td>
                        <label for="id">ID</label>
                    </td>
                    <td><input type="text" name="id" id="id" value=<?php echo $id ?> readonly></td>
                </tr>
                <tr>
                    <td>
                        <label for="name">Name</label>
                    </td>
                    <td><input type="text" name="name" id="name" value=<?php echo $name ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="status">Status</label>
                    </td>
                    <td>
                        <select name="status" id="status">
                            <option value="0" <?php if (isset($status) && $status == '0') echo "selected"; ?>>Deactive</option>
                            <option value="1" <?php if (isset($status) && $status == '1') echo "selected"; ?>>Active</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="skills">Skills</label>
                    </td>
                    <td><input type="text" name="skills" id="skills" value=<?php echo $skills ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email</label>
                    </td>
                    <td><input type="text" name="email" id="email" value=<?php echo $email ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="phone">Phone No</label>
                    </td>
                    <td><input type="number" name="phone" id="phone" value=<?php echo $phone ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="image">Image</label>
                    </td>
                    <td><input type="file" name="image" id="image" value=<?php echo $image ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="dept">Department</label>
                    </td>
                    <td>
                        <select name="dept" id="dept">
                            <?php
                            $query = "SELECT * FROM depts;";
                            $db = new DbConnect();
                            $row = $db->GetData($query);

                            if (!$row) {
                                echo "Something went wrong!";
                            } else {
                                foreach ($row as $key => $value) {
                                    var_dump($key);
                                    echo "<option value='$value[id]' if (isset($dept) && $dept == $key) echo 'selected'>$value[name]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="designation">Designation</label>
                    </td>
                    <td>
                        <select name="designation" id="designation">
                            <?php
                            $query = "SELECT * FROM designations;";
                            $db = new DbConnect();
                            $row = $db->GetData($query);

                            if (!$row) {
                                echo "Something went wrong!";
                            } else {
                                foreach ($row as $key => $value) {
                                    echo "<option value='$value[id]' if (isset($designation) && $designation == $key) echo 'selected'>$value[title]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="linkedin">LinkedIn</label>
                    </td>
                    <td><input type="text" name="linkedin" id="linkedin" value=<?php echo $linkedin ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="github">Github</label>
                    </td>
                    <td><input type="text" name="github" id="github" value=<?php echo $github ?>></td>
                </tr>


            </table>
            <div class="adminView-btn">
                <a href="#">
                    <button class="adminView-create-btn">Create</button>
                </a>
                <a href="adminView.php"><button class="adminView-create-btn">Cancel</button></a>
            </div>
        </form>
    </div>
</body>

</html>