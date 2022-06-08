<?php include('../config.php'); ?>
<?php
//check session
session_start();

if(!isset($_SESSION['admin_username']))
{
    header('location:./login?sessionExpired=true');
}
else
{
    $thisSessionUserNameIs = $_SESSION['admin_username'];
    //get session details
    $getSessionDetailsOfAdmin = mysqli_query($conn,"SELECT * FROM office_admins WHERE username='$thisSessionUserNameIs'");
    while($row = mysqli_fetch_array($getSessionDetailsOfAdmin))
    {
        $admin_name_onSession = $row['admin_name'];
    }
}
?>