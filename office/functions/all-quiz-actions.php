<?php

if(isset($_POST['createNewQuizType']))
{
    $quiz_type = mysqli_real_escape_string($conn, $_POST['quiz_type']);
    $inputqz_name = mysqli_real_escape_string($conn, $_POST['inputqz_name']);

    if($quiz_type == 'guest')
    {
        $qzIdForNow = "QZ".rand(100000000000,999999999999)."";

        $_SESSION['quizTypeNow'] = $quiz_type;
        $_SESSION['quizIdNow'] = $qzIdForNow;
        $_SESSION['qtnNoForNow'] = 1;
        $_SESSION['inputqz_name'] = $inputqz_name;

        //normal quiz
        header('location:create-new-quiz');
    }
    else if($quiz_type == 'topic')
    {

    }
    else
    {

    }
}

if(isset($_POST['addNewQuestionNow']))
{
    $qtnInput = mysqli_real_escape_string($conn,$_POST['qtnInput']);
    $optionOneInput = mysqli_real_escape_string($conn, $_POST['optionOneInput']);
    $optionTwoInput = mysqli_real_escape_string($conn, $_POST['optionTwoInput']);
    $optionThreeInput = mysqli_real_escape_string($conn, $_POST['optionThreeInput']);
    $optionFourInput = mysqli_real_escape_string($conn, $_POST['optionFourInput']);
    $thisAnswerInput = mysqli_real_escape_string($conn, $_POST['thisAnswerInput']);

    $inputOfQuizType = mysqli_real_escape_string($conn, $_POST['inputOfQuizType']);
    $inputOfQuizId = mysqli_real_escape_string($conn, $_POST['inputOfQuizId']);
    $inputOfQtnId = "QN".rand(100000000000,999999999999)."";
    $inputqz_name = mysqli_real_escape_string($conn, $_POST['inputqz_name']);
    $inputOfQtnNo = mysqli_real_escape_string($conn, $_POST['inputOfQtnNo']);

    //check same question
    $checkSameQuestionHere = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qtn='$qtnInput' AND qz_id='$inputOfQuizId' AND isDeleted='0'");
    $makeACountOnQtns = mysqli_num_rows($checkSameQuestionHere);

    //insert into quiz controles

    //check before insert
    $checkQuizIdInCOntroles = mysqli_query($conn,"SELECT * FROM quiz_controls WHERE qz_id='$inputOfQuizId' AND isDeleted='0'");
    $getCntcheckQuizIdInCOntroles = mysqli_num_rows($checkQuizIdInCOntroles);

    if($getCntcheckQuizIdInCOntroles == 0)
    {
        $insertThingsIntoContriles = mysqli_query($conn,"INSERT INTO quiz_controls(	qz_name, qz_type, qz_id, pass_mark, status, isDeleted, last_updated)
        VALUES('$inputqz_name','$inputOfQuizType','$inputOfQuizId','0','0','0','$lastUpdated')");
    }
    else
    {
        //do nothing
    }

    if($makeACountOnQtns == 0)
    {
        //insert question 
        $insertIntoDatabase = mysqli_query($conn,"INSERT INTO quiz_manage(qz_id, qz_type, qtn_no, qtn_id, qtn, choice_one, choice_two, choice_three, choice_four, qtn_ans, status, date, isDeleted)
        VALUES('$inputOfQuizId','$inputOfQuizType','$inputOfQtnNo','$inputOfQtnId','$qtnInput','$optionOneInput','$optionTwoInput','$optionThreeInput','$optionFourInput','$thisAnswerInput','0','$lastUpdated','0')");

        echo '<script>alert("'.$inputOfQtnNo.' Added Success, Moving to Next ( '.++$inputOfQtnNo.' ) Question")</script>';
        header('refresh:0;url=create-new-quiz');
    }
    else
    {
        echo '<script>alert("Same Question Added Before, Try with New!")</script>';
        header('refresh:0;url=create-new-quiz');
    }

}

if(isset($_POST['finalizeTheQuizNow']))
{
    $inputPassmarkOnQuiz = mysqli_real_escape_string($conn, $_POST['inputPassmarkOnQuiz']);
    $quizStatusInput = mysqli_real_escape_string($conn, $_POST['quizStatusInput']);
    $thisIsRunningId = $_SESSION['quizIdNow'];

    //updateThisThings
    $updateThisThingsNow = mysqli_query($conn,"UPDATE quiz_controls SET pass_mark='$inputPassmarkOnQuiz', status='$quizStatusInput' WHERE qz_id='$thisIsRunningId'");

    //unset all quiz sessions
    
    unset($_SESSION['quizTypeNow']);
    unset($_SESSION['quizIdNow']);
    unset($_SESSION['qtnNoForNow']);
    unset($_SESSION['inputqz_name']);

    echo '<script>alert("Quiz Finalized Success, Clearing Sessions...")</script>';
    header('refresh:0;url=quiz-list');

}

if(isset($_POST['makeChangesOnQuizControl']))
{
    $quizKaId = mysqli_real_escape_string($conn, $_POST['quizKaId']);
    $quizKastatus = mysqli_real_escape_string($conn, $_POST['quizKastatus']);

    //update status
    $updateStatusNowQuiz = mysqli_query($conn,"UPDATE quiz_controls SET status='$quizKastatus', last_updated='$lastUpdated' WHERE qz_id='$quizKaId'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';
    header('refresh:0;url=quiz-list'); 
}

if(isset($_POST['deleteTheQuizControl']))
{
    $delete_quizKaId = mysqli_real_escape_string($conn, $_POST['delete_quizKaId']);

    //update status
    $updateStatusNowQuiz = mysqli_query($conn,"UPDATE quiz_controls SET isDeleted='1', last_updated='$lastUpdated' WHERE qz_id='$delete_quizKaId'");

    echo '<script>alert("Deleted Success, Refreshing...")</script>';
    header('refresh:0;url=quiz-list');
}

if(isset($_POST['updateQuestionNow']))
{
    $qtnInput = mysqli_real_escape_string($conn,$_POST['qtnInput']);
    $optionOneInput = mysqli_real_escape_string($conn, $_POST['optionOneInput']);
    $optionTwoInput = mysqli_real_escape_string($conn, $_POST['optionTwoInput']);
    $optionThreeInput = mysqli_real_escape_string($conn, $_POST['optionThreeInput']);
    $optionFourInput = mysqli_real_escape_string($conn, $_POST['optionFourInput']);
    $thisAnswerInput = mysqli_real_escape_string($conn, $_POST['thisAnswerInput']);
    $qtnquizStatusInput = mysqli_real_escape_string($conn, $_POST['quizStatusInput']);
    $inputOfQtnId = mysqli_real_escape_string($conn, $_POST['inputOfQtnId']);

    //update in database
    $updateDataInDatabase = mysqli_query($conn,"UPDATE quiz_manage SET qtn='$qtnInput',
    choice_one = '$optionOneInput',
    choice_two = '$optionTwoInput',
    choice_three = '$optionThreeInput',
    choice_four = '$optionFourInput',
    qtn_ans = '$thisAnswerInput',
    status='$qtnquizStatusInput', date='$lastUpdated' WHERE qtn_id='$inputOfQtnId'");

    if(!$updateDataInDatabase)
    {
        $er = mysqli_error($conn);
        echo '<script>alert("'.$er.'")</script>';
    }
    else
    {
        echo '<script>alert("Updated Success, Refreshing...")</script>';
        header('refresh:0;url=view-all-quiz-questions?qzid='.$qz_id.'');
    }
    
}

if(isset($_POST['deleteQuestionNow']))
{
    $qtnInput = mysqli_real_escape_string($conn,$_POST['qtnInput']);
    $optionOneInput = mysqli_real_escape_string($conn, $_POST['optionOneInput']);
    $optionTwoInput = mysqli_real_escape_string($conn, $_POST['optionTwoInput']);
    $optionThreeInput = mysqli_real_escape_string($conn, $_POST['optionThreeInput']);
    $optionFourInput = mysqli_real_escape_string($conn, $_POST['optionFourInput']);
    $thisAnswerInput = mysqli_real_escape_string($conn, $_POST['thisAnswerInput']);
    $qtnquizStatusInput = mysqli_real_escape_string($conn, $_POST['quizStatusInput']);
    $inputOfQtnId = mysqli_real_escape_string($conn, $_POST['inputOfQtnId']);

    //update in database
    $updateDataInDatabase = mysqli_query($conn,"UPDATE quiz_manage SET isDeleted='1', date='$lastUpdated' WHERE qtn_id='$inputOfQtnId'");

    echo '<script>alert("Deleted Success, Refreshing...")</script>';
    header('refresh:0;url=view-all-quiz-questions?qzid='.$qz_id.'');
}

if(isset($_POST['addNewQuestionNowViaAccess']))
{
    $qtnInput = mysqli_real_escape_string($conn,$_POST['qtnInput']);
    $optionOneInput = mysqli_real_escape_string($conn, $_POST['optionOneInput']);
    $optionTwoInput = mysqli_real_escape_string($conn, $_POST['optionTwoInput']);
    $optionThreeInput = mysqli_real_escape_string($conn, $_POST['optionThreeInput']);
    $optionFourInput = mysqli_real_escape_string($conn, $_POST['optionFourInput']);
    $thisAnswerInput = mysqli_real_escape_string($conn, $_POST['thisAnswerInput']);
    $qtnquizStatusInput = mysqli_real_escape_string($conn, $_POST['quizStatusInput']);
    $inputOfQtnId = "QN".rand(100000000000,999999999999)."";
    $inputOfQuizType = mysqli_real_escape_string($conn, $_POST['inputOfQuizType']);
    $inputOfQuizId = mysqli_real_escape_string($conn, $_POST['inputOfQuizId']);
    $inputOfQtnNo = mysqli_real_escape_string($conn, $_POST['inputOfQtnNo']);

    $insertIntoDatabase = mysqli_query($conn,"INSERT INTO quiz_manage(qz_id, qz_type, qtn_no, qtn_id, qtn, choice_one, choice_two, choice_three, choice_four, qtn_ans, status, date, isDeleted)
    VALUES('$inputOfQuizId','$inputOfQuizType','$inputOfQtnNo','$inputOfQtnId','$qtnInput','$optionOneInput','$optionTwoInput','$optionThreeInput','$optionFourInput','$thisAnswerInput','$qtnquizStatusInput','$lastUpdated','0')");

    echo '<script>alert("Question : '.$inputOfQtnNo.' Added Success, Moving to Questions List...")</script>';
    header('refresh:0;url=view-all-quiz-questions?qzid='.$inputOfQuizId.'');
}

?>