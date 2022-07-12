<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['testId']))
{
    $testId = mysqli_real_escape_string($conn, $_GET['testId']);

    //find test id in attempts
    $getAttempptDetailsByTestId = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE test_session_id='$testId' AND isDeleted='0'");
    $cntONTest = mysqli_num_rows($getAttempptDetailsByTestId);

    if($cntONTest == 0)
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=./?msg=SomthingIssueWithServerSideCountWrongOnTestId");
    }
    else
    {
        while($row = mysqli_fetch_array($getAttempptDetailsByTestId))
        {
            $test_session_id = $row['test_session_id'];
            $ts_id = $row['ts_id'];
            $sc_id = $row['sc_id'];
            $student_id = $row['student_id'];
            $student_email = $row['student_email'];
            $total_qtns = $row['total_qtns'];
            $result = $row['result'];
            $start_date = $row['date'];
            $end_date = $row['last_updated'];

            //getAttempCount
            $getExamAttempCountHereNow = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND student_id='$student_id_session' AND status='1' AND isDeleted='0'");
            $cntOnExamAttempCountHereNow = mysqli_num_rows($getExamAttempCountHereNow);
            $cntOnExamAttempCountHereNow = $cntOnExamAttempCountHereNow;


            $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$ts_id' AND isDeleted='0'");
            $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

            $slNo = 1;
            while($row = mysqli_fetch_array($getListOfTestSeries))
            {
                $ts_id = $row['ts_id'];
                $course_id = $row['course_id'];
                $ts_name = $row['ts_name'];
                $ts_price = $row['ts_price'];
                $ts_type = $row['ts_type'];
                $ts_desc = $row['ts_desc'];
                $pass_mark = $row['pass_mark'];
                $status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];

                //check course details in db
                $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id'");
                while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                }
            }

            //check sceduleId
            $checkSceduleIdNow = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE sc_id='$sc_id' AND ts_id='$ts_id' AND isDeleted='0'");
            $getCntOfScedules = mysqli_num_rows($checkSceduleIdNow);

                while($row = mysqli_fetch_array($checkSceduleIdNow))
                {
                    $sc_id = $row['sc_id'];
                    $ts_id = $row['ts_id'];
                    $sc_test_name = $row['sc_test_name'];
                    $sc_test_type = $row['sc_test_type'];
                    $sc_test_date = $row['sc_test_date'];
                    $sc_pass_mark = $row['sc_pass_mark'];
                    $status = $row['status'];
                    $isDeleted = $row['isDeleted'];
                    $last_updated = $row['last_updated'];

                    //getNumberOfQuestionsNow 
                    $getNumberOfQuestionsNow = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0'");
                    $getNumberOfCountgetNumberOfQuestionsNow = mysqli_num_rows($getNumberOfQuestionsNow);

                    if($getNumberOfCountgetNumberOfQuestionsNow == 0)
                    {
                        $numberOfQuestions = 0;
                    }
                    else
                    {
                        $numberOfQuestions = $getNumberOfCountgetNumberOfQuestionsNow;
                    }
                }
    
        }
    }
}
else
{
    echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
    header("Refresh:0; url=./?msg=SomthingIssueWithServerSideMissingParams");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    
    <main id="main">

    <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
            <h4 style="font-size:20px"><span>Results :  </span><?php echo $ts_name; ?> </h4>
        </div>

        <div class="container mb-4">
            <div  data-spy="affix" data-offset-top="50">
                <p><b><?php echo $sc_test_name; ?></b> <b>&nbsp;|&nbsp;</b> No. Of Questions : <b><?php echo $numberOfQuestions; ?></b> <b>&nbsp;|&nbsp;</b> Test Attempt : <b><?php echo $cntOnExamAttempCountHereNow; ?></b> / 3 <b>&nbsp;|&nbsp;</b> Date : <b><?php echo date('d-m-Y',strtotime($sc_test_date)); ?> (<?php echo date('l',strtotime($sc_test_date)); ?>)</b></p>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-lg-6 p-3 border">
                        <div class="mt-2 mb-4">
                            <b>Total No. Of Questions :</b> <u>&nbsp;&nbsp;<b class="text-black" style="font-size:19px"><?php echo $total_qtns; ?></b>&nbsp;&nbsp;</u>
                        </div>
                        <div class="mt-2 mb-4">
                            <b>Correct Answered :</b> <u>&nbsp;&nbsp;<b class="text-success" style="font-size:19px"><?php echo $result; ?></b>&nbsp;&nbsp;</u>
                        </div>
                        <div class="mt-2 mb-4">
                            <b>Wrong / Not Answered :</b> <u>&nbsp;&nbsp;<b class="text-danger" style="font-size:19px"><?php echo $total_qtns-$result; ?></b>&nbsp;&nbsp;</u>
                        </div>
                        <a href="test-series" class="btn btn-primary newButtonEffect"> Retake Test Again! </a>
                    </div>
                    <div class="col-md-6 col-lg-6 p-3 border my-auto">
                        <div class="text-center my-auto">
                            <h4><b>Your Score : <b class="text-success" style="font-size:26px"><?php echo $result; ?></b></b></h4>
                            <hr>
                            <a target="_blank" href="test-series-liveScoreAnswerKeyView?examSessionId=<?php echo $test_session_id; ?>" class="btn btn-primary newButtonEffect">View/Download Live Score Answer Key</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>