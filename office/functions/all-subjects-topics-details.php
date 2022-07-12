<?php

if(isset($_GET['course_id']) && isset($_GET['subject_id']))
{
    $course_id = mysqli_real_escape_string($conn,$_GET['course_id']);
    $subject_id = mysqli_real_escape_string($conn,$_GET['subject_id']);

    //check course and subject 
    $checkCourseAndSubjectInDB = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id' AND course_id='$course_id' AND isDeleted='0'");
    $getCntOnCheck = mysqli_num_rows($checkCourseAndSubjectInDB);

    if($getCntOnCheck == 0)
    {
        echo '<script>alert("Something Wrong, Try Again!, Refreshing...")</script>';
        header("Refresh:0; url=course-subjects");
    }
    else
    {
        //work on view and add
        while($row = mysqli_fetch_array($checkCourseAndSubjectInDB))
        {
            $subject_id = $row['subject_id'];
            $course_id = $row['course_id'];
            $subject_type = $row['subject_type'];
            $subject_paper = $row['subject_paper'];
            $subject_name = $row['subject_name'];
            $subject_desc = $row['subject_desc'];
            $date = $row['date'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];

            if($subject_paper == 0)
            {
                $subject_paper = '0';
                $subject_paper_show = 'Direct Access';
            }
            else
            {
                $subject_paper = $subject_paper;
                $subject_paper_show = 'Paper-'.$subject_paper.'';
            }

            //getCourseNameFromDbForSubjects
            $getCourseNameFromDbForSubjects = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id'");
            while($row = mysqli_fetch_array($getCourseNameFromDbForSubjects))
            {
                $course_name = $row['course_name'];
                $course_id = $row['course_id'];
                $course_tab_id = $row['course_tab_id'];
            }

            //get count on topics
            $getTopicsFromDbOfSubjects = mysqli_query($conn,"SELECT * FROM subject_topics WHERE course_id='$course_id' AND subject_id='$subject_id' AND isDeleted='0'");
            $getCOuntgetTopicsFromDbOfSubjects = mysqli_num_rows($getTopicsFromDbOfSubjects);

            if($getCOuntgetTopicsFromDbOfSubjects == 0)
            {
                echo '<script>alert("No Topics Found On This Subject: '.$subject_name.'")</script>';
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
    echo '<script>alert("Somthing Wrong, Try Again!, Refreshing...")</script>';
    header("Refresh:0; url=course-subjects");
}

?>