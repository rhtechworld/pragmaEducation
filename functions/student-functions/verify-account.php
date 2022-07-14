<?php

// session_start();
$getSessionUserId = $_SESSION['student_session_id'];

if($getSessionUserId == '')
{
    //do nothing
}
else
{
    //get student name
    $getStudentName = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$getSessionUserId'");
    while($row = mysqli_fetch_array($getStudentName))
    {
        $studentName = $row['student_name'];
        $studentMobileNUmber = $row['student_number'];
        $sendEMailAddress = $row['student_email'];
    }


    //get OTP details
    $getStudentOtpDetails = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$getSessionUserId'");
    while($row = mysqli_fetch_array($getStudentOtpDetails))
    {
        $otp_for_access = $row['otp_for_access'];
        $verify_state = $row['verify_state'];
    }
    
    //if verified state success
    if($verify_state == 1)
    {
        header('location:/login');
    }

    $showThisEMailSentSuccess = '
                    <div class="alert alert-warning text-center">
                        <g class="text-success mb-3 text-center">OTP sent success to <b>'.$sendEMailAddress.'</b></g>
                    </div>
    ';

    if(isset($_POST['proceedVerification']))
    {
        $otphere = mysqli_real_escape_string($conn,$_POST['otphere']);

        //checkOTP
        if($otp_for_access == $otphere)
        {
            //update verify success in DB

            $updateToNewOTP = rand(100000,999999);
            $verifyUpdate = mysqli_query($conn,"UPDATE student_access SET otp_for_access='$updateToNewOTP', verify_state='1' WHERE student_id='$getSessionUserId'");

            //destory all sessions
            session_destroy();

            $showThisEMailSentSuccess = '
            <div class="alert alert-success text-center">
                <g class="text-success mb-3 text-center">Verification success, You can <b><a href="'.$baseURL.'login">Login Now</a></b></g>
            </div>
            ';

            header("Refresh:3; url=/login");

        }
        else
        {
            $showThisEMailSentSuccess = '
                    <div class="alert alert-danger text-center">
                        <g class="text-success mb-3 text-center">Invalid OTP, Try again!</g>
                    </div>
                ';
        }
    }

    echo $showThisEMailSentSuccess;

}

?>