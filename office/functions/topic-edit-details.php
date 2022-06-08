<?php

error_reporting(0);

if(isset($_GET['action']) && isset($_GET['topic_id']))
{
    $actionOnThis = $_GET['action'];
    $topicIdOnThis = $_GET['topic_id'];

    if($actionOnThis == 'edit' && !empty($topicIdOnThis))
    {
        //get details by topic id
        $getDetailsByTopicId = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$topicIdOnThis' AND isDeleted='0'");
        $checkCountOngetDetailsByTopicId = mysqli_num_rows($getDetailsByTopicId);

        if($checkCountOngetDetailsByTopicId == 0)
        {
            echo '<script>alert("Topic Id Issue, Try again, Refreshing...")</script>';
            header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsByTopicId))
            {
                $course_id_topicDetails = $row['course_id'];
                $subject_id_topicDetails = $row['subject_id'];
                $topic_id_topicDetails = $row['topic_id'];
                $topic_name_topicDetails = $row['topic_name'];
                $topic_by_topicDetails = $row['topic_by'];
                $topic_content_topicDetails = $row['topic_content'];
                $topic_video_topicDetails = $row['topic_video'];
                $topic_status_topicDetails = $row['topic_status'];
                $topic_date_topicDetails = $row['topic_date'];
                $status_topicDetails = $row['status'];
                $isDeleted_topicDetails = $row['isDeleted'];
                $last_updated_topicDetails = $row['last_updated'];

                if($status_topicDetails == 0)
                {
                    $showStatus_topicDetails = '<span class="badge badge-success">Active (Public)</span>';
                }
                else
                {
                    $showStatus_topicDetails = '<span class="badge badge-danger">InActive (Private)</span>';
                }
            }
        }

        $actionOnTopicDetails = ''.$topic_name_topicDetails.' / Edit Topic';
        $actionOnTopicDetailsTone = 'Edit Topic';
        $actionOnTopicDetailsTwo = ' / '.$topic_name_topicDetails.'';
        $actionButtonToTakeAction = '<button type="submit" name="updateNewSubjectTopic" class="mt-3 btn btn-primary btn-block">Update Topic Now</button>';
        $actionPageTitle = "Update Topic ".$topic_name_topicDetails."";
        $inputActionOnFocus = "";

    }
    else if($actionOnThis == 'delete' && !empty($topicIdOnThis))
    {
        //get details by topic id
        $getDetailsByTopicId = mysqli_query($conn,"SELECT * FROM subject_topics WHERE topic_id='$topicIdOnThis' AND isDeleted='0'");
        $checkCountOngetDetailsByTopicId = mysqli_num_rows($getDetailsByTopicId);

        if($checkCountOngetDetailsByTopicId == 0)
        {
            echo '<script>alert("Topic Id Issue, Try again, Refreshing...")</script>';
            header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsByTopicId))
            {
                $course_id_topicDetails = $row['course_id'];
                $subject_id_topicDetails = $row['subject_id'];
                $topic_id_topicDetails = $row['topic_id'];
                $topic_name_topicDetails = $row['topic_name'];
                $topic_by_topicDetails = $row['topic_by'];
                $topic_content_topicDetails = $row['topic_content'];
                $topic_video_topicDetails = $row['topic_video'];
                $topic_status_topicDetails = $row['topic_status'];
                $topic_date_topicDetails = $row['topic_date'];
                $status_topicDetails = $row['status'];
                $isDeleted_topicDetails = $row['isDeleted'];
                $last_updated_topicDetails = $row['last_updated'];

                if($status_topicDetails == 0)
                {
                    $showStatus_topicDetails = '<span class="badge badge-success">Active (Public)</span>';
                }
                else
                {
                    $showStatus_topicDetails = '<span class="badge badge-danger">InActive (Private)</span>';
                }
            }
        }

        $actionOnTopicDetails = ''.$topic_name_topicDetails.' / Delete Topic';
        $actionOnTopicDetailsTone = 'Delete Topic';
        $actionOnTopicDetailsTwo = ' / '.$topic_name_topicDetails.'';
        $actionButtonToTakeAction = '<button type="submit" name="deleteNewSubjectTopic" class="mt-3 btn btn-danger btn-block">Delete Topic Now</button>';
        $actionPageTitle = "Delete Topic ".$topic_name_topicDetails."";
        $inputActionOnFocus = "readonly";
        
    }
    else
    {
        echo '<script>alert("Somthing Wrong, Try Again!, Refreshing...")</script>';
        header("Refresh:0; url=view-subject-topics?course_id=".$course_id."&subject_id=".$subject_id."&verifyCourse=true&verifySubject=true");
    }
}
else
{
    //do nothing
    $actionOnTopicDetails = 'Add New Topic';
    $actionOnTopicDetailsTone = 'Add Topic';
    $actionOnTopicDetailsTwo = '';
    $showStatus_topicDetails = '';
    $actionButtonToTakeAction = '<button type="submit" name="addNewSubjectTopic" class="mt-3 btn btn-primary btn-block">Add New Topic Now</button>';
    $actionPageTitle = "Add New Topic";
    $inputActionOnFocus = "";
}
?>