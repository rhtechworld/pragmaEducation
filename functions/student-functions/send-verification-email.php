<?php

include('../../config.php');

session_start();
$getMobileNumber = mysqli_real_escape_string($conn,$_GET['sessionUser']);
$getSessionUserId = mysqli_real_escape_string($conn,$_SESSION['student_session_id']);
$getSessionKey = mysqli_real_escape_string($conn,$_GET['sessionKey']);
$getSessionAction = mysqli_real_escape_string($conn,$_GET['action']);

if($getMobileNumber == ''  && $getSessionUserId == ''  && $getSessionKey == ''  && $getSessionAction == '')
{
    header('location:/login');
}
else
{
    //redirectonkeyword wronf
    if($getSessionAction != 'newUser' || $getSessionAction != 'twoFactor')
    {
        header('location:/login');
    }

    //checkSessionUserInDB
    $checkUSerInDB = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$getSessionUserId' AND isDeleted='0'");
    $getCOuntOFUserInDB = mysqli_num_rows($checkUSerInDB);

    if($getCOuntOFUserInDB == 0)
    {
        header('location:/login');
    }
    else
    {
        //RetiveDetails
        while($row = mysqli_fetch_array($checkUSerInDB))
        {
            $otp_for_access = $row['otp_for_access'];
            $sendEMailAddress = $row['student_email'];
        }

        //get student name
        $getStudentName = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$getSessionUserId'");
        while($row = mysqli_fetch_array($getStudentName))
        {
            $studentName = $row['student_name'];
            $studentMobileNUmber = $row['student_number'];
        }

        //sendemail
        $emailBody = '
        <div style="padding:12px;border:1px solid #E61F26;border-radius:10px;font-family: Arial, Helvetica, sans-serif;">
        <center>
            <img src="'.$baseURL.'assets/new-img/Pragma-Education-Web.png" width="170" height="60">
            <hr>
            <div style="width:85%;text-align:left;padding:12px">
            Hello '.$studentName.',
            <br><br>
            The One Time Password is <b>'.$otp_for_access.'</b>.
            <br><br>
            Please note that, the above mentioned OTP will be valid for the next 5 minutes only. Please do not share this with anyone.
            <br>
            <br>
            Warm Regards,<br>
            Team <b>Pragma Education</b>
            <br>
            <br>
            Note: This is an auto-generated mail. Please do not reply to this mail.
            </div>
        </center>
        </div>
        ';

        $to = $sendEMailAddress;
        $subject = "Your OTP for access to ".$getSessionUserId."-#".date('dmY')."";
                
        $header = "From:".$emailSendFromName." <".$emailSendFrom."> \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
            
        $retval = mail ($to,$subject,$emailBody,$header);
            
        if( $retval == true ) 
        {
            if($getSessionAction == 'newUser')
            {
                header('location:/verify-account');
            }
            else if($getSessionAction == 'twoFactor')
            {
                header('location:/two-factor');
            }
            else
            {
                header('location:/login');
            }
        }
        else 
        {
            echo "<b class='text-danger mb-3'>Facing issue, Try again!</b>";
        }

    }
}
?>