<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="CSS/register.css">
    <style>
        body{
            background: url('image/register.jpg') no-repeat center center/cover;
        }
        input[placeholder]{
            color: black;
        }
    </style>
    <?php include 'connection.php' ?>
</head>
<body>
    <fieldset>
        <legend>Registration Form</legend>
        <form method="POST">
            <div>First Name:* <input required class="box" type="text" name="firstname" placeholder="Enter your First Name"></div>
            <div>Last Name:* <input class="box" type="text" name="lastname" placeholder="Enter your Last Name" required></div>
            <div>Email:* <input class="box" type="email" name="email" placeholder="Enter your Email Id" required></div>
            <div>Password:* <input class="box" type="password" name="password" placeholder="Enter your Password" required></div>
            <div>Re-Password:* <input class="box" type="password" name="rpassword" placeholder="Re-Enter your Password" required></div>
            <div>Mobile:* <input class="box" type="tel" name="mobile" placeholder="Enter your Mobile Number" required></div>
            <div>Address:* <input class="box" type="text" name="address" placeholder="Enter your Address" required></div>
            <div>Gender:* <select name="gender" required>
                <option value=""></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </div>
            <!-- <div>Gender: <input class="box" type="text" name="gender" placeholder="Enter your Gender"></div> -->
            <div>Degree:* <input class="box" type="text" name="degree" placeholder="Enter Your Degree" required></div>
            <div><input class="btn" type="submit" name="submit" value="Submit" id="submit_button"></div>
            <div><button class="btn"><a href="http://localhost:8080/Project1/index.php">Back</a></button></div>
        </form>
    </fieldset>

    <script>
        var submit_button = document.getElementById("submit_button");
        submit_button.addEventListener("click", function(e) {
            var required = document.querySelectorAll("input[required]");
            required.forEach(function(element) {
                if(element.value.trim() == "") {
                    element.style.backgroundColor = "red";
                }else {
                    element.style.backgroundColor = "greenyellow";
                    element.style.Color = "black";
                }
            });
        });
    </script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $degree = $_POST['degree'];

    if($rpassword != $password){
        ?>
        <script>
            alert("Your Re-Password didn't match with your Password.");
        </script>
        <?php
    }else{
        $insertquery = "insert into registrationform(Id,FirstName,LastName,Email,Password,Mobile,Address,Gender,Degree) values('$id','$firstname','$lastname','$email','$password','$mobile','$address','$gender','$degree')";
        $res = mysqli_query($con,$insertquery);
        if($res){
            header('location:http://localhost:8080/Project1/index.php');
            ?>
            <script>
            alert("Register Successfully!!");
            </script>
            <?php
        }else{
            ?>
            <script>
            alert("Not Registered.");
            </script>
            <?php
        }
    } 

   /* if(($rpassword == $password)){
        $insertquery = "insert into registrationform(Id,FirstName,LastName,Email,Password,Mobile,Address,Gender,Degree) values('$id','$firstname','$lastname','$email','$password','$mobile','$address','$gender','$degree')";
        $res = mysqli_query($con,$insertquery);
        if($res){
            ?>
                <script>
                alert("Register Successfully!!");
                </script>
                <?php
            header('location:http://localhost:8080/Project1/index.php');
        }
    }elseif($rpassword != $password){
        ?>
        <script>
            alert("Your Re-Password didn't match with your Password.");
        </script>
        <?php
    }else{
        ?>
            <script>
            alert("Not Registered.");
            </script>
            <?php
    } */
}
?>