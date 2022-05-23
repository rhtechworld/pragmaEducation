<?php

//add new couseTab
if(isset($_POST['newCourseTab']))
{
    $courseTabName =mysqli_real_escape_string($conn, $_POST['courseTabName']);   
    $crsTabId = rand(100000,999999);
    $courseTabId = "CT".$crsTabId."";

    $lastUpdated = date('d-m-Y, h:i A');

    //check before insert
    $checkTabBeforeInsert = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_name='$courseTabName' AND isDeleted='0'");
    $getCntOnCheck = mysqli_num_rows($checkTabBeforeInsert);

    if($getCntOnCheck == 0)
    {
        //insertNewTab
        $insertNewTab = mysqli_query($conn,"INSERT INTO course_tabs(course_tab_id, course_tab_name, status, isDeleted, date, last_updated)
        VALUES('$courseTabId','$courseTabName','0','0','$todayDate','$lastUpdated')");

        echo '<script>alert("Added Success, Redirecting to Course Tabs")</script>';

        header("Refresh:0; url=course-tabs");
    }
    else
    {
        echo '<script>alert("Same Course Tab Name Already In Records, Try With New Name!")</script>';

        header("Refresh:0");
    }  

}

//update CourseTab Details
if(isset($_POST['updateCourseTab']))
{
    $courseTabEditId = mysqli_real_escape_string($conn,$_POST['courseTabEditId']);
    $courseTabEditName = mysqli_real_escape_string($conn,$_POST['courseTabEditName']);
    $courseTabEditStatus = mysqli_real_escape_string($conn,$_POST['courseTabEditStatus']);

    $lastUpdated = date('d-m-Y, h:i A');

    //checkId Before Update
    $checkIdBeforeUpdate = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$courseTabEditId' AND isDeleted='0'");
    $getCntOfCheck = mysqli_num_rows($checkIdBeforeUpdate);

    if($getCntOfCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update data in database
        $updateTabDetails = mysqli_query($conn,"UPDATE course_tabs SET course_tab_name='$courseTabEditName', status='$courseTabEditStatus', last_updated='$lastUpdated' WHERE course_tab_id='$courseTabEditId'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }
    
}

//delete CourseTab Details
if(isset($_POST['deleteCourseTab']))
{
    $courseTabDeleteId = mysqli_real_escape_string($conn,$_POST['courseTabDeleteId']);

    $lastUpdated = date('d-m-Y, h:i A');

    //checkId Before Update
    $checkIdBeforeUpdate = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$courseTabDeleteId' AND isDeleted='0'");
    $getCntOfCheck = mysqli_num_rows($checkIdBeforeUpdate);

    if($getCntOfCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
         //delete - update data in database
        $updateTabDetails = mysqli_query($conn,"UPDATE course_tabs SET isDeleted='1', last_updated='$lastUpdated' WHERE course_tab_id='$courseTabDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }

}

?>