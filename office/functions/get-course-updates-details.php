<?php

if(isset($_GET['courseTab']) && isset($_GET['course']) && isset($_GET['action']))
{
    $courseTab_Ondetails = mysqli_real_escape_string($conn, $_GET['courseTab']);
    $course_Ondetails = mysqli_real_escape_string($conn, $_GET['course']);
    $action_Ondetails = mysqli_real_escape_string($conn, $_GET['action']);

    if($action_Ondetails == 'View' || $action_Ondetails == 'Add')
    {
        //check data in course db
        $checkCourseDataInDb = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$courseTab_Ondetails' AND course_id='$course_Ondetails' AND isDeleted='0'");
        $countOfcheckCourseDataInDb = mysqli_num_rows($checkCourseDataInDb);

        if($countOfcheckCourseDataInDb == 0)
        {
            echo '<script>alert("Course is Not Active / Not In Records, try again!")</script>';
           // header("Refresh:0; url=course-updates-actions");
        }
        else
        {
            //do nothing
            while($row  = mysqli_fetch_array($checkCourseDataInDb))
            {
                $course_tab_id = $row['course_tab_id'];
                $course_id = $row['course_id'];
                $course_name = $row['course_name'];

                //getCourseUpdatesByCourseId
                $getCourseUpdatesById = mysqli_query($conn,"SELECT * FROM course_updates WHERE course_id='$course_id' AND isDeleted='0' ORDER BY id DESC");
                $getCountOnItCourseUpdatesById = mysqli_num_rows($getCourseUpdatesById);

                if($getCountOnItCourseUpdatesById == 0)
                {
                    echo '<script>alert("No Updates Found On This Course!")</script>';
                }
                else
                {
                    //do nothing
                }
            }
        }
    }
    else
    {
        echo '<script>alert("Something is missing on action, try again!")</script>';
        header("Refresh:0; url=course-updates-actions");
    }
}
else
{
    echo '<script>alert("Something is missing, try again!")</script>';
    header("Refresh:0; url=course-updates-actions");
}

?>