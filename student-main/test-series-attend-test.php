<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['tsId']) && isset($_GET['enId']))
{
    $ts_id = mysqli_real_escape_string($conn, $_GET['tsId']);
    $ts_enrollId = mysqli_real_escape_string($conn, $_GET['enId']);
    $sc_id = mysqli_real_escape_string($conn, $_GET['scId']);

    //examSessionIdIs
    if(isset($_SESSION['examSessionIdIs']))
    {
        $examSessionIdIs = $_SESSION['examSessionIdIs'];
    }
    else
    {
        $_SESSION['examSessionIdIs'] = "".rand(100000000000,999999999999)."".date('dmY')."";
        $examSessionIdIs = $_SESSION['examSessionIdIs'];
    }

    //check sceduleId
    $checkSceduleIdNow = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE sc_id='$sc_id' AND ts_id='$ts_id' AND isDeleted='0'");
    $getCntOfScedules = mysqli_num_rows($checkSceduleIdNow);

    if($getCntOfScedules == 0)
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=./?msg=SomthingIssueWithServerSideSceduleIdWrong");
    }
    else
    {
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


            //getAttempCount
            $getExamAttempCountHereNow = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND student_id='$student_id_session' AND status='1' AND isDeleted='0'");
            $cntOnExamAttempCountHereNow = mysqli_num_rows($getExamAttempCountHereNow);
            if($cntOnExamAttempCountHereNow >= 3)
            {
                echo '<script>alert("Attempts Completed!")</script>';
                header("Refresh:0; url=test-series-enroll-access?tsId=".$ts_id."&enId=".$ts_enrollId."&msg=TestAttemptsCompleted");
            }
            else
            {
                $cntOnExamAttempCountHereNow = $cntOnExamAttempCountHereNow + 1;
            }

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

    date_default_timezone_set('Asia/Kolkata');
    $today = date('d-m-Y');

    //insertdataOnAttends
    $sqlForInsertDataInAttends = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE test_session_id='$examSessionIdIs' AND ts_id='$ts_id' AND sc_id='$sc_id' AND student_id='$student_id_session' AND isDeleted='0'");
    $takeCountOnThisResults = mysqli_num_rows($sqlForInsertDataInAttends);

    // echo '<script>alert("'.mysqli_error($conn).'")</script>';

    if($takeCountOnThisResults == 0)
    {
        $insertNowFromHere = mysqli_query($conn,"INSERT INTO test_series_attends(test_session_id,ts_id, sc_id, student_id, student_email, total_qtns, result, status, isDeleted, date, start_time, last_updated)
        VALUES('$examSessionIdIs','$ts_id','$sc_id','$student_id_session','$student_email_session','$numberOfQuestions','0','0','0','$today','$lastUpdated','$lastUpdated')");
    }
    else
    {
        //get old results
    }
    
    //check enrollment
    $checkENrollmentNowTs = mysqli_query($conn,"SELECT * FROM test_series_assigned WHERE ts_assigned_id='$ts_enrollId' AND ts_id='$ts_id' AND isDeleted='0'");
    $getCountOnEnrollmentOfTs = mysqli_num_rows($checkENrollmentNowTs);

    if($getCountOnEnrollmentOfTs == 0)
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=./?msg=SomthingIssueWithServerSideEnrollmentWrong");
    }
    else
    {
        while($row = mysqli_fetch_array($checkENrollmentNowTs))
        {
            $ts_assigned_id = $row['ts_assigned_id'];
            $ts_id = $row['ts_id'];
            $course_id = $row['course_id'];
            $student_id = $row['student_id'];
            $student_email = $row['student_email'];
            $last_updated = $row['last_updated'];

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
            <h4 style="font-size:20px"><span><?php echo $ts_name; ?> </span> (<?php echo $course_name; ?>) </h4>
        </div>

        <div class="container mb-4">
            <div  data-spy="affix" data-offset-top="50">
                <p><b><?php echo $sc_test_name; ?></b> <b>&nbsp;|&nbsp;</b> No. Of Questions : <b><?php echo $numberOfQuestions; ?></b> <b>&nbsp;|&nbsp;</b> Test Attempt : <b><?php echo $cntOnExamAttempCountHereNow; ?></b> / 3 <b>&nbsp;|&nbsp;</b> Date : <b><?php echo date('d-m-Y',strtotime($sc_test_date)); ?> (<?php echo date('l',strtotime($sc_test_date)); ?>)</b></p>
                <hr>
            </div>
            
            <div class="row">
                <div class="col-md-9 col-lg-9">
                    <div class="p-4 border " style="overflow:scroll; height:500px;">
                    <form>
            <?php

                //getAllQuestionsDisplay
                $getAllQuestionsDisplayNow = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0' ORDER BY qtn_no ASC");
                $getCountOfAllQuestionsFromListNOw = mysqli_num_rows($getAllQuestionsDisplayNow);

                if($getCountOfAllQuestionsFromListNOw == 0)
                {
                    //no Questions
                }
                else
                {
                    $qtn_no_Onshow = 1;
                    while($row = mysqli_fetch_array($getAllQuestionsDisplayNow))
                    {
                        $ts_id_qtn = $row['ts_id'];
                        $sc_id_qtn = $row['sc_id'];
                        $ts_type_qtn = $row['ts_type'];
                        $qtn_no_qtn = $row['qtn_no'];
                        $qtn_id_qtn = $row['qtn_id'];
                        $choice_one_qtn = $row['choice_one'];
                        $choice_two_qtn = $row['choice_two'];
                        $choice_three_qtn = $row['choice_three'];
                        $choice_four_qtn = $row['choice_four'];
                        $qtn_qtn = $row['qtn'];
                        $qtn_ans_qtn = $row['qtn_ans'];
                        $status_qtn = $row['status'];
                        $isDeleted_qtn = $row['isDeleted'];
                        $date_qtn = $row['date'];

                        echo '

                        <div class="mb-2">
                            <b style="font-size:16px">'.$qtn_no_Onshow++.' . '.$qtn_qtn.'</b>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input js-check-now" type="radio" name="'.$qtn_id_qtn.'_name" id="'.$qtn_id_qtn.'_qtn" value="A" data-qtn="'.$qtn_id_qtn.'" onclick="makeThisAnswerNow(this.value)">
                            <label class="form-check-label" for="'.$qtn_id_qtn.'_qtn">
                                '.$choice_one_qtn.'
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input js-check-now" type="radio" name="'.$qtn_id_qtn.'_name" id="'.$qtn_id_qtn.'_qtn" value="B" data-qtn="'.$qtn_id_qtn.'"  onclick="makeThisAnswerNow(this.value)">
                            <label class="form-check-label" for="'.$qtn_id_qtn.'_qtn">
                                '.$choice_two_qtn.'
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input js-check-now" type="radio" name="'.$qtn_id_qtn.'_name" id="'.$qtn_id_qtn.'_qtn" value="C" data-qtn="'.$qtn_id_qtn.'" onclick="makeThisAnswerNow(this.value)">
                            <label class="form-check-label" for="'.$qtn_id_qtn.'_qtn">
                                '.$choice_three_qtn.'
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input js-check-now" type="radio" name="'.$qtn_id_qtn.'_name" id="'.$qtn_id_qtn.'_qtn" value="D" data-qtn="'.$qtn_id_qtn.'" onclick="makeThisAnswerNow(this.value)">
                            <label class="form-check-label" for="'.$qtn_id_qtn.'_qtn">
                                '.$choice_four_qtn.'
                            </label>
                        </div>
                        <hr>
                        
                        ';
                    }
                }
            ?>

                    </form>
                </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="p-4 border text-center">
                        <div class="row d-flex justify-content-center">
                            <?php

                            //getnumberofquestionhere
                            $getNumberCountOnQuestionsFroClarity = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0' ORDER BY qtn_no ASC");
                            $getCountOfAllQuestionsFromListNOwClarity = mysqli_num_rows($getNumberCountOnQuestionsFroClarity);

                            if($getCountOfAllQuestionsFromListNOwClarity == 0)
                            {
                                echo 'NA';
                            }
                            else
                            {
                                $makeSerialNumber = 1;
                                while($row = mysqli_fetch_array($getNumberCountOnQuestionsFroClarity))
                                {
                                    $ts_id_qtn = $row['ts_id'];
                                    $sc_id_qtn = $row['sc_id'];
                                    $ts_type_qtn = $row['ts_type'];
                                    $qtn_no_qtn = $row['qtn_no'];
                                    $qtn_id_qtn = $row['qtn_id'];
                                    $choice_one_qtn = $row['choice_one'];
                                    $choice_two_qtn = $row['choice_two'];
                                    $choice_three_qtn = $row['choice_three'];
                                    $choice_four_qtn = $row['choice_four'];
                                    $qtn_qtn = $row['qtn'];
                                    $qtn_ans_qtn = $row['qtn_ans'];
                                    $status_qtn = $row['status'];
                                    $isDeleted_qtn = $row['isDeleted'];
                                    $date_qtn = $row['date'];

                                    echo '
                                    <div class="col-3 mb-4">
                                    <g class="shadow" id="s_'.$qtn_id_qtn.'" style="border-radius:5px;border:2px solid #E31E26;padding:8px">'.$makeSerialNumber++.'</g>
                                    </div>
                                    ';
                                }
                            }

                            ?>
                            <hr>
                        </div>
                        <form action="test-final-results?ts_id=<?php echo $ts_id_qtn; ?>&sc_id=<?php echo $sc_id_qtn; ?>" method="POST">
                            <button type="submit" name="submitTheTestNow" class="btn btn-primary newButtonEffect">Submit Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
        
        $(document).ready(function(){
            $(".js-check-now").on("click", function () {
                var button = $(this);
                var qtn_ID = button.attr("data-qtn");
                var Ans = button.attr("value");
                var ed = '<?php echo $sc_id_qtn; ?>';

                $('#s_'+qtn_ID).css({'background-color':'#E31E26', 'color':'white', 'font-weight': 'bold'})

                $.ajax({
                url: "functions/saveAnswerOnThisNow",
                method: "GET",
                data: { q:qtn_ID, ans:Ans, eid:ed },
                dataType: "json",
                success: function (data) {
                    if (data == "error") {
                        alert("Bad Request!, Something went wrong try again!");
                        console.log(data); 
                    } else {
                        console.log(data); 
                    }
                },
                });
            });
        });
    </script>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>