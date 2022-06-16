<?php

// add enrollment
if(isset($_POST['enrollCourseByAdmin']))
{
    $courseTab_enroll = mysqli_real_escape_string($conn, $_POST['courseTab']);
    $course_enroll = mysqli_real_escape_string($conn, $_POST['course']);
    $EnrollCourseLiveStatus_enroll = mysqli_real_escape_string($conn, $_POST['EnrollCourseLiveStatus']);

    //check exisiting...
    $checkEnrollmentNowInDB = mysqli_query($conn,"SELECT * FROM course_assigned WHERE course_tab_id	='$courseTab_enroll' AND course_id='$course_enroll' AND student_id='$studentIdOnUrl' AND isDeleted='0'");
    $checkCountOnEnrollmentNowInDB = mysqli_num_rows($checkEnrollmentNowInDB);

    if($checkCountOnEnrollmentNowInDB == 0)
    {
            //new assign Id
            $enrollId = "EM".rand(100000000000,999999999999)."";

            //insert into ASSIGN details
            $assignCourseNow = mysqli_query($conn,"INSERT INTO course_assigned(assign_id, student_id, student_email, course_tab_id, course_id, video_id, date, status, isDeleted, last_updated)
            VALUES('$enrollId','$student_id','$student_email','$courseTab_enroll','$course_enroll','','$todayDate','$EnrollCourseLiveStatus_enroll','0','$lastUpdated')");

            echo '<script>alert("Enrollement Added Success, Refreshing...")</script>';
            header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=AddedSuccess");
    }
    else
    {
        echo '
        <div class="mt-2 alert alert-danger text-center">
            Selected Course Is Already Enrolled With This Student!
        </div>
        ';
    }
}

// edit enrollment
if(isset($_POST['enrollCourseUpdateNow']))
{
    $inputCourseNameEnrolled = mysqli_real_escape_string($conn, $_POST['inputCourseNameEnrolled']);
    $inputEnrolledIdHere = mysqli_real_escape_string($conn, $_POST['inputEnrolledIdHere']);
    $EnrollCourseLiveStatus = mysqli_real_escape_string($conn, $_POST['EnrollCourseLiveStatus']);

    //update
    $updateEnrollmentNow = mysqli_query($conn,"UPDATE course_assigned SET status='$EnrollCourseLiveStatus', last_updated='$lastUpdated' WHERE assign_id='$assign_id_forMenu'");

    echo '<script>alert("Enrollement Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=UpdatedSuccess");
}

// delete enrollment
if(isset($_POST['enrollCourseDeleteNow']))
{
    $inputCourseNameEnrolled = mysqli_real_escape_string($conn, $_POST['inputCourseNameEnrolled']);
    $inputEnrolledIdHere = mysqli_real_escape_string($conn, $_POST['inputEnrolledIdHere']);
    $EnrollCourseLiveStatus = mysqli_real_escape_string($conn, $_POST['EnrollCourseLiveStatus']);

    //delete
    $deleteEnrollmenytNow = mysqli_query($conn,"UPDATE course_assigned SET 	isDeleted='1', last_updated='$lastUpdated' WHERE assign_id='$assign_id_forMenu'");

    echo '<script>alert("Enrollement Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=DeletedSuccess");
}

?>