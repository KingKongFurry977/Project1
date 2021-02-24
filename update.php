<?php 
session_start();
include 'connection.php';
$idss = $_SESSION['ids'];
$getquery = "select * from registrationform where Id='$idss'";
$showquery = mysqli_query($con, $getquery);
$result = mysqli_fetch_array($showquery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updation Form</title>
    <link rel="stylesheet" href="CSS/register.css">
    <style>
        body{
            background: url('image/register.jpg') no-repeat center center/cover;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <fieldset>
        <legend>Updation Form</legend>
        <form method="POST">
            <div>First Name: <input class="box" type="text" name="firstname" value="<?= $result['FirstName'];?>" ></div>
            <div>Last Name: <input class="box" type="text" name="lastname" value="<?= $result['LastName'];?>"></div>
            <div>Email: <input class="box" type="email" name="email" value="<?= $result['Email'];?>"></div>
            <div>Mobile: <input class="box" type="tel" name="mobile" value="<?= $result['Mobile'];?>"></div>
            <div>Address: <input class="box" type="text" name="address" value="<?= $result['Address'];?>"></div>
            <div>Gender: <select name="gender">
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select></div>
            <div>Degree: <input class="box" type="text" name="degree" value="<?= $result['Degree'];?>"></div>
            <div><input class="btn" type="submit" name="submit" value="Update"></div>
            <div><button class="btn"><a href="http://localhost:8080/Project1/index.php">Back</a></button></div>
        </form>
    </fieldset>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $degree = $_POST['degree'];

    $updatequery = "UPDATE registrationform SET FirstName='$firstname',LastName='$lastname',Email='$email',Mobile='$mobile',Address='$address',Gender='$gender',Degree='$degree' WHERE Id='$idss'";
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
?>