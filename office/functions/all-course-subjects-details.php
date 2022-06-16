<?php

if(isset($_GET['courseTab']) && isset($_GET['course']) && isset($_GET['subjectType']) && isset($_GET['paperType']) && isset($_GET['action']))
{
    $courseTab = mysqli_real_escape_string($conn,$_GET['courseTab']);
    $course = mysqli_real_escape_string($conn,$_GET['course']);
    $action = mysqli_real_escape_string($conn,$_GET['action']);
    $subjectType = mysqli_real_escape_string($conn, $_GET['subjectType']);
    $subjectPaper = mysqli_real_escape_string($conn, $_GET['paperType']);

    if($subjectPaper == 0)
    {
        $subjectPaper = '0';
        $subjectPaper_show = 'Direct Access';
    }
    else
    {
        $subjectPaper = $subjectPaper;
        $subjectPaper_show = 'Paper-'.$subjectPaper.'';
    }


    //getCourseNameFromDbForSubjects
    $getCourseNameFromDbForSubjects = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course'");
    while($row = mysqli_fetch_array($getCourseNameFromDbForSubjects))
    {
        $course_name = $row['course_name'];
        $course_id = $row['course_id'];
    }

    //check CourseTab and Course
    $checkCourseTabandCourseSubject = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$course' AND subject_type='$subjectType' AND subject_paper='$subjectPaper' AND isDeleted='0'");
    $getCntOnCheckSubject = mysqli_num_rows($checkCourseTabandCourseSubject);

    if($getCntOnCheckSubject == 0)
    {
        echo '<script>alert("No Subjects Found On This Course By Types!")</script>';
    }
    else
    {

        if($action == 'View' || $action == 'Add')
        {       
            //do nothing   
        }
        else
        {
            echo '<script>alert("Somthing Wrong, Try Again!, Refreshing...")</script>';
            header("Refresh:0; url=course-subjects");
        }
    }

}
else
{
    echo '<script>alert("Somthing Wrong Missing, Try Again!, Refreshing...")</script>';
    header("Refresh:0; url=course-subjects");
}

?>