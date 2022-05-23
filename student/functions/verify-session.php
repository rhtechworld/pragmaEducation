<?php

session_start();

if(isset($_SESSION['student_email']))
{
    $student_email = $_SESSION['student_email'];
    $session_key = $_SESSION['session_key'];

    //get user details
    $getSessionUserDetails = mysqli_query($conn,"SELECT * FROM students WHERE student_email='$student_email' AND isDeleted='0'");
    $getCOuntOnSessionUser = mysqli_num_rows($getSessionUserDetails);

    if($getCOuntOnSessionUser == 0)
    {
        echo '<script>alert("Somthing Wrong, Session Expired! Redirecting...")</script>';
        header('refresh:../login?sessionStatus=Expired');
    }
    else
    {
        while($row = mysqli_fetch_array($getSessionUserDetails))
        {
            $student_id_session = $row['student_id'];
            $student_name_session = $row['student_name'];
            $student_email_session = $row['student_email'];
            $student_number_session = $row['student_number'];
            $date_session = $row['date'];
            $status_session = $row['status'];
            $isDeleted_session = $row['isDeleted'];
            $last_updated_session = $row['last_updated'];

            //get student_access on student
            $getStudentAccessOnStudentSession = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$student_id_session'");
            $getCntOfStudentAccessSession = mysqli_num_rows($getStudentAccessOnStudentSession);

            while($row = mysqli_fetch_array($getStudentAccessOnStudentSession))
            {
                $count_login_access_session = $row['count_login'];
                $last_login_access_session = $row['last_login'];
                $two_fa_access_session = $row['two_fa'];
                $otp_for_access_session = $row['otp_for_access'];
                $verify_state_access_session = $row['verify_state'];
                $status_access_session = $row['status'];
            }
            
        }
    }
}
else
{
    echo '<script>alert("Session Expired! Redirecting...")</script>';
    header('refresh:../login?sessionStatus=Expired');
}
?>