<?php 
session_start();
include 'connection.php';
$idss = $_SESSION['ids'];
$getquery = "select * from registrationform where Id='$idss'";
$showquery = mysqli_query($con, $getquery);
$result = mysqli_fetch_array($showquery);
$cp = $result['Password'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <link rel="stylesheet" href="CSS/style3.css">
    <style>
        body{
            background: url('image/register.jpg') no-repeat center center/cover;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Update Password</legend>
        <form method="POST">
            <div>Current Password: <input class="box" type="password" name="cpassword"></div>
            <div>New Password: <input class="box" type="password" name="npassword"></div>
            <div>Re-Password: <input class="box" type="password" name="rpassword"></div>
            <div><input class="btn" type="submit" name="submit" value="Update"></div>
            <div><button class="btn"><a href="http://localhost:8080/Project1/index.php">Back</a></button></div>
        </form>
    </fieldset>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $cpassword = $_POST['cpassword'];
    $npassword = $_POST['npassword'];
    $rpassword = $_POST['rpassword'];
    
    if($cpassword != $cp){
        ?>
        <script>
            alert("Your Current Password is wrong. Please Enter Correct Password.");
        </script>
        <?php
    }else{
        if($rpassword != $npassword){
            ?>
            <script>
                alert("Your Re-Password didn't match with your New Password.");
            </script>
            <?php
        }else{
            $updatequery = "UPDATE registrationform SET Password='$npassword' WHERE Id='$idss'";
            $upd = mysqli_query($con,$updatequery);
            if($upd){
                ?>
                <script>
                alert("Updated Successfully!!");
                </script>
                <?php
                header('location:http://localhost:8080/Project1/index.php');
            }else{
                ?>
                <script>
                alert("Not Updated.");
                </script>
                <?php
            }
        }
    }
    
}
?>