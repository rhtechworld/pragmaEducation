<?php

$assigned_course_topic_id = mysqli_real_escape_string($conn, $_GET['topic_id']);
$assigned_course_subject_tid = mysqli_real_escape_string($conn, $_GET['tid']);

if(empty($assigned_course_topic_id) && empty($assigned_course_subject_tid))
{
    echo '<script>alert("Invalid Subject Access, Try again!")</script>';
    header('location:./?topicAccess=failed');
}
else
{
    //check course enrollment
    $verifySubjectTopicsNow_Topic = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$assigned_course_topic_id' AND id='$assigned_course_subject_tid' AND isDeleted='0'");
    $verifySubjectTopicsNowCount = mysqli_num_rows($verifySubjectTopicsNow_Topic);

    if($verifySubjectTopicsNowCount == 0)
    {
        echo '<script>alert("Invalid Subject Access, Try again!")</script>';
        header('location:./?subjectAccess=failed');
    }
    else
    {
        //do nothing
        //getSubjectDetailsDb
        $getSubjectDetailsForHeadFromDb_Topic = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$assigned_course_topic_id'");
        while($row = mysqli_fetch_array($getSubjectDetailsForHeadFromDb_Topic))
        {

            $course_id_Topic = $row['course_id'];
            $subject_id_Topic = $row['subject_id'];
            $topic_id_Topic = $row['topic_id'];
            $topic_name_Topic = $row['topic_name'];
            $topic_by_Topic = $row['topic_by'];
            $topic_content_Topic = $row['topic_content'];
            $topic_video_Topic = $row['topic_video'];
            $topic_status_Topic = $row['topic_status'];
            $topic_date_Topic = $row['topic_date'];
            $status_Topic = $row['status'];
            $isDeleted_Topic = $row['isDeleted'];
            $last_updated_Topic = $row['last_updated'];

        }
    }
}

?>