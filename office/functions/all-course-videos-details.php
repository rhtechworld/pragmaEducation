<?php

if(isset($_GET['courseTab']) && isset($_GET['course']) && isset($_GET['action']))
{
    $courseTab = mysqli_real_escape_string($conn,$_GET['courseTab']);
    $course = mysqli_real_escape_string($conn,$_GET['course']);
    $action = mysqli_real_escape_string($conn,$_GET['action']);

    //check CourseTab and Course
    $checkCourseTabandCourse = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$courseTab' AND course_id='$course' AND isDeleted='0'");
    $getCntOnCheck = mysqli_num_rows($checkCourseTabandCourse);

    if($getCntOnCheck == 0)
    {
        echo '<script>alert("Something Wrong, Try Again!, Refreshing...")</script>';
        header("Refresh:0; url=all-course-videos");
    }
    else
    {
        //work on view and add
        while($row = mysqli_fetch_array($checkCourseTabandCourse))
        {
            $course_tab_id = $row['course_tab_id'];
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $date = $row['date'];
            $last_updated = $row['last_updated'];

            //get Courese tab on courese
            $getCOureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id' AND isDeleted='0'");
            while($row = mysqli_fetch_array($getCOureseTabOnCourse))
            {
                $dbCoureseTabName = $row['course_tab_name'];
            }
        }

        //check action conditions
        if($action == 'View' || $action == 'Add')
        {
            //query for view
            $getvideosQuery = mysqli_query($conn,"SELECT * FROM course_videos WHERE course_tab_id='$courseTab' AND course_id='$course' AND isDeleted='0' ORDER BY id DESC");
            $getCntOnVideos = mysqli_num_rows($getvideosQuery);

            //if no videos
            if($getCntOnVideos == 0)
            {
                echo '<script>alert("No Videos Found On This Course! Try Again!, Refreshing...")</script>';
            }
            
        }
        else
        {
            echo '<script>alert("Somthing Wrong, Try Again!, Refreshing...")</script>';
            header("Refresh:0; url=all-course-videos");
        }
    }

}
else
{
    echo '<script>alert("Somthing Wrong, Try Again!, Refreshing...")</script>';
    header("Refresh:0; url=all-course-videos");
}

?>