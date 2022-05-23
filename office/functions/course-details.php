<?php

$getCourseID =  mysqli_real_escape_string($conn,$_GET['courseId']);

//check course details in db
$checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$getCourseID'");
$getCountOfDetails = mysqli_num_rows($checkCourseDetailsInDB);

if($getCountOfDetails == 0)
{
    header('location:courses-list');
}
else
{
    while($row = mysqli_fetch_array($checkCourseDetailsInDB))
    {
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $course_desc = $row['course_desc'];
        $course_price = $row['course_price'];
        $view_schedule_link = $row['view_schedule_link'];
        $date = $row['date'];
        $last_updated = $row['last_updated'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];

        //get details from couses table
        $getDetailsFromCourses = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id'");
        while($row = mysqli_fetch_array($getDetailsFromCourses))
        {
            $course_tab_id_db = $row['course_tab_id'];
            $course_status_db = $row['status'];
        }


        if($course_status_db == 0)
        {
            $statusNameShow = "Active";
        }
        else
        {
            $statusNameShow = "InActive";
        }

        //get tab details
        $getRelatedTabDetails = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id = '$course_tab_id_db'");
        while($row = mysqli_fetch_array($getRelatedTabDetails))
        {
            $course_tab_name_db = $row['course_tab_name'];
        }

    }

    //query to run show list drop down of course tabs
    $showDropDownCouseTabs = mysqli_query($conn,"SELECT * FROM course_tabs WHERE isDeleted='0'");
}


?>