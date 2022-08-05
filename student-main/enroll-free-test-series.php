<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['tsId']) && isset($_GET['cf']))
{
    $assigntsId = mysqli_real_escape_string($conn, $_GET['tsId']);
    $assignCfFroFree = mysqli_real_escape_string($conn, $_GET['cf']);

    if($assignCfFroFree == 163045 || $assignCfFroFree == '')
    {
        $enrollId = "EF".rand(100000000000,999999999999)."";

        //insert into ASSIGN details
        $assignCourseNow = mysqli_query($conn,"INSERT INTO test_series_assigned(ts_assigned_id, ts_id, course_id, student_id, student_email, status, isDeleted, date, last_updated)
        VALUES('$enrollId','$assigntsId','NA','$student_id_session','$student_email_session','0','0','$todayDate','$lastUpdated')");
    
        echo '<script>alert("Free Enrolled Success, Refreshing...")</script>';
        header('refresh:0; url=test-series-enroll-access?tsId='.$assigntsId.'&enId='.$enrollId.'&msg=EnrolledSuccess');
    }
    else
    {
        echo '<script>alert("Somthing went wrong! Try again!")</script>';
        header('refresh:0; url=test-series&msg=EnrolledFailedOnPriceCheck');
    }
}
else
{
    echo '<script>alert("Somthing went wrong! Try again!")</script>';
    header('refresh:0; url=test-series&msg=EnrolleFailedOnGetUrl');
}

?>

<? ob_flush(); ?>

