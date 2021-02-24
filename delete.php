<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
</html>


<?php
session_start();
include 'connection.php';
$ids = $_SESSION['ids'];
$deleteQuery = "DELETE FROM registrationform WHERE Id='$ids'";

?>
<script>
swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this Data!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    <?= $delete = mysqli_query($con, $deleteQuery); ?>
    swal("Poof! Your Data has been deleted!", {
      icon: "success",
    });
  } else {
    swal("Your Data is safe!");
  }
});
</script>

<?php
if($delete){
    header('location:http://localhost:8080/Project1/index.php');
}
?>