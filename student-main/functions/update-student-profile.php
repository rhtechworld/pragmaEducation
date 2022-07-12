<?php

if(isset($_POST['updateMyProfile']))
{
    $fullNameOnUpdate  = mysqli_real_escape_string($conn, $_POST['fullName']);
    $mobileNumberOnUpdate = mysqli_real_escape_string($conn, $_POST['mobileNumber']);
    $twofacheckOnUpdate = mysqli_real_escape_string($conn, $_POST['twofacheck']);

    if($twofacheckOnUpdate != 1)
    {
        $twofacheckOnUpdate = 0;
    }
    else
    {
        $twofacheckOnUpdate = 1;
    }

    //updateuser
    $updateStudentProfile = mysqli_query($conn,"UPDATE students SET student_name='$fullNameOnUpdate', student_number='$mobileNumberOnUpdate' WHERE student_id='$student_id_session'");

    //update 2FA
    $updateStudentProfileTwoFA = mysqli_query($conn,"UPDATE student_access SET two_fa='$twofacheckOnUpdate' WHERE student_id='$student_id_session'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';

    header("Refresh:0");
   
}

if(isset($_POST['updateChangePassword']))
{
    $oldPasswordOnUpdate = mysqli_real_escape_string($conn, $_POST['oldPassword']);
    $newPasswordOnUpdate = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $newPasswordOneOnUpdate = mysqli_real_escape_string($conn, $_POST['newPasswordOne']);

    $firstLayerEncription = md5($oldPasswordOnUpdate);
    $secondLayerEncription = sha1($firstLayerEncription);

    //check oldpassword matched
    $checkUpdateOldPasswordMatched = mysqli_query($conn,"SELECT * FROM student_access WHERE student_email='$student_email_session' AND student_password='$secondLayerEncription' AND isDeleted='0'");
    $getCountOnCheckOldPassword = mysqli_num_rows($checkUpdateOldPasswordMatched);

    if($getCountOnCheckOldPassword == 0)
    {
        echo '<script>alert("Old Password is not matched!, try again!")</script>';
        header("Refresh:0");
    }
    else
    {
        //updateNewPassword
        $firstLayerEncriptionUpdateOne = md5($newPasswordOneOnUpdate);
        $secondLayerEncriptionUpdateOne = sha1($firstLayerEncriptionUpdateOne);

        //update
        $updateNewPasswordInDb = mysqli_query($conn,"UPDATE student_access SET student_password='$secondLayerEncriptionUpdateOne' WHERE student_email='$student_email_session'");

        echo '<script>alert("Password Update Success!, Refreshing...")</script>';
        header("Refresh:0");
    }
}

?>