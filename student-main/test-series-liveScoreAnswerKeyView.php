<?php

ob_start();
require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$dompdf = new Dompdf();
?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['examSessionId']))
{
    $testId = mysqli_real_escape_string($conn, $_GET['examSessionId']);

    //find test id in attempts
    $getAttempptDetailsByTestId = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE test_session_id='$testId' AND isDeleted='0'");
    $cntONTest = mysqli_num_rows($getAttempptDetailsByTestId);

    if($cntONTest == 0)
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=./?msg=SomthingIssueWithServerSideCountWrongOnSessionId");
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
            $start_date_time = $row['start_time'];
            $end_date_time = $row['last_updated'];

            //getAttempCount
            $getExamAttempCountHereNow = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND student_id='$student_id_session' AND status='1' AND isDeleted='0'");
            $cntOnExamAttempCountHereNow = mysqli_num_rows($getExamAttempCountHereNow);
            $cntOnExamAttempCountHereNow = $cntOnExamAttempCountHereNow;


            $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$ts_id'");
            $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

            $slNo = 1;
            while($row = mysqli_fetch_array($getListOfTestSeries))
            {
                $ts_id_test_manage = $row['ts_id'];
                $course_id_test_manage = $row['course_id'];
                $ts_name_test_manage = $row['ts_name'];
                $ts_price_test_manage = $row['ts_price'];
                $ts_type_test_manage = $row['ts_type'];
                $ts_desc_test_manage = $row['ts_desc'];
                $pass_mark_test_manage = $row['pass_mark'];
                $status_test_manage = $row['status'];
                $isDeleted_test_manage = $row['isDeleted'];
                $last_updated_test_manage = $row['last_updated'];

                //check course details in db
                $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_test_manage'");
                while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                {
                    $course_id_test_manage = $row['course_id'];
                    $course_name_test_manage = $row['course_name'];
                }
            }

            //check sceduleId
            $checkSceduleIdNow = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE sc_id='$sc_id' AND ts_id='$ts_id' AND isDeleted='0'");
            $getCntOfScedules = mysqli_num_rows($checkSceduleIdNow);

                while($row = mysqli_fetch_array($checkSceduleIdNow))
                {
                    $sc_id_scedule = $row['sc_id'];
                    $ts_id_scedule = $row['ts_id'];
                    $sc_test_name_scedule = $row['sc_test_name'];
                    $sc_test_type_scedule = $row['sc_test_type'];
                    $sc_test_date_scedule = $row['sc_test_date'];
                    $sc_pass_mark_scedule = $row['sc_pass_mark'];
                    $status_scedule = $row['status'];
                    $isDeleted_scedule = $row['isDeleted'];
                    $last_updated_scedule = $row['last_updated'];

                    //getNumberOfQuestionsNow 
                    $getNumberOfQuestionsNow = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id_scedule' AND sc_id='$sc_id_scedule' AND isDeleted='0'");
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

                //check student id in db
                $checkStudentIdInDbNow = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$student_id_session'");
                $checkCountOnStudentIdInDbNow = mysqli_num_rows($checkStudentIdInDbNow);

                while($row = mysqli_fetch_array($checkStudentIdInDbNow))
                {
                    $student_id_student = $row['student_id'];
                    $student_name_student = $row['student_name'];
                    $student_email_student = $row['student_email'];
                    $student_number_student = $row['student_number'];
                    $date_student = $row['date'];
                    $status_student = $row['status'];
                    $isDeleted_student = $row['isDeleted'];
                    $last_updated_student = $row['last_updated'];
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
  <title>Live Exam Score : <?php echo $sc_id_scedule; ?> ( <?php echo $sc_test_name_scedule; ?> )</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="p-1">
    <div class="row">
        <table class="table table-borderless text-center">
            <tbody>
            <tr>
                <td><img class="img-fluid" src="<?php echo "".$baseURL."assets/new-img/Pragma-Education-Web.png"; ?>" height="150" width="150"></td>
                <td>Reg. Uppal,<br> Hyderabad, Telangana, India</td>
            </tr>
            </tbody>
        </table>
        <hr>
    <table class="table table-borderless text-center">
        <tbody>
        <tr>
            <td><b><?php echo $sc_test_name_scedule; ?></b></td>
            <td>No. Of Questions : <b><?php echo $numberOfQuestions; ?></b></td>
            <td>Test Attempt : <b><?php echo $cntOnExamAttempCountHereNow; ?></b> / 3</td>
        </tr>
        <tr>
            <td>Date : <br><b><?php echo date('d-m-Y',strtotime($sc_test_date_scedule)); ?> (<?php echo date('l',strtotime($sc_test_date_scedule)); ?>)</td>
            <td>Start Time : <br><b><?php echo $start_date_time; ?></td>
            <td>End Time : <br><b><?php echo $end_date_time; ?></b></td>
        </tr>
        <tr>
            <td>Student Id : <br><b>#<?php echo $student_id_student; ?></b></td>
            <td>Student Name : <br><b><?php echo  $student_name_student ; ?></b></td>
            <td>Test Id : <br>#<b><?php echo  $test_session_id ; ?></b></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-borderless text-center">
        <tbody>
        <tr>
            <td><h5><b>Total Scored : <?php echo $result; ?></b></h5></td>
            <td>Indications : <b style="color:green">Correct Answer ( <i class="fa fa-check" style="font-size:10px;margin: 0;"></i> )</b> , 
                <b style="color:red">Wrong Answer Choosen ( <i class="fa fa-close" style="font-size:10px;margin: 0;"></i> )</b></td>
        </tr>
        </tbody>
    </table>
        <div class="pl-5 p-2 pt-3 border my-auto">
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

                    //getStudentResultToHere
                    $getStudentResultToHere = mysqli_query($conn,"SELECT * FROM test_series_ans_validate WHERE 	test_session_id='$testId' AND sc_id='$sc_id_qtn' AND qtn_id='$qtn_id_qtn'");
                    while($row = mysqli_fetch_array($getStudentResultToHere))
                    {
                        $db_result_ans_is = $row['ans_is'];
                        $db_result_valid = $row['valid'];
                    }

                    if($qtn_ans_qtn == 'A')
                    {
                        $addThisCssNowA = 'color:green;font-weight:bold';
                        $addResultAnswerCssA = '';
                        $addIconForCLarityA = '<i class="fa fa-check" style="font-size:10px;margin: 0;"></i>';
                    }
                    else
                    {
                        $addThisCssNowA = '';
                        if($db_result_ans_is == 'A')
                        {
                            $addResultAnswerCssA = 'color:red;font-weight:bold;';
                            $addIconForCLarityA = '<i class="fa fa-close" style="font-size:10px;margin: 0;"></i>';
                        }
                        else
                        {
                            $addResultAnswerCssA = '';
                            $addIconForCLarityA = '<i class="fa fa-circle-thin" style="font-size:10px;margin: 0;"></i>';
                        }
                    }

                    if($qtn_ans_qtn == 'B')
                    {
                        $addThisCssNowB = 'color:green;font-weight:bold';
                        $addResultAnswerCssB = '';
                        $addIconForCLarityB = '<i class="fa fa-check" style="font-size:10px;margin: 0;"></i>';
                    }
                    else
                    {
                        $addThisCssNowB = '';
                        if($db_result_ans_is == 'B')
                        {
                            $addResultAnswerCssB = 'color:red;font-weight:bold;';
                            $addIconForCLarityB = '<i class="fa fa-close" style="font-size:10px;margin: 0;"></i>';
                        }
                        else
                        {
                            $addResultAnswerCssB = '';
                            $addIconForCLarityB = '<i class="fa fa-circle-thin" style="font-size:10px;margin: 0;"></i>';
                        }
                    }

                    if($qtn_ans_qtn == 'C')
                    {
                        $addThisCssNowC = 'color:green;font-weight:bold'; 
                        $addResultAnswerCssC = ''; 
                        $addIconForCLarityC = '<i class="fa fa-check" style="font-size:10px;margin: 0;"></i>';      
                    }
                    else
                    {
                        $addThisCssNowC = '';
                        if($db_result_ans_is == 'C')
                        {
                            $addResultAnswerCssC = 'color:red;font-weight:bold;';
                            $addIconForCLarityC = '<i class="fa fa-close" style="font-size:10px;margin: 0;"></i>';
                        }
                        else
                        {
                            $addResultAnswerCssC = '';
                            $addIconForCLarityC = '<i class="fa fa-circle-thin" style="font-size:10px;margin: 0;"></i>';
                        }
                    }

                    if($qtn_ans_qtn == 'D')
                    {
                        $addThisCssNowD = 'color:green;font-weight:bold';
                        $addResultAnswerCssD = '';
                        $addIconForCLarityD = '<i class="fa fa-check" style="font-size:10px;margin: 0;"></i>';
                    }
                    else
                    {
                        $addThisCssNowD = '';
                        if($db_result_ans_is == 'D')
                        {
                            $addResultAnswerCssD = 'color:red;font-weight:bold;';
                            $addIconForCLarityD = '<i class="fa fa-close" style="font-size:10px;margin: 0;"></i>';
                        }
                        else
                        {
                            $addResultAnswerCssD = '';
                            $addIconForCLarityD = '<i class="fa fa-circle-thin" style="font-size:10px;margin: 0;"></i>';
                        }
                    }
                   
                    echo '

                    <div class="mb-2">
                        <b style="font-size:16px;line-height: 1.6;">'.$qtn_no_Onshow++.' . '.$qtn_qtn.'</b>
                    </div>
                    <g class="my-auto" id="A" style="'.$addResultAnswerCssA.''.$addThisCssNowA.';line-height: 1.6;">'.$addIconForCLarityA.' &nbsp;A . '.$choice_one_qtn.'</g><br>
                    <g class="my-auto" id="B" style="'.$addResultAnswerCssB.''.$addThisCssNowB.';line-height: 1.6;">'.$addIconForCLarityB.' &nbsp;B . '.$choice_two_qtn.'</g><br>
                    <g class="my-auto" id="C" style="'.$addResultAnswerCssC.''.$addThisCssNowC.';line-height: 1.6;">'.$addIconForCLarityC.' &nbsp;C . '.$choice_three_qtn.'</g><br>
                    <g class="my-auto" id="D" style="'.$addResultAnswerCssD.''.$addThisCssNowD.';line-height: 1.6;">'.$addIconForCLarityD.' &nbsp;D . '.$choice_four_qtn.'</g><br>
                    <hr>
                    ';
                }
            }
            ?>
        </div>
    </div>
</div>

</body>
</html>
<?php

$html = ob_get_contents();
ob_end_clean();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->load_html($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("".$student_name_student." - ".$test_session_id."", array("Attachment" => 0));
?> 