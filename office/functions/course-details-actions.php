<?php

//add new course
if(isset($_POST['addCourseDetails']))
{
    $coursePriceInput = mysqli_real_escape_string($conn,$_POST['coursePrice']);
    $courseViewScheduleInput = mysqli_real_escape_string($conn,$_POST['courseViewSchedule']);
    $courseDescInput = mysqli_real_escape_string($conn,$_POST['courseDesc']);
    $courseStatus = mysqli_real_escape_string($conn,$_POST['courseStatus']);
    $courseTab = mysqli_real_escape_string($conn,$_POST['courseTab']);
    $courseName = mysqli_real_escape_string($conn,$_POST['courseName']);

    //checkBeforeAdd
    $checkBeforeAdd = mysqli_query($conn,"SELECT * FROM courses WHERE course_name='$courseName' AND isDeleted='0'");
    $cntOfCheckAdd = mysqli_num_rows($checkBeforeAdd);

    if($cntOfCheckAdd == 0)
    {
        //check view link empty
        if($courseViewScheduleInput == '' || $courseViewScheduleInput == null)
        {
            $courseViewScheduleInput = "#";
        }

        $crsid = rand(100000,999999);
        $courseIdNew = "C".$crsid."";

        //insert Course Details
        $insertCourseDetailsDb = mysqli_query($conn,"INSERT INTO courses(course_tab_id, course_id, course_name, status, isDeleted, date, last_updated)
        VALUES('$courseTab','$courseIdNew','$courseName','$courseStatus','0','$todayDate','$lastUpdated')");

        //insert into course detailed page
        $insertIntoCourseDetaild = mysqli_query($conn,"INSERT INTO course_details(course_id, course_name, course_desc, course_price, view_schedule_link, date, last_updated, status, isDeleted)
        VALUES('$courseIdNew','$courseName','$courseDescInput','$coursePriceInput','$courseViewScheduleInput','$todayDate','$lastUpdated','0','0')");

        echo '<script>alert("Added Success, Redirecting to Courses List")</script>';

        header("Refresh:0; url=courses-list");

    }
    else
    {
        echo '<script>alert("Same Course Name Already In Records, Try With New Name!")</script>';

        header("Refresh:0");
    }   
    
}

//update course details
if(isset($_POST['updateCourseDetails']))
{
    $coursePriceInput = mysqli_real_escape_string($conn,$_POST['coursePrice']);
    $courseViewScheduleInput = mysqli_real_escape_string($conn,$_POST['courseViewSchedule']);
    $courseDescInput = mysqli_real_escape_string($conn,$_POST['courseDesc']);
    $courseStatus = mysqli_real_escape_string($conn,$_POST['courseStatus']);
    $courseTab = mysqli_real_escape_string($conn,$_POST['courseTab']);
    $courseName = mysqli_real_escape_string($conn,$_POST['courseName']);

    $lastUpdated = date('d-m-Y, h:i A');

    //updateCourseDetails
    $updateCourseDetailsInDb = mysqli_query($conn,"UPDATE course_details SET course_name='$courseName', course_desc='$courseDescInput', course_price='$coursePriceInput', view_schedule_link='$courseViewScheduleInput', last_updated='$lastUpdated' WHERE course_id='$course_id'");

    $updateCourseDetailsInDbMain = mysqli_query($conn,"UPDATE courses SET course_tab_id='$courseTab', course_name='$courseName', status='$courseStatus', last_updated='$lastUpdated' WHERE course_id='$course_id'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';

    header('refresh:0');
}

//delete cousres details
if(isset($_POST['deleteCourse']))
{
    $courseDeleteId = mysqli_real_escape_string($conn,$_POST['courseDeleteId']);

    //checkCourseID Before Delete
    $checkBeforeDelete = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$courseDeleteId'");
    $getcntnCheckDelete = mysqli_num_rows($checkBeforeDelete);

    if($getcntnCheckDelete == 0)
    {
        // Do Nothoing
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update to delete
        $updateInDbToDeleteCourse = mysqli_query($conn,"UPDATE courses SET isDeleted='1' WHERE course_id='$courseDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }
    
}

?>