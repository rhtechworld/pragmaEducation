<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
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
            <h4 style="font-size:20px"><span>Hello <?php echo $student_name_session; ?>, </span> Welcome back </h4>
        </div>

        <div class="container mb-4">


        <h5>Your Active Courses</h5>
            <div class="row mt-2">
                <?php include('functions/student-dashboard-access-courses.php'); ?>
            </div>
            <hr>

        <!-- enrolled courses -->
        <h5>Our Test Series's</h5>
        <div class="row mt-2">
                <?php 

                    $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE isDeleted='0' ORDER BY id DESC");
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

                        //count of schedule now
                        $getTheCountOfScheduleNowHere = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id' AND isDeleted='0'");
                        $thisIsCountOfListOfAllScedules = mysqli_num_rows($getTheCountOfScheduleNowHere);

                        //status show
                        if($status == 0)
                        {
                            $showThisStatus = '<span class="badge badge-success">Active</span>';
                        }
                        else
                        {
                            $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                        }


                        //check enrollment now
                        $checkEnrollmentNowHere = mysqli_query($conn,"SELECT * FROM test_series_assigned WHERE ts_id='$ts_id' AND student_id='$student_id_session' AND isDeleted='0' AND status='0'");
                        $getCountOnThisNowTs = mysqli_num_rows($checkEnrollmentNowHere);

                        if($getCountOnThisNowTs == 0)
                        {
                            $showNewButtonActionOnTs = '<a href="test-series-enroll?tsId='.$ts_id.'" class="btn btn-primary btn-sm newButtonEffect">Enroll Now</a>';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($checkEnrollmentNowHere))
                            {
                                $checkEnrollmentIdNowHereDb = $row['ts_assigned_id'];
                            }

                            $showNewButtonActionOnTs = '<a href="test-series-enroll-access?tsId='.$ts_id.'&enId='.$checkEnrollmentIdNowHereDb.'" class="btn btn-success btn-sm">Access Now</a>';
                        }

                        echo '
                                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                    <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                        <b class="mt-2 mb-2" style="font-size:18px">'.$ts_name.'<br> ( '.$course_name.' )</b>
                                        <hr style="margin:0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                                '.$showNewButtonActionOnTs.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                    }

                ?>
            </div>
            
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_start(); ?>