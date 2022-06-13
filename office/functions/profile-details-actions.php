
<?php

error_reporting(0);

if(isset($_POST['updateMyProfile']))
{
    $fullName_admin = $_POST['fullName'];
    //updateTaxDetails
    $updateTaxDetails = mysqli_query($conn,"UPDATE office_admins SET admin_name='$fullName_admin'  WHERE admin_id='$admin_id_onSession'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';

    header('refresh:0');
}

if(isset($_POST['updateChangePassword']))
{
    $oldPasswordOnUpdate = mysqli_real_escape_string($conn, $_POST['oldPassword']);
    $newPasswordOnUpdate = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $newPasswordOneOnUpdate = mysqli_real_escape_string($conn, $_POST['newPasswordOne']);

    $firstLayerEncription = md5($oldPasswordOnUpdate);
    $secondLayerEncription = sha1($firstLayerEncription);

    //check oldpassword matched
    $checkUpdateOldPasswordMatched = mysqli_query($conn,"SELECT * FROM office_admins WHERE username='$username_onSession' AND password='$secondLayerEncription' AND isDeleted='0'");
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
        $updateNewPasswordInDb = mysqli_query($conn,"UPDATE office_admins SET password='$secondLayerEncriptionUpdateOne' WHERE username='$username_onSession'");

        echo '<script>alert("Password Update Success!, Refreshing...")</script>';
        header("Refresh:0");
    }
}

?>