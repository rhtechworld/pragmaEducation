<?php

if(isset($_POST['proceedRegsiter']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $number = mysqli_real_escape_string($conn,$_POST['number']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $firstLayerEncription = md5($password);
    $secondLayerEncription = sha1($firstLayerEncription);

    //checkuserindb
    $checkUserInDb = mysqli_query($conn,"SELECT * FROM student_access WHERE student_email='$username' OR student_mobile='$number' AND isDeleted='0'");
    $getCountOfSearch = mysqli_num_rows($checkUserInDb);

    if($getCountOfSearch == 0)
    {
        $std_id = rand(1000000000000,9999999999999);
        $passTudentID = "S".$std_id."";

        //insert user data
        $insertIntoStudents = mysqli_query($conn,"INSERT INTO students(student_id, student_name, student_email, student_number, date, status, isDeleted)
        VALUES('$passTudentID','$name','$username','$number','$todayDate','0','0')");

        $verifyOTP = rand(100000,999999);
        $sessionKey = base64_encode($username);

        //insert into student access
        $insertIntoStudentAccess = mysqli_query($conn,"INSERT INTO student_access(student_id, student_email, student_mobile, student_password, count_login, last_login, two_fa, otp_for_access, verify_state, session_key, status, isDeleted)
        VALUES('$passTudentID','$username','$number','$secondLayerEncription','0','$todayDate','0','$verifyOTP','0','$sessionKey','0','0')");

        session_start();
        $_SESSION['student_session_id'] = $passTudentID;
        header('location:/functions/student-functions/send-verification-email?sessionUser='.$number.'&sessionUserId='.$passTudentID.'&sessionKey='.$sessionKey.'&action=newUser');

    }
    else
    {
        echo
        '
        <div class="alert alert-danger text-center">
            Username / Mobile number already exists, try to login your account.
        </div>

        ';
    }
}

?>