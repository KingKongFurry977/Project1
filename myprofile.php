<?php 
session_start();
include_once 'connection.php'; 
$e = $_SESSION['email'];
$p = $_SESSION['pass'];
$result = mysqli_query($con, "SELECT * FROM registrationform WHERE Email='$e' && Password='$p'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyProfile</title>
    <!-- <link rel="stylesheet" href="CSS/profile.css">  -->
    <link rel="stylesheet" href="CSS/profile2.css">
    <style>
    body{
        background: url('image/profile.jpg') no-repeat center center/cover;
    }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div>
        <h1>My Profile</h1>
    </div>
    <div class="icon">
        <button class="edit"><a href="http://localhost:8080/Project1/update.php"><img src="image/Edit.png" alt="Network error"></a></button>
        <span>Edit Profile</span>
    </div>
    <div class="icon">
        <button class="edit"><a href="http://localhost:8080/Project1/passwordUpdate.php"><img src="image/pedit.png" alt="Network error"></a></button>
        <span>Edit Password</span>
    </div>
    <div class="icon">
        <button class="edit"><a href="http://localhost:8080/Project1/delete.php"><img src="image/delete.png" alt="Network error"></a></button>
        <span>Delete Profile</span>
    </div>
    <div class="container">
        <table border="1" cellspassing="0">
            <?php
            while($row = mysqli_fetch_array($result)){
                $_SESSION['ids'] = $row['Id'];
                ?>
                <tr>
                    <th>Id:</th>
                    <td><?= $row['Id'];?></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td><?= $row['FirstName'];?> <?= $row['LastName'];?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?= $row['Email'];?></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><?= $row['Password'];?></td>
                </tr>
                <tr>
                    <th>Mobile Number:</th>
                    <td><?= $row['Mobile'];?></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?= $row['Address'];?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?= $row['Gender'];?></td>
                </tr>
                <tr>
                    <th>Degree:</th>
                    <td><?= $row['Degree'];?></td>
                </tr>
            <?php
            mysqli_close($con);
            }
            ?>
        </table>
    </div>
    <div>
        <button class="btn"><a href="http://localhost:8080/Project1/index.php">Log Out</a></button>
    </div>

    <!-- For Email -->
    <form method="POST">
    <fieldset>
        <legend>Text Email</legend>
        <div class="Mailing">
                <div>
                    From: kuwarpatwa97@gmail.com (Website Owner)
                </div>
                <div>
                    To: <input type="email" name="em">
                </div>
                <div>
                    Subject: <input type="text" name="sub">
                </div>
                <div>
                    Body: <textarea name="message" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <input type="submit" name="send" value="Send">
                </div>
        </div>
    </fieldset>
    </form>
    
</body>
</html>

<?php
if(isset($_POST['send'])){
    $to_email = $_POST['em'];
    $subject = $_POST['sub'];
    $body = $_POST['message'];
    $header = "From: kuwarpatwa97@gmail.com";

    if(mail($to_email, $subject, $body, $header)){
        ?>
        <script>swal("Sent Successfully!!" "success");</script>
        <?php
    }else{
        ?>
        <script>swal("Sending Failed!!", "error");</script>
        <?php
    }
}

?>