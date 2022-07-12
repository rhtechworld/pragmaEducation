<?php

if(isset($_POST['viewCourseUpdates']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    //redirect to view course videos 
    header('location:view-course-updates?courseTab='.$courseTab.'&course='.$course.'&action=View');
}

if(isset($_POST['AddNewCourseUpdates']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    //redirect to view course videos 
    header('location:view-course-updates?courseTab='.$courseTab.'&course='.$course.'&action=Add');
}

?>