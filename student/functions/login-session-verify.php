<?php include('../../config.php'); ?>
<?php include('../functions/verify-session.php'); ?>
<?php

if(isset($_POST['currentSession']))
{
    $currentSessionIs = mysqli_real_escape_string($conn, $_POST['currentSession']);

    //check session and student
    $checkSessionAndStudentNow = mysqli_query($conn,"SELECT * FROM student_access WHERE session_key='$currentSessionIs' AND student_id='$student_id_session' AND isDeleted='0'");
    $countSessionAndStudentNow = mysqli_num_rows($checkSessionAndStudentNow);

    if($countSessionAndStudentNow == 0)
    {
        echo '1';
    }
    else
    {
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
        
        echo '0';
    }
}
else
{
    echo 'Nothing';
    header('location:/');
}

?>