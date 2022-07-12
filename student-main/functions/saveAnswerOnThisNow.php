<?php include('../../config.php'); ?>
<?php include('verify-session.php'); ?>
<?php

$countAnswersIs = 0;
$countWrongAnswers = 0;

if(isset($_GET['q']) && isset($_GET['ans']))
{
    $qtnAnswered = mysqli_real_escape_string($conn, $_GET['q']);
    $answerOnQtn = mysqli_real_escape_string($conn, $_GET['ans']);
    $qtnExamIdHere = mysqli_real_escape_string($conn, $_GET['eid']);

    $examSessionIdIs = $_SESSION['examSessionIdIs'];

    //validate answers
    if($answerOnQtn == 'A' || $answerOnQtn == 'B' || $answerOnQtn == 'C' || $answerOnQtn == 'D')
    {
        //validate questions
        $validateQuestions = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE qtn_id='$qtnAnswered' AND sc_id='$qtnExamIdHere' AND isDeleted='0'");
        $getValidQuestionIs = mysqli_num_rows($validateQuestions);

        if($getValidQuestionIs == 0)
        {
            echo 'errorOnQuestion';
        }
        else
        {
            //MakeSessionOnThisQuestion
            while($row = mysqli_fetch_array($validateQuestions))
            {
                $thisAnswerIsToValidate = $row['qtn_ans'];
            }

            date_default_timezone_set('Asia/Kolkata');
            $today = date('d-m-Y');

            //validateAnswerNow
            if($thisAnswerIsToValidate == $answerOnQtn)
            {
                $valid_id = rand(100000000,999999999);
                $whatAnserIs = 1;

                //check before insert
                $checkBeforeInsertHere = mysqli_query($conn,"SELECT * FROM test_series_ans_validate WHERE test_session_id='$examSessionIdIs' AND student_id='$student_id_session' AND qtn_id='$qtnAnswered' AND sc_id='$qtnExamIdHere' AND status='0'");
                $getValidationCountOnAnswered = mysqli_num_rows($checkBeforeInsertHere);

                if($getValidationCountOnAnswered == 0)
                {
                    //insert Validate Ansewers
                    $insertValidNaswersToDbNow = mysqli_query($conn,"INSERT INTO test_series_ans_validate(test_session_id,valid_id, student_id, qtn_id, ans_is, sc_id, valid, date, status)
                    VALUES('$examSessionIdIs','$valid_id','$student_id_session','$qtnAnswered','$answerOnQtn','$qtnExamIdHere','$whatAnserIs','$today','0')");
                }
                else
                {
                    //update existing one
                    $updateAlreadynsertedDataNow = mysqli_query($conn,"UPDATE test_series_ans_validate SET ans_is='$answerOnQtn', valid='$whatAnserIs', date='$today' WHERE student_id='$student_id_session' AND qtn_id='$qtnAnswered' AND sc_id='$qtnExamIdHere' AND status='0'");
                }

            }
            else
            {
                $valid_id = rand(100000000,999999999);
                $whatAnserIs = 0;

                //check before insert
                $checkBeforeInsertHere = mysqli_query($conn,"SELECT * FROM test_series_ans_validate WHERE test_session_id='$examSessionIdIs' AND student_id='$student_id_session' AND qtn_id='$qtnAnswered' AND sc_id='$qtnExamIdHere' AND status='0'");
                $getValidationCountOnAnswered = mysqli_num_rows($checkBeforeInsertHere);

                if($getValidationCountOnAnswered == 0)
                {
                    //insert Validate Ansewers
                    $insertValidNaswersToDbNow = mysqli_query($conn,"INSERT INTO test_series_ans_validate(test_session_id, valid_id, student_id, qtn_id, ans_is, sc_id, valid, date, status)
                    VALUES('$examSessionIdIs','$valid_id','$student_id_session','$qtnAnswered','$answerOnQtn','$qtnExamIdHere','$whatAnserIs','$today','0')");
                }
                else
                {
                    //update existing one
                    $updateAlreadynsertedDataNow = mysqli_query($conn,"UPDATE test_series_ans_validate SET ans_is='$answerOnQtn', valid='$whatAnserIs', date='$today' WHERE student_id='$student_id_session' AND qtn_id='$qtnAnswered' AND sc_id='$qtnExamIdHere' AND status='0'");                    
                }
            }

        }

        echo 'valid';
    }
    else
    {
        echo 'errorOnAnswer';
    }
}
else
{
    echo 'errorOnParams';
}
?>