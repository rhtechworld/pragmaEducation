<?php

//add new download
if(isset($_POST['addNewCourseUpdateNow']))
{
    $updateTitleInput = mysqli_real_escape_string($conn, $_POST['updateTitleInput']);
    $updateContactContent = mysqli_real_escape_string($conn, $_POST['updateContactContent']);
    $courseUpdateStatus = mysqli_real_escape_string($conn, $_POST['courseUpdateStatus']);

    $UpdateNewId = "CU".rand(100000000,999999999)."";
    $UpdateNewIdDate = date('d-m-Y');
    //insert data
    $insertDataCaInDb = mysqli_query($conn,"INSERT INTO course_updates(update_id, course_id, up_title, up_desc, up_date, status, isDeleted, last_updated)
    VALUES('$UpdateNewId','$course_id','$updateTitleInput','$updateContactContent','$UpdateNewIdDate','$courseUpdateStatus','0','$lastUpdated')");

    echo '<script>alert("Added Success, Redirecting to Course Updates")</script>';
    header("Refresh:0; url=view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View&msg=addedSuccess");

}

//update download
if(isset($_POST['updateCourseUpdates']))
{
    $updateTitleInput = mysqli_real_escape_string($conn, $_POST['updateTitleInput']);
    $updateContactContent = mysqli_real_escape_string($conn, $_POST['updateContactContent']);
    $courseUpdateStatus = mysqli_real_escape_string($conn, $_POST['courseUpdateStatus']);

    //update data
    $updateDataCa = mysqli_query($conn,"UPDATE course_updates SET up_title='$updateTitleInput', up_desc='$updateContactContent', status='$courseUpdateStatus', last_updated='$lastUpdated' WHERE update_id='$updIdOnUrl'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View&msg=updateSuccess");
}

//delete download
if(isset($_POST['deleteCourseUpdates']))
{
    //delete data
    $deleteDataCa = mysqli_query($conn,"UPDATE course_updates SET isDeleted='1', last_updated='$lastUpdated' WHERE update_id='$updIdOnUrl'");

    echo '<script>alert("Deleted Success,  Refreshing...")</script>';
    header("Refresh:0; url=view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View&msg=deleteSuccess");
}

?>