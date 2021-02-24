<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <!-- <link rel="stylesheet" href="Animation/index.css"> -->
    <style>
    body{
        background: url('image/login.png') no-repeat center center/cover;
    }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include 'connection.php' ?>
</head>
<body>
    <h1 id="log">Login In</h1>
    <fieldset>
        <legend><img src="image/logo1.png" alt="Network Problem"></legend>
        <form method="POST">
        <div>Email: <input class="box" type="email" name="email" placeholder="Enter your email"></div>
        <div>Password: <input class="box" type="password" name="password" placeholder="Enter your password"></div>
        <div class="btn"><input type="submit" name="submit" value="Login"></div>
        <div class="btn"><button><a href="http://localhost:8080/Project1/register.php">Register</a></button></div>
        </form>
    </fieldset>
</body>
</html>

<?php
session_start();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $_SESSION['email'] = $_POST['email'];
    $pass = $_POST['password'];
    $_SESSION['pass'] = $_POST['password'];

    $result = mysqli_query($con, "SELECT * FROM registrationform where Email='$email' && Password='$pass'");
    $result2 = mysqli_query($con, "SELECT * FROM registrationform where Email!='$email' && Password='$pass'");
    $result3 = mysqli_query($con, "SELECT * FROM registrationform where Email='$email' && Password!='$pass'");
    $num = mysqli_num_rows($result);
    $num2 = mysqli_num_rows($result2);
    $num3 = mysqli_num_rows($result3);
    if($num == 1){
        ?>
        <?php
        header('location:http://localhost:8080/Project1/myprofile.php');
    }elseif ($num2 == 1) {
        ?>
        <script>swal("Incorrect Email!!", "Please enter your email correctly!!", "error");</script>
        <?php
    }elseif ($num3 == 1) {
        ?>
        <script>swal("Incorrect Password!!", "Please enter your password correctly!!", "error");</script>
        <?php
    }else{
        ?>
        <script>swal("Login Failed!!", "You Don't have an Account. Please Register", "info");</script>
        <?php
    }
}

mysqli_close($con);

?>

