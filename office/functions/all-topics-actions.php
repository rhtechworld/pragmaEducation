<?php

//add new topic
if(isset($_POST['addNewSubjectTopic']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    // dynamic inputs
    $topic_id_input = "T".rand(100000000,999999999)."";

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_name='$topicNameInput' AND course_id='$course_id' AND subject_id='$subject_id' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        //add new topic
        $insertNewTopic = mysqli_query($conn,"INSERT INTO subject_topics(course_id, subject_id, topic_id, topic_name, topic_by, topic_content, topic_video, topic_status, topic_date, status, isDeleted, last_updated)
        VALUES('$course_id','$subject_id','$topic_id_input','$topicNameInput','$topicByInput','$topicContentInput','$topicVideoId','0','$lastUpdated','$topicStatusInput','0','$lastUpdated')");

        echo '<script>alert("Topic Added Success!, Redirecting to Subject Topics")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");

    }
    else
    {
        echo '<script>alert("Ho No... Topic Name Matching with records, try with new name!")</script>';
        header("Refresh:0");
    }
}

//update new topic
if(isset($_POST['updateNewSubjectTopic']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$topic_id_topicDetails' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        echo '<script>alert("Issue while updating... refreshing...")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");

    }
    else
    {
        $updateDataOnTopiNow = mysqli_query($conn,"UPDATE subject_topics SET topic_name='$topicNameInput', topic_by='$topicByInput', topic_content='$topicContentInput', topic_video='$topicVideoId', status='$topicStatusInput', last_updated='$lastUpdated' WHERE topic_id='$topic_id_topicDetails'");
        echo '<script>alert("Updated Success, Moving Back and Refreshing...")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");
    }
}

//delete new topic
if(isset($_POST['deleteNewSubjectTopic']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$topic_id_topicDetails' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        echo '<script>alert("Issue while updating... refreshing...")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");

    }
    else
    {
        $deleteDataOnTopiNow = mysqli_query($conn,"UPDATE subject_topics SET isDeleted='1', last_updated='$lastUpdated' WHERE topic_id='$topic_id_topicDetails'");
        echo '<script>alert("Deleted Success, Moving Back and Refreshing...")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");
    }
}

?>