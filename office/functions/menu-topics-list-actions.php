<?php

// redirect action
if(isset($_POST['viewCourseSubjectChaptersTopics']))
{
    $courseInputSelect = mysqli_real_escape_string($conn, $_POST['courseInputSelect']);
    $SubjectInputSelect = mysqli_real_escape_string($conn, $_POST['SubjectInputSelect']);
    $subjectChapterInput = mysqli_real_escape_string($conn, $_POST['subjectChapterInput']);

    header('location:./menu-topics-list-view?courseId='.$courseInputSelect.'&subjectId='.$SubjectInputSelect.'&chapterId='.$subjectChapterInput.'');
}

if(isset($_POST['addNewTopicNow']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    // dynamic inputs
    $topic_id_input = "T".rand(100000000,999999999)."";

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE topic_name='$topicNameInput' AND chapter_id='$chapter_id_in_db' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        //add new topic
        $insertNewTopic = mysqli_query($conn,"INSERT INTO chapter_topics(course_id, subject_id, chapter_id, topic_id, topic_name, topic_by, topic_content, topic_video, topic_status, topic_date, status, isDeleted, last_updated)
        VALUES('$course_id_in_db','$subject_id_in_db','$chapter_id_in_db','$topic_id_input','$topicNameInput','$topicByInput','$topicContentInput','$topicVideoId','$topicStatusInput','$lastUpdated','$topicStatusInput','0','$lastUpdated')");

        echo '<script>alert("Chapter Topic Added Success!, Refreshing...")</script>';
        header("Refresh:0; url=menu-topics-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&chapterId=".$chapter_id_in_db."");

    }
    else
    {
        echo '<script>alert("Ho No... Topic Name Matching with records, try with new name!")</script>';
        header("Refresh:0");
    }
}

if(isset($_POST['updateAddedTopicNow']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE topic_id='$topic_id_topicDetails' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        echo '<script>alert("Issue while updating... refreshing...")</script>';
        header("Refresh:0; url=menu-topics-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&chapterId=".$chapter_id_in_db."");

    }
    else
    {
        $updateDataOnTopiNow = mysqli_query($conn,"UPDATE chapter_topics SET 
        topic_name='$topicNameInput',
         topic_by='$topicByInput',
          topic_content='$topicContentInput',
           topic_video='$topicVideoId',
            status='$topicStatusInput',
             topic_status='$topicStatusInput',
              last_updated='$lastUpdated' WHERE topic_id='$topic_id_topicDetails'");

        echo '<script>alert("Updated Success,  Refreshing...")</script>';

        header("Refresh:0; url=menu-topics-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&chapterId=".$chapter_id_in_db."");
    }
}

if(isset($_POST['deleteAddedTopicNow']))
{
    $topicNameInput = mysqli_real_escape_string($conn,$_POST['topicNameInput']);
    $topicByInput = mysqli_real_escape_string($conn,$_POST['topicByInput']);
    $topicVideoId = mysqli_real_escape_string($conn,$_POST['topicVideoId']);
    $topicContentInput = mysqli_real_escape_string($conn,$_POST['topicContentInput']);
    $topicStatusInput = mysqli_real_escape_string($conn,$_POST['topicStatusInput']);

    //check topic name in db
    $checkSameTopicName = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE topic_id='$topic_id_topicDetails' AND isDeleted='0'");
    $checkSameNameCount = mysqli_num_rows($checkSameTopicName);

    if($checkSameNameCount == 0)
    {
        echo '<script>alert("Issue while updating... refreshing...")</script>';
        header("Refresh:0; url=menu-topics-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&chapterId=".$chapter_id_in_db."");

    }
    else
    {
        $updateDataOnTopiNow = mysqli_query($conn,"UPDATE chapter_topics SET 
             isDeleted='1',
              last_updated='$lastUpdated' WHERE topic_id='$topic_id_topicDetails'");

        echo '<script>alert("Deleted Success,  Refreshing...")</script>';

        header("Refresh:0; url=menu-topics-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&chapterId=".$chapter_id_in_db."");
    }
}

?>