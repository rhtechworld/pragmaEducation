<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['courseTab']) && isset($_GET['course']) && isset($_GET['cf']))
{
    $assignCourseTabFree = mysqli_real_escape_string($conn, $_GET['courseTab']);
    $assignCourseForFree = mysqli_real_escape_string($conn, $_GET['course']);
    $assignCfFroFree = mysqli_real_escape_string($conn, $_GET['cf']);

    if($assignCfFroFree == 163045 || $assignCfFroFree == '')
    {
        $enrollId = "EF".rand(100000000000,999999999999)."";

        //insert into ASSIGN details
        $assignCourseNow = mysqli_query($conn,"INSERT INTO course_assigned(assign_id, student_id, student_email, course_tab_id, course_id, video_id, date, status, isDeleted, last_updated)
        VALUES('$enrollId','$student_id_session','$student_email_session','$assignCourseTabFree','$assignCourseForFree','','$todayDate','0','0','$lastUpdated')");

        echo '<script>alert("Enrolled Success, Refreshing...")</script>';
        header('refresh:0; url=check-list?ct='.$assignCourseTabFree.'&msg=EnrolledSuccess');
    }
    else
    {
        echo '<script>alert("Somthing went wrong! Try again!")</script>';
        header('refresh:0; url=check-list?ct='.$assignCourseTabFree.'&msg=EnrolledFailedOnPriceCheck');
    }
}
else
{
    echo '<script>alert("Somthing went wrong! Try again!")</script>';
    header('refresh:0; url=check-list?ct='.$assignCourseTabFree.'&msg=EnrolleFailedOnGetUrl');
}

?>

<? ob_flush(); ?>

