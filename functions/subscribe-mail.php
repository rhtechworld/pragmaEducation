<?php

include('../config.php');

if(isset($_GET['email']))
{
    $subScribeMail = mysqli_real_escape_string($conn, $_GET['email']);
    $subId = "SB".rand(100000,999999)."";

    $lastUpdated = date('d-m-Y, h:i A');
    //check subscription

    //check in db
    $checkInDBBeforeAdd = mysqli_query($conn,"SELECT * FROM mail_subscribers WHERE email='$subScribeMail' AND status='0'");
    $checkCnt = mysqli_num_rows($checkInDBBeforeAdd);

    if($checkCnt == 0)
    {
        $checkSubScription = mysqli_query($conn,"INSERT INTO mail_subscribers(sub_is, email, status, date)
            VALUES('$subId','$subScribeMail','0','$lastUpdated')");
            echo '1';
    }
    else
    {
        echo '2';
    }
    
}
else
{
    echo '0';
}

?>