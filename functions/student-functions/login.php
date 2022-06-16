<?php

if(isset($_GET['logoutAccounts']))
{
    
    $thisisCheckLogoutAccounts = $_GET['logoutAccounts'];
    
    if($thisisCheckLogoutAccounts == true)
    {
        $showThisMsgOnLoginPage = 
        '<div class="alert alert-warning text-center">
        All Sessions Cleard, Login Now!
        </div>';
    }
    else
    {
        $showThisMsgOnLoginPage = "";
    }
    
}
else
{
    $showThisMsgOnLoginPage = "";
}

if(isset($_GET['action']) && isset($_GET['id']))
{
    $mainActionOnLogin = mysqli_real_escape_string($conn,$_GET['action']);
    $mainActionOnLoginId = mysqli_real_escape_string($conn,$_GET['id']);
}

if(isset($_POST['proceedForLogin']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $firstLayerEncription = md5($password);
    $secondLayerEncription = sha1($firstLayerEncription);

    //checkuserindb
    $checkUserInDb = mysqli_query($conn,"SELECT * FROM student_access WHERE student_email='$username' AND isDeleted='0'");
    $getCountOfSearch = mysqli_num_rows($checkUserInDb);

    if($getCountOfSearch != 0)
    {
        while($row = mysqli_fetch_array($checkUserInDb))
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

            //check valid username and password
            if($student_email == $username && $student_password == $secondLayerEncription)
            {
                //get student name
                $getStudentNameFromDB = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$student_id'");
                while($row = mysqli_fetch_array($getStudentNameFromDB))
                {
                    $studentNameInDB = $row['student_name'];
                }

                // check login count
                if($count_login == 0)
                {
                    //no Login Count -> check two factor enable
                    if($two_fa == 0)
                    {
                        //no 2FA -> check verification state
                        if($verify_state == 0)
                        {
                            //if not verifies
                            session_start();
                            $_SESSION['student_session_id'] = $student_id;
                            header('location:./functions/student-functions/send-verification-email?sessionUser='.$student_mobile.'&sessionUserId='.$student_id.'&sessionKey='.$session_key.'&action=newUser');
                        }
                        else
                        {
                            //if verified
                            session_start();
                            $_SESSION['student_id'] = $student_id;
                            $_SESSION['student_email'] = $student_email;
                            $_SESSION['session_key'] = $session_key;
                            $_SESSION['student_name'] = $studentNameInDB;

                            //makelogincount
                            $updateLoginCount = mysqli_query($conn,"UPDATE student_access SET count_login='1' WHERE student_id='$student_id'");
                            
                            //redirect to student dashboard
                            if($mainActionOnLogin == '' || $mainActionOnLogin == null && $mainActionOnLoginId == '' || $mainActionOnLoginId == null)
                            {
                                header('location:./student/');
                            }
                            else
                            {
                                header('location:./student/enroll-course?cid='.$mainActionOnLoginId.'');
                            }
                        }
                    }
                    else
                    {
                        //yes 2FA

                        //update OTP in db
                        $updateToNewOTPLogin = rand(100000,999999);
                        $verifyUpdateLogin = mysqli_query($conn,"UPDATE student_access SET otp_for_access='$updateToNewOTPLogin' WHERE student_id='$student_id'");

                        session_start();
                        $_SESSION['student_session_id'] = $student_id;
                        header('location:./functions/student-functions/send-verification-email?sessionUser='.$student_mobile.'&sessionUserId='.$student_id.'&sessionKey='.$session_key.'&action=twoFactor');

                    }
                }
                else
                {
                    // already login somewhere
                    session_start();
                    $_SESSION['student_session_id'] = $student_id;
                    $showThisMsgOnLoginPage =
                    '
                    <div class="alert alert-warning text-center">
                        Account Already Logged-in Other Device/Stream, <a href="./functions/student-functions/logout-all-accounts"><b>Logout All & Login again</b></a>
                    </div>

                    ';

                }
            }
            else
            {
                $showThisMsgOnLoginPage =
                '
                <div class="alert alert-danger text-center">
                    Invalid Username/Password, try again!
                </div>

                ';
            }
            
        }
        
    }
    else
    {
        $showThisMsgOnLoginPage = 
        '
        <div class="alert alert-danger text-center">
            Username not registered, try to register new account.
        </div>

        ';
    }
}

echo $showThisMsgOnLoginPage;

?>