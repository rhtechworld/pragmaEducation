<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('location:./login?logout=true');

?>