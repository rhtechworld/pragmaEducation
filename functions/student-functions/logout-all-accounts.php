<?php

include('../../config.php');

session_start();

if(isset($_SESSION['student_session_id']))
{

    $running_session_key = md5(rand());
    //update logincount to 0
    $thisIsStudentIs = $_SESSION['student_session_id'];
    $updateLoginCount = mysqli_query($conn,"UPDATE student_access SET count_login='0', session_key='$running_session_key' WHERE student_id='$thisIsStudentIs'");
    echo '<script>alert("Sessions Cleared, Redirecting...")</script>';
    header('location:../../login?logoutAccounts=true');

}
else
{
    header('location:../../login?logoutAccounts=false');
}

?>
<?php ob_flush(); ?>