<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

    if(isset($_SESSION['examSessionIdIs']))
    {
        $examSessionIdIs = mysqli_real_escape_string($conn, $_SESSION['examSessionIdIs']);
        //check before insert
        $checkBeforeInsertHere = mysqli_query($conn,"SELECT * FROM test_series_ans_validate WHERE student_id='$student_id_session' AND test_session_id='$examSessionIdIs' AND status='0'");
        $getValidationCountOnAnswered = mysqli_num_rows($checkBeforeInsertHere);

       // echo '<script>alert('.mysqli_error($conn).')</script>';

        if($getValidationCountOnAnswered == 0)
        {

            unset($_SESSION['examSessionIdIs']);
            
            echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
            header("Refresh:0; url=./?msg=SomthingIssueWithServerSideInvalidResultsSubmit");
        }
        else
        {
            $getCntOfResultsHereNow = mysqli_query($conn,"SELECT * FROM test_series_ans_validate WHERE student_id='$student_id_session' AND test_session_id='$examSessionIdIs' AND status='0' AND valid='1'");
            $finalResultsCountHere = mysqli_num_rows($getCntOfResultsHereNow);

            //Update In Results
            $updateResultNowInAttendDb = mysqli_query($conn,"UPDATE test_series_attends SET result='$finalResultsCountHere', status='1', last_updated='$lastUpdated' WHERE test_session_id='$examSessionIdIs'");

           // $deleteResultNowInAttendDb = mysqli_query($conn,"DELETE FROM test_series_ans_validate WHERE test_session_id='$examSessionIdIs'");

            unset($_SESSION['examSessionIdIs']);

            header('location:test-series-results?attempt=success&session=expired&testId='.$examSessionIdIs.'');
        }
    }
    else
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=./?msg=SomthingIssueWithServerSideInvalidSession");
    }

?>
<? ob_flush(); ?>