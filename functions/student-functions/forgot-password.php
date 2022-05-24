<?php

if(isset($_POST['proceedForEmail']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);

    //check username in db
    $checkUsernameInDb = mysqli_query($conn,"SELECT * FROM student_access WHERE student_email='$username' AND isDeleted='0'");
    $getCountOnThis = mysqli_num_rows($checkUsernameInDb);

    if($getCountOnThis == 0)
    {
        $showThisMsgOnForgotPassword = 
        '
        <div class="alert alert-danger text-center">
            Username not registered, check again! or try to register new account.
        </div>

        ';
    }
    else
    {
        while($row = mysqli_fetch_array($checkUsernameInDb))
        {
            $student_id = $row['student_id'];
            $student_email = $row['student_email'];
            $student_mobile = $row['student_mobile'];
            $student_password = $row['student_password'];
            $count_login = $row['count_login'];
            $last_login = $row['last_login'];
            $two_fa = $row['two_fa'];
            $otp_for_access = $row['otp_for_access'];
            $verify_state = $row['verify_state'];
            $session_key = $row['session_key'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];

            //get student name
            $getStudentName = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$student_id'");
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
                <b><a href="#">Click Here</a></b> to reset your password.
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

            $to = $student_email;
            $subject = "Pragma Education Reset Password - #".date('dmY')."";
                    
            $header = "From:".$emailSendFromName." <".$emailSendFrom."> \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
                
            $retval = mail ($to,$subject,$emailBody,$header);
                
            if( $retval == true ) 
            {
                $showThisMsgOnForgotPassword = 
                '
                <div class="alert alert-success text-center">
                    Reset Password Email Sent Success, Check you email(inbox/spam) and reset password.
                </div>

                ';
            }
            else 
            {
                $showThisMsgOnForgotPassword = 
                '
                <div class="alert alert-danger text-center">
                    Somthing went wrong, try after sometime.
                </div>

                ';
            }
        }
    }

    echo $showThisMsgOnForgotPassword;
}

?>