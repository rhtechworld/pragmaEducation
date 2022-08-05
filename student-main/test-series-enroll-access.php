<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['tsId']) && isset($_GET['enId']))
{
    $ts_id = mysqli_real_escape_string($conn, $_GET['tsId']);
    $ts_enrollId = mysqli_real_escape_string($conn, $_GET['enId']);

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
                    $course_name = "";
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
            <h4 style="font-size:20px"><span><?php echo $ts_name; ?> </span> </h4>
        </div>

        <div class="container mb-4">

            <div class="row my-auto text-center">
                <div class="col-lg-6 col-md-6 my-auto">
                    <b class="text-center"><?php echo $ts_assigned_id; ?></b> | <b><a href="#" style="color:#E31E26">Dashboard</a></b>
                </div>
                <div class="col-lg-6 col-md-6 text-right my-auto">
                        <select class="form-control form-control-sm" style="border:1px solid #E31E26" id="ActionOnCourseEnrolled" onchange="takePageActionNow()">
                            <option value="">-- Action To --</option>
                            <option value="test-series-enroll-access">Dashboard/Schedules</option>
                            <option value="test-series-enroll-access-payment">Payment History</option>
                        </select>
                </div>
            </div>

        <div class="accordion mt-3" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo $ts_name; ?> 
                    </button>
                </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php echo $ts_desc; ?> 
                </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-2">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="CoursesList" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Test Name</th>
                                        <th>Test Type</th>
                                        <th>Test Date</th>
                                        <th>Test Day</th>
                                        <th>Attend Test</th>
                                        <th>Attempts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id' AND isDeleted='0' ORDER BY sc_test_date ASC");
                                                $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

                                                $slNo = 1;
                                                while($row = mysqli_fetch_array($getListOfTestSeries))
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

                                                    //count of schedule now
                                                    $getTheCountOfScheduleNowHereQtn = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0'");
                                                    $thisIsCountOfListOfAllScedulesQtn = mysqli_num_rows($getTheCountOfScheduleNowHereQtn);

                                                    //status show
                                                    if($status == 0)
                                                    {
                                                        $showThisStatus = '<span class="badge badge-success">Active</span>';
                                                    }
                                                    else
                                                    {
                                                        $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                                                    }

                                                    //validate date

                                                    date_default_timezone_set('Asia/Kolkata');

                                                    $todayIdNow = date('Y-m-d');

                                                    //getAttempCount
                                                    $getExamAttempCountHereNow = mysqli_query($conn,"SELECT * FROM test_series_attends WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND student_id='$student_id_session' AND status='1' AND isDeleted='0'");
                                                    $cntOnExamAttempCountHereNow = mysqli_num_rows($getExamAttempCountHereNow);

                                                    if($cntOnExamAttempCountHereNow >= 3)
                                                    {
                                                        $attendTestActionOnThis = '<button class="btn btn-sm newButtonEffect shadow" disabled>Attends Completed</button>';
                                                    }
                                                    else
                                                    {
                                                        if($todayIdNow >= $sc_test_date)
                                                        {
                                                            $attendTestActionOnThis = '<a href="test-series-attend-test?scId='.$sc_id.'&tsId='.$ts_id.'&enId='.$ts_assigned_id.'" class="btn btn-sm btn-primary newButtonEffect shadow">Attend Test</a>';
                                                        }
                                                        else
                                                        {
                                                            $attendTestActionOnThis = '<button class="btn btn-sm newButtonEffect shadow" disabled>Attend Test</button>';
                                                        }
                                                    }

                                                    echo '
                                                    <tr>
                                                        <td>'.$slNo++.'</td>
                                                        <td>'.$sc_test_name.'</td>
                                                        <td>'.$sc_test_type.'</td>
                                                        <td><b>'.date('d-m-Y',strtotime($sc_test_date)).'</b></td>
                                                        <td>'.date('l',strtotime($sc_test_date)).'</td>
                                                        <td>'.$attendTestActionOnThis.'</td>
                                                        <td>Attended ( <b>'.$cntOnExamAttempCountHereNow.'</b> / 3 )</td>
                                                    </tr>
                                                    ';
                                                }

                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
            function takePageActionNow()
            {
                var ActionOnCourseEnrolled = document.getElementById('ActionOnCourseEnrolled').value;

               // alert(ActionOnCourseEnrolled);

                if(ActionOnCourseEnrolled == '')
                {
                    window.location.replace('test-series-enroll-access?tsId=<?php echo $ts_id; ?>&enId=<?php echo $ts_assigned_id; ?>&verifyenrolled=true&accessCourse=true');
                }
                else
                {
                    window.location.replace(''+ActionOnCourseEnrolled+'?tsId=<?php echo $ts_id; ?>&enId=<?php echo $ts_assigned_id; ?>&verifyenrolled=true&accessCourse=true');
                }
            }
    </script>


    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>