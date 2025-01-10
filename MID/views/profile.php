<?php 
include("nav.php");
require "../models/dbconnection.php";
session_start();

$name = "";
$email = "";
$phone = "";
$dept = "";
$designation = "";
$status = "";
$linkedin = "";
$github = "";




if (isset($_SESSION["id"])) {
    $query = "SELECT  employeeinfo.name, employeeinfo.email, employeeinfo.phone, employeeinfo.linkedin, employeeinfo.github, depts.name as dept, designations.title as designation, employeeinfo.status as status
    FROM `employeeinfo` 
    INNER JOIN depts on employeeinfo.dept_id = depts.id
    INNER JOIN designations on employeeinfo.designation_id = designations.id
    WHERE employeeinfo.id = $_SESSION[id]";
    $db = new DbConnect();
    $res = $db->GetData($query);
    if ($res === false) {
        die("Error occured in data collection.");
    } else {
        foreach ($res as $key => $value) {
            $name = $value["name"];
            $email = $value["email"];
            $phone = $value["phone"];"";
            $dept = $value["dept"];
            $designation = $value["designation"];
            $status = $value["status"];
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
    <link rel="stylesheet" href="../style.css">
    <title>Profile</title>
</head>
<body>
    <div class="main-profile-container">
        <div class="profile-info-box">
            <form action="../controllers/updateProfileAction.php" method="POST">

            <table>
                <tr>
                    <th>Name </th>
                    <td>
                        <input type="text" name="name" value="<?php echo $name ?>">
                    </td>
                    
                </tr>

                <tr>
                    <th>Email </th>
                    <td>
                        <input type="text" name="email" value="<?php echo $email ?>">
                    </td>
                    
                </tr>

                <tr>
                    <th>Phone No </th>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone ?>">
                    </td>
                    
                    
                </tr>

                <tr>
                    <th>Department </th>
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
                    <th>Designation </th>
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
                    <th>Status </th>
                    <td>
                        <select name="status" id="status">
                            <option value="0" <?php if (isset($status) && $status == '0') echo "selected"; ?>>Deactive</option>
                            <option value="1" <?php if (isset($status) && $status == '1') echo "selected"; ?>>Active</option>
                        </select>
                    </td>
                    <
                </tr>

                <tr>
                    <th>Linkedin </th>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $linkedin ?>">
                    </td>
                    
                </tr>

                <tr>
                    <th>Github </th>
                    <td>
                        <input type="text" name="github" value="<?php echo $github ?>">
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <button>
                        <a href="../views/profile.php">Cancel</a>
                        </button>
                        
                    </td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                </tr>
            </table>

            </form>
            

        </div>
    </div>
</body>
</html>