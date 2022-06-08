<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php
//update CountLogin
$updateCountLoginNow = mysqli_query($conn,"UPDATE student_access SET count_login='0' WHERE student_id='$student_id_session'");

// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location:../login?logout=true');

?>