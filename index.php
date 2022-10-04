<?php

@include 'config.php';
session_start();
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        if($_SESSION['email'] = $row['email']){
            
            header('location:home.html');
        }
        else{
            $error[] = 'incorrect email or password!';
        }
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="images/logo.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container1">
                        
                        <form action="" method="post">
                            <h3>Login now</h3>
					        <input type="email" name="email" required placeholder="enter your email">
					        <input type="password" name="password" required placeholder="enter your password">
					        <input type="submit" name="submit" value="Login" class="form-btn">
					        <p>Don't have an account? <a href="register_form.php">Register now</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>