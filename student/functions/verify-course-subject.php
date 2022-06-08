<?php

$assigned_course_subject_id = mysqli_real_escape_string($conn, $_GET['subject_id']);
$assigned_course_subject_type = mysqli_real_escape_string($conn, $_GET['subject_type']);
$assigned_course_subject_paper = mysqli_real_escape_string($conn, $_GET['subject_paper']);

if(empty($assigned_course_subject_id) && empty($assigned_course_subject_type) && empty($assigned_course_subject_paper))
{
    echo '<script>alert("Invalid Subject Access, Try again!")</script>';
    header('location:./?subjectAccess=failed');
}
else
{
    //check course enrollment
    $verifySubjectTopicsNow = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$assigned_course_subject_id' AND subject_type='$assigned_course_subject_type' AND subject_paper='$assigned_course_subject_paper' AND isDeleted='0'");
    $verifySubjectTopicsNowCount = mysqli_num_rows($verifySubjectTopicsNow);

    if($verifySubjectTopicsNowCount == 0)
    {
        echo '<script>alert("Invalid Subject Access, Try again!")</script>';
        header('location:./?subjectAccess=failed');
    }
    else
    {
        //do nothing
        //getSubjectDetailsDb
        $getSubjectDetailsForHeadFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$assigned_course_subject_id'");
        while($row = mysqli_fetch_array($getSubjectDetailsForHeadFromDb))
        {

            $subject_id_ForHead = $row['subject_id'];
            $course_id_ForHead = $row['course_id'];
            $subject_type_ForHead = $row['subject_type'];
            $subject_paper_ForHead = $row['subject_paper'];
            $subject_name_ForHead = $row['subject_name'];
            $subject_desc_ForHead = $row['subject_desc'];
            $date_ForHead = $row['date'];
            $status_ForHead = $row['status'];
            $isDeleted_ForHead = $row['isDeleted'];
            $last_updated_ForHead = $row['last_updated'];

            if($subject_type_ForHead == 'Prelims')
            {
                $prilimsForwardLinkIs = "course-prelims";
            }
            if($subject_type_ForHead == 'Mains')
            {
                $prilimsForwardLinkIs = "course-mains";
            }

        }
    }
}

?>