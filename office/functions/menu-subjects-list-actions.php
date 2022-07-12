<?php

// redirect action
if(isset($_POST['viewAddCourseSubjects']))
{
    $courseInputSelect = mysqli_real_escape_string($conn, $_POST['courseInputSelect']);

    header('location:./menu-subjects-list-view?courseId='.$courseInputSelect.'');
}

if(isset($_POST['addNewSubjectNow']))
{
    $subjectNameInput = mysqli_real_escape_string($conn, $_POST['subjectNameInput']);
    $subjectDescInput = mysqli_real_escape_string($conn, $_POST['subjectDescInput']);
    $subjectLiveStatusInput = mysqli_real_escape_string($conn, $_POST['subjectLiveStatusInput']);

    $newSubjectId = "SB".rand(1000000000,9999999999)."";

    //check subject name before insert
    $checkBeforeInsertData = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_name='$subjectNameInput' AND course_id='$course_id_in_db' AND isDeleted='0'");
    $makeCntOnCheckBeforeInsert = mysqli_num_rows($checkBeforeInsertData);

    if($makeCntOnCheckBeforeInsert == 0)
    {
        //insertNow
        $insertNowAsNewSubject = mysqli_query($conn,"INSERT INTO subjects(subject_id, course_id, subject_type, subject_paper, subject_name, subject_desc, date, status, isDeleted, last_updated)
        VALUES('$newSubjectId','$course_id_in_db','','','$subjectNameInput','$subjectDescInput','$lastUpdated','0','0','$lastUpdated')");

        echo '<script>alert("New Subject Added Success, Refreshing...")</script>';
        header("Refresh:0; url=menu-subjects-list-view?courseId=".$course_id_in_db."&msg=AddedSuccess");
    }
    else
    {
        echo '<script>alert("Subject Name Already Found!, Try with diffrent name!")</script>';
        header("Refresh:0");
    }
}

if(isset($_POST['updateAddedSubjectNow']))
{
    $subjectNameInput = mysqli_real_escape_string($conn, $_POST['subjectNameInput']);
    $subjectDescInput = mysqli_real_escape_string($conn, $_POST['subjectDescInput']);
    $subjectLiveStatusInput = mysqli_real_escape_string($conn, $_POST['subjectLiveStatusInput']);

    //update Subject Details

    $updateDetailsNowHere = mysqli_query($conn,"UPDATE subjects SET
    subject_name = '$subjectNameInput',
    subject_desc = '$subjectDescInput',
    status = '$subjectLiveStatusInput',
    last_updated = '$lastUpdated' WHERE subject_id='$subject_id_db'");

    echo '<script>alert("Subject Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=menu-subjects-list-view?courseId=".$course_id_db."&msg=UpdatedSuccess");
}

if(isset($_POST['deleteAddedSubjectNow']))
{
    $updateDetailsNowHere = mysqli_query($conn,"UPDATE subjects SET
    isDeleted='1',
    last_updated = '$lastUpdated' WHERE subject_id='$subject_id_db'");

    echo '<script>alert("Subject Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=menu-subjects-list-view?courseId=".$course_id_db."&msg=DeletedSuccess");
}

?>