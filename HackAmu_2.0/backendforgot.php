<?php 
include("essentials/database.php");

$username = $_POST['username'];
$phone  = $_POST['phone'];
$secu  = $_POST['security'];
$newpassword = $_POST['npass'];

$sql = "INSERT INTO userbase (username,phone,security)
VALUES ('$username','$phone','$secu')";

$q = "select * from userbase where username = '$username' && security = '$secu' && phone = '$phone' ";

$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);

if ($num == 1) {

    $sql=mysqli_query($con,"UPDATE userbase SET password = '$newpassword' WHERE username='$username'");
   echo "<script>
    alert('Password successfully changed');
document.location='index.php';
</script>";
    
} else {
    echo "<script>
    alert('Incorrect details! Please try again');
document.location='forgot.php';
</script>";  
}

?>