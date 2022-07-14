<?php

include('../config.php');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && isset($_POST['mobile']))
{

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);

    $ticketId = rand(100000,999999);

    //sendemail
    $emailBody = '
    <div style="padding:12px;border:1px solid #E61F26;border-radius:10px;font-family: Arial, Helvetica, sans-serif;">
    <center>
        <img src="'.$baseURL.'assets/new-img/Pragma-Education-Web.png" width="170" height="60">
        <hr>
        <div style="width:85%;text-align:left;padding:12px">
        Hello Team,
        <br><br>
        New Web Contact Received <b>#'.$ticketId.'</b>.
        <br><br>
        <hr>
        <br>
        <b>Name :</b> '.$name.' <br><br>
        <b>Email :</b> '.$email.'<br><br>
        <b>Mobile :</b> '.$mobile.'<br><br>
        <b>Subject : </b> '.$subject.' <br><br>
        <b>Message : </b> '.$message.'
        <br><br>
        <hr>
        <br>
        Note: This is an auto-generated mail. Please do not reply to this mail.
        </div>
    </center>
    </div>
    ';

    $to = "ganeshbondla@gmail.com";
   // $to = $emailSendFromName;
    $subject = "Web Contact #".$ticketId." - ".$subject."";
            
    $header = "From:".$emailSendFromName." <".$name."> \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";
        
    $retval = mail ($to,$subject,$emailBody,$header);

    if(!$retval)
    {
      echo '0';
    }
    else
    {
      echo '1';
    }

}
else
{
  echo '0';
}
?>
