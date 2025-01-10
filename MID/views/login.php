<?php 
include("nav.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css" />
    <title>Log In</title>
</head>
<body>
<div class="contact-us">
        <div class="page-header">
            <h1>Login</h1>
        </div>
    
        <div class="div-form">
            <div class="form">
                <form action="../controllers/loginAction.php" method="POST">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="ID" name="id" id='id' />
                        <label for="id" class="form__label Email">ID</label>
                    </div>
                    <small class="errmsg"><?php echo isset($_SESSION["idErr"]) ? $_SESSION["idErr"] : "" ?></small>

                    <br><br>
                      
                    <div class="form__group field">
                        <input type="password" class="form__field" placeholder="Password" name="password" id='password' />
                        <label for="password" class="form__label Comment">Password</label>
                        <small class="errmsg"><?php echo isset($_SESSION["passErr"]) ? $_SESSION["passErr"] : "" ?></small>
                    </div>


                    <button class="submit-btn">Log In</button>


                </form>
                
            </div>
        </div>
    </div>
    










</body>
</body>
</html>