<?php
if (!isset($_SESSION['id'])) {
	header("Location: Login.php");
	exit();
}


$id = "";
$name = "";
$status = "";
$description = "";
$image = "";
$website = "";



if (isset($_GET["id"])) {
    $query = "SELECT * FROM projects WHERE id =$_GET[id]";
    $db = new DbConnect();
    $res = $db->GetData($query);
    if ($res === false) {
        die("Error occured in data collection.");
    } else {
        foreach ($res as $key => $value) {
            $id = $value["id"];
            $name = $value["name"];
            $status = $value["status"];
            $description = $value["description"];
            $image = $value["image"];
            $website = $value["website"];

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
        <form action="../controllers/deptAction.php" method="POST">
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
                    <td><input type="text" name="status" id="status" value=<?php echo $status ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="description">Description</label>
                    </td>
                    <td><input type="text" name="description" id="description" value=<?php echo $description ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="image">Image</label>
                    </td>
                    <td><input type="file" name="image" id="image" value=<?php echo $image ?>></td>
                </tr>
                <tr>
                    <td>
                        <label for="website">Website</label>
                    </td>
                    <td><input type="text" name="website" id="website" value=<?php echo $website ?>></td>
                </tr>
                
            </table>
            <div class="adminView-btn">
                <a href="#"><button class="adminView-create-btn">Create</button></a>
                <a href="adminView.php"><button class="adminView-create-btn">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>