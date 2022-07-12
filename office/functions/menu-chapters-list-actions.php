<?php

// redirect action
if(isset($_POST['viewCourseSubjectChapters']))
{
    $courseInputSelect = mysqli_real_escape_string($conn, $_POST['courseInputSelect']);
    $SubjectInputSelect = mysqli_real_escape_string($conn, $_POST['SubjectInputSelect']);

    header('location:./menu-chapters-list-view?courseId='.$courseInputSelect.'&subjectId='.$SubjectInputSelect.'');
}

if(isset($_POST['addNewChapterNow']))
{
    $chapterNameInput = mysqli_real_escape_string($conn, $_POST['chapterNameInput']);
    $chapterStatusInput = mysqli_real_escape_string($conn, $_POST['chapterStatusInput']);

    $chapter_id_new = "CA".rand(100000000,999999999)."";

    //check chapter name before inser
    $checkInDBNow = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_name='$chapterNameInput' AND subject_id='$subject_id_in_db' AND isDeleted='0'");
    $getCheckCountOnIt = mysqli_num_rows($checkInDBNow);

    if($getCheckCountOnIt == 0)
    {
        $checkChapterNameBeforeInsert = mysqli_query($conn,"INSERT INTO subject_chapters(chapter_id, subject_id, chapter_name, status, isDeleted, date, last_updated)
        VALUES('$chapter_id_new','$subject_id_in_db','$chapterNameInput','0','0','$lastUpdated','$lastUpdated')");

        echo '<script>alert("New Chapter Added Success, Refreshing...")</script>';
        header("Refresh:0; url=menu-chapters-list-view?courseId=".$course_id_in_db."&subjectId=".$subject_id_in_db."&msg=AddedSuccess");
    }
    else
    {
        echo '<script>alert("Chapter Name Already Found!, Try with diffrent name!")</script>';
        header("Refresh:0");
    }
}

if(isset($_POST['updateAddedChapterNow']))
{
    $chapterNameInput = mysqli_real_escape_string($conn, $_POST['chapterNameInput']);
    $chapterStatusInput = mysqli_real_escape_string($conn, $_POST['chapterStatusInput']);

    //update CHapter
    $updateChapterNowAsPerReq = mysqli_query($conn,"UPDATE subject_chapters SET 
    chapter_name = '$chapterNameInput',
    status='$chapterStatusInput',
    last_updated = '$lastUpdated' WHERE chapter_id='$chapter_id'");

    echo '<script>alert("Chapter Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=menu-chapters-list-view?courseId=".$course_id_get."&subjectId=".$subject_id_in_db."&msg=UpdatedSuccess");
}

if(isset($_POST['deleteAddedChapterNow']))
{
    //update CHapter
    $updateChapterNowAsPerReq = mysqli_query($conn,"UPDATE subject_chapters SET 
    isDeleted = '1',
    last_updated = '$lastUpdated' WHERE chapter_id='$chapter_id'");

    echo '<script>alert("Chapter Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=menu-chapters-list-view?courseId=".$course_id_get."&subjectId=".$subject_id_in_db."&msg=DeletedSuccess");
}

?>