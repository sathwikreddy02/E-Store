<?php

@include 'config.php';
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }
    else{
        if($pass != $cpass){
            $error[] = 'password not matched';
        }
        else{
            $insert = " INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:index.php');
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
    <title>Register Form</title>

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
                    <div class="form-container">
					<form action="" method="post">
						<h3>Register now</h3>
						<?php
						if(isset($error)){
							foreach($error as $error){
								echo '<span class="error-msg">'.$error.'</span>';
							};
						};
						?>
						<input type="text" name="name" required placeholder="enter your name">
						<input type="email" name="email" required placeholder="enter your email">
						<input type="password" name="password" required placeholder="enter your password">
						<input type="password" name="cpassword" required placeholder="confirm your password">
						<input type="submit" name="submit" value="Register now" class="form-btn">
						<p>Already have an account? <a href="login_form.php">Login now</a></p>
				    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>