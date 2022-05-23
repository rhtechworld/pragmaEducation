<?php

//view course Videos
if(isset($_POST['viewCourseVideos']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    //redirect to view course videos 
    header('location:view-course-videos?courseTab='.$courseTab.'&course='.$course.'&action=View');
}

// add course video
if(isset($_POST['AddNewCourseVideo']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    header('location:view-course-videos?courseTab='.$courseTab.'&course='.$course.'&action=Add');
}

//update Course Video
if(isset($_POST['updateCourseVideo']))
{
    $videoEditId = mysqli_real_escape_string($conn,$_POST['videoEditId']);
    $editVideoTitle = mysqli_real_escape_string($conn,$_POST['editVideoTitle']);
    $editVideoId = mysqli_real_escape_string($conn,$_POST['editVideoId']);
    $editvideoStatus = mysqli_real_escape_string($conn,$_POST['editvideoStatus']);

    //check videoID on DB
    $checkVideoIdInDb = mysqli_query($conn,"SELECT * FROM course_videos WHERE video_uid='$videoEditId' AND isDeleted='0'");
    $getCntOfCheck = mysqli_num_rows($checkVideoIdInDb);

    if($getCntOfCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update in database
        $sqlUpdate = mysqli_query($conn,"UPDATE course_videos SET video_title='$editVideoTitle', video_id='$editVideoId', status='$editvideoStatus', last_updated='$lastUpdated' WHERE 	video_uid='$videoEditId'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

//delete Course Video
if(isset($_POST['deleteCourseVideo']))
{
    $videoDeleteId = mysqli_real_escape_string($conn,$_POST['videoDeleteId']);

    //check videoID on DB
    $checkVideoIdInDb = mysqli_query($conn,"SELECT * FROM course_videos WHERE video_uid='$videoDeleteId' AND isDeleted='0'");
    $getCntOfCheck = mysqli_num_rows($checkVideoIdInDb);

    if($getCntOfCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update Delete in database
        $sqlUpdate = mysqli_query($conn,"UPDATE course_videos SET isDeleted='1', last_updated='$lastUpdated' WHERE 	video_uid='$videoDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

//add video
if(isset($_POST['addCourseVideo']))
{
    $videoaddCTId = mysqli_real_escape_string($conn,$_POST['videoaddCTId']);
    $videoaddCId = mysqli_real_escape_string($conn,$_POST['videoaddCId']);
    $addVideoTitle = mysqli_real_escape_string($conn,$_POST['addVideoTitle']);
    $addVideoId = mysqli_real_escape_string($conn,$_POST['addVideoId']);
    $addvideoStatus = mysqli_real_escape_string($conn,$_POST['addvideoStatus']);

    //check video in db
    $checkVideoInDB = mysqli_query($conn,"SELECT * FROM course_videos WHERE course_tab_id='$videoaddCTId' AND course_id='$videoaddCId' AND video_id='$addVideoId' AND isDeleted='0'");
    $getCNtofCheck = mysqli_num_rows($checkVideoInDB);

    if($getCNtofCheck == 0)
    {
        //add video
        $crVid = "V".rand(10000000,99999999)."";

        $addVideoInDB = mysqli_query($conn,"INSERT INTO course_videos(course_tab_id, course_id, video_uid, video_title, video_id, date, status, isDeleted, last_updated)
        VALUES('$videoaddCTId','$videoaddCId','$crVid','$addVideoTitle','$addVideoId','$lastUpdated','$addvideoStatus','0','$lastUpdated')");

        echo '<script>alert("Added Success, Refreshing...")</script>';
        header('refresh:0');

    }
    else
    {
        echo '<script>alert("Video On Course Already In Records, Try With New, Refreshing...")</script>';

        header('refresh:0');
    }
}

?>