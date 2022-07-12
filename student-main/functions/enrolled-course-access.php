<?php

if(isset($_POST['actionAccessCourse']))
{
    $accessCourseId = mysqli_real_escape_string($conn, $_POST['accessCourseId']);
    $accessRollId = mysqli_real_escape_string($conn, $_POST['accessRollId']);

    //check valid access or not
    $checkingValidAccess = mysqli_query($conn,"SELECT * FROM course_assigned WHERE assign_id='$accessRollId' AND course_id='$accessCourseId' AND student_id='$student_id_session' AND isDeleted='0' AND status='0'");
    $getCountOnValidAccess = mysqli_num_rows($checkingValidAccess);

    if($getCountOnValidAccess == 0)
    {
        echo '<script>alert("Invalid Access, Try to Access again!")</script>';
        header('location:enrolled-courses?access=invalid');
    }
    else
    {
        //do nothing
        $access_course_tab_id = $row['course_tab_id'];
        $access_course_id = $row['course_id'];

        //getCouurseNmame
        $getAccessCourseNameFromDb = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$access_course_id'");
        while($row = mysqli_fetch_array($getAccessCourseNameFromDb))
        {
            $accessableCourseTabId = $row['course_tab_id'];
            $accessedCourseName = $row['course_name'];

            //getCourseTabName
            $getCourseTabNameOnAccess = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$accessableCourseTabId'");
            while($row = mysqli_fetch_array($getCourseTabNameOnAccess))
            {
                $accessableCourseTabName = $row['course_tab_name'];
            }
        }

    }
}
else
{
    echo '<script>alert("Something Wrong, Try to Access again!")</script>';
    header('location:enrolled-courses?action=invalid');
}
?>