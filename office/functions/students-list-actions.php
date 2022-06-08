<?php

//add student
if(isset($_POST['addNewStudent']))
{
    $studentName = mysqli_real_escape_string($conn,$_POST['studentName']);
    $studentEmail = mysqli_real_escape_string($conn,$_POST['studentEmail']);
    $studentMobile = mysqli_real_escape_string($conn,$_POST['studentMobile']);
    $studentPassword = mysqli_real_escape_string($conn,$_POST['studentPassword']);
    $studentTwoFactor = mysqli_real_escape_string($conn,$_POST['studentTwoFactor']);
    $studentVerification = mysqli_real_escape_string($conn,$_POST['studentVerification']);

    //checkuserindb
    $checkUserInDb = mysqli_query($conn,"SELECT * FROM student_access WHERE student_email='$studentEmail' OR student_mobile='$studentMobile' AND isDeleted='0'");
    $getCountOfSearch = mysqli_num_rows($checkUserInDb);

    if($getCountOfSearch == 0)
    {

        if($studentTwoFactor == 1)
        {
            $studentTwoFactor == 1;
        }
        else
        {
            $studentTwoFactor == 0;
        }

        $firstLayerEncription = md5($studentPassword);
        $secondLayerEncription = sha1($firstLayerEncription);

        $std_id = rand(1000000000000,9999999999999);
        $passTudentID = "S".$std_id."";

        //insert user data
        $insertIntoStudents = mysqli_query($conn,"INSERT INTO students(student_id, student_name, student_email, student_number, date, status, isDeleted)
        VALUES('$passTudentID','$studentName','$studentEmail','$studentMobile','$todayDate','0','0')");

        $verifyOTP = rand(100000,999999);
        $sessionKey = base64_encode($studentEmail);

        //insert into student access
        $insertIntoStudentAccess = mysqli_query($conn,"INSERT INTO student_access(student_id, student_email, student_mobile, student_password, count_login, last_login, two_fa, otp_for_access, verify_state, session_key, status, isDeleted)
        VALUES('$passTudentID','$studentEmail','$studentMobile','$secondLayerEncription','0','$todayDate','$studentTwoFactor','$verifyOTP','$studentVerification','$sessionKey','0','0')");

        echo '<script>alert("Added Success, Redirecting Students List")</script>';

        header("Refresh:0; url=students-list");
    }
    else
    {
        echo '<script>alert("User Already Registered, Try Again!")</script>';

        header("Refresh:0");
    }
}

//update student
if(isset($_POST['updateStudent']))
{
    $studentEditId = mysqli_real_escape_string($conn, $_POST['studentEditId']);
    $studentVerification = mysqli_real_escape_string($conn, $_POST['studentVerification']);

    //checkStudentBeforeUpdate
    $checkStundentBeforeUpdate = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$studentEditId' AND isDeleted='0'");
    $getCntOnCheck = mysqli_num_rows($checkStundentBeforeUpdate);

    if($getCntOnCheck == 0)
    {
        // Do Nothoing
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //updateStatusVerification
        $statusVerificationUpdate = mysqli_query($conn,"UPDATE student_access SET verify_state='$studentVerification' WHERE student_id='$studentEditId'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }   

}

//delete student
if(isset($_POST['deleteStudent']))
{
    $studentDeleteId = mysqli_real_escape_string($conn, $_POST['studentDeleteId']);

    //checkStudentBeforeUpdate
    $checkStundentBeforeUpdate = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$studentDeleteId' AND isDeleted='0'");
    $getCntOnCheck = mysqli_num_rows($checkStundentBeforeUpdate);

    if($getCntOnCheck == 0)
    {
        // Do Nothoing
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //updateStatusDelete
        $statusDeletreUpdate = mysqli_query($conn,"UPDATE students SET isDeleted='1', last_updated='$lastUpdated' WHERE student_id='$studentDeleteId'");

        //update in studentaccess
        $statusUpdateInStudentAccess = mysqli_query($conn,"UPDATE student_access SET isDeleted='1' WHERE student_id='$studentDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }   

}

?>