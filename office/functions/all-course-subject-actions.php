<?php

//view course Videos
if(isset($_POST['viewCourseSubjects']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $subjectType = mysqli_real_escape_string($conn, $_POST['courseSubjectType']);
    $subjectPaper = mysqli_real_escape_string($conn, $_POST['courseSubjectPaper']);

    //redirect to view course videos 
    header('location:view-course-subjects?courseTab='.$courseTab.'&course='.$course.'&subjectType='.$subjectType.'&paperType='.$subjectPaper.'&action=View');
}

// add course video
if(isset($_POST['AddNewCourseSubjects']))
{
    $courseTab = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $subjectType = mysqli_real_escape_string($conn, $_POST['courseSubjectType']);
    $subjectPaper = mysqli_real_escape_string($conn, $_POST['courseSubjectPaper']);

    header('location:view-course-subjects?courseTab='.$courseTab.'&course='.$course.'&subjectType='.$subjectType.'&paperType='.$subjectPaper.'&action=Add');
}

//update Course Video
if(isset($_POST['editNewCourseSubject']))
{
    $courseSubjectIDJsedit = mysqli_real_escape_string($conn,$_POST['courseSubjectIDJsedit']);
    $editSubjectNameInput = mysqli_real_escape_string($conn,$_POST['editSubjectNameInput']);
    $editSubjectStatus = mysqli_real_escape_string($conn,$_POST['editSubjectStatus']);

    //check videoID on DB
    $checkSubjectIdInDbEdit = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$courseSubjectIDJsedit' AND isDeleted='0'");
    $getCntOfCheckEdit = mysqli_num_rows($checkSubjectIdInDbEdit);

    if($getCntOfCheckEdit == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update in database
        $sqlUpdate = mysqli_query($conn,"UPDATE subjects SET subject_name='$editSubjectNameInput', status='$editSubjectStatus', last_updated='$lastUpdated' WHERE subject_id='$courseSubjectIDJsedit'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

//delete Course Video
if(isset($_POST['DeleteNewCourseSubject']))
{
    $courseSubjectIDJsDelete = mysqli_real_escape_string($conn,$_POST['courseSubjectIDJsDelete']);

    //check videoID on DB
    $checkVideoIdInDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$courseSubjectIDJsDelete' AND isDeleted='0'");
    $getCntOfCheck = mysqli_num_rows($checkVideoIdInDb);

    if($getCntOfCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update Delete in database
        $sqlUpdate = mysqli_query($conn,"UPDATE subjects SET isDeleted='1', last_updated='$lastUpdated' WHERE subject_id='$courseSubjectIDJsDelete'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

//add New Subject
if(isset($_POST['addNewCourseSubject']))
{
    $courseSubjectaddCId = mysqli_real_escape_string($conn,$_POST['courseSubjectaddCId']);
    $addSubjectNameInput = mysqli_real_escape_string($conn,$_POST['addSubjectNameInput']);
    $addSubjectTypeInput = mysqli_real_escape_string($conn,$_POST['addSubjectTypeInput']);
    $addSubjectPaperType = mysqli_real_escape_string($conn,$_POST['addSubjectPaperType']);
    $addSubjectDesc = mysqli_real_escape_string($conn,$_POST['addSubjectDesc']);
    $addSubjectStatus = mysqli_real_escape_string($conn,$_POST['addSubjectStatus']);

    //check video in db
    $checkCourseSubjectInDB = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_name='$addSubjectNameInput' AND course_id='$courseSubjectaddCId' AND subject_type='$addSubjectTypeInput' AND subject_paper='$addSubjectPaperType' AND isDeleted='0'");
    $getCNtofCheckSubjects = mysqli_num_rows($checkCourseSubjectInDB);

    if($getCNtofCheckSubjects == 0)
    {
        //add video
        $crSubjectId = "SB".rand(10000000,99999999)."";

        $addSubjectInDb = mysqli_query($conn,"INSERT INTO subjects(subject_id, course_id, subject_type, subject_paper, subject_name, subject_desc, date, status, isDeleted, last_updated)
        VALUES('$crSubjectId','$courseSubjectaddCId','$addSubjectTypeInput','$addSubjectPaperType','$addSubjectNameInput','$addSubjectDesc','$todayDate','$addSubjectStatus','0','$lastUpdated')");

        echo '<script>alert("Added Success, Refreshing...")</script>';
        header('refresh:0');

    }
    else
    {
        echo '<script>alert("Course Subject Already In Records, Try With New, Refreshing...")</script>';

        header('refresh:0');
    }
}

?>