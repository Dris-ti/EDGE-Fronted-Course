<?php
if (!isset($_SESSION['id'])) {
	header("Location: Login.php");
	exit();
}


$id = "";
$name = "";


if (isset($_GET["id"])) {
    $query = "SELECT * FROM depts WHERE id =$_GET[id]";
    $db = new DbConnect();
    $res = $db->GetData($query);
    if ($res === false) {
        die("Error occured in data collection.");
    } else {
        foreach ($res as $key => $value) {
            $id = $value["id"];
            $name = $value["name"];
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
            </table>
            <div class="adminView-btn">
                <a href="#"><button class="adminView-create-btn">Create</button></a>
                <a href="adminView.php"><button class="adminView-create-btn">Cancel</button></a>
            </div>
        </form>
    </div>
</body>
</html>