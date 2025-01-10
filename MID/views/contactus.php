<?php 
include("nav.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <div class="contact-us">
        <div class="page-header">
            <h1>Contact Us</h1>
        </div>
    
        <div class="div-form">
            <div class="form">
                <form action="contact.php">
                    <div class="form__group field">
                        <input type="input" class="form__field" placeholder="Email" name="email" id='email' required />
                        <label for="email" class="form__label Email">Email</label>
                    </div>

                    <br><br>
                      
                    <div class="form__group field">
                        <input type="textarea" class="form__field" placeholder="Comment" name="comment" id='comment' required />
                        <label for="comment" class="form__label Comment">Comment</label>
                    </div>

                    <a class="submit-btn" href="#">Submit</a>

                </form>
                
            </div>
        </div>
    </div>

    


    <script src="../script.js"></script>

</body>

</html>