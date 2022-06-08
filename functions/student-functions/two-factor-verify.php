<?php

session_start();
$student_id = $_SESSION['student_session_id'];

//checkdetailsindb
$checkDetailsInDB = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$student_id'");
$getCountOfCheckDb = mysqli_num_rows($checkDetailsInDB);

if($getCountOfCheckDb == 0)
{
    header('location:/login');
}
else
{
    while($row = mysqli_fetch_array($checkDetailsInDB))
    {
        $otp_for_access = $row['otp_for_access'];
        $student_id = $row['student_id'];
        $student_email = $row['student_email'];
        $student_mobile = $row['student_mobile'];
        $session_key = $row['session_key'];

        //get student name
        $getStudentNameFromDB = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$student_id'");
        while($row = mysqli_fetch_array($getStudentNameFromDB))
        {
            $studentNameInDB = $row['student_name'];
        }
    }
}

if(isset($_POST['proceedTwoFactror']))
{
    $otphere = mysqli_real_escape_string($conn,$_POST['otphere']);

    if($otp_for_access == $otphere)
    {
        //otp verified success
        session_start();
        $_SESSION['student_id'] = $student_id;
        $_SESSION['student_email'] = $student_email;
        $_SESSION['session_key'] = $session_key;
        $_SESSION['student_name'] = $studentNameInDB;

        //makelogincount
        $updateLoginCount = mysqli_query($conn,"UPDATE student_access SET count_login='1' WHERE student_id='$student_id'");

        //redirect to student dashboard
        header('location:/student/');
    }
    else
    {
        //otp failed
        echo
        '
        <div class="alert alert-danger text-center">
            Invalid OTP, try again!
        </div>

        ';
    }
}

?>