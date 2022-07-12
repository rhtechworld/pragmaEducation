<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pragma Student | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4">Hello <?php echo $student_name_session; ?>, Welcome back</h5>
            <hr>
            <h5>Your Active Courses</h5>
            <div class="row mt-2">
                <?php include('functions/student-dashboard-access-courses.php'); ?>
            </div>
            <hr>
            <h5>Our Top Courses</h5>
            <div class="row mt-2">
                <?php include('functions/dashboard-top-tabs.php'); ?>
            </div>
            <hr>
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

                        echo '
                                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                    <div class="card p-2 shadow" style="border:1px solid black">
                                        <b class="mt-2 mb-2" style="font-size:18px">'.$ts_name.'<br> ( '.$course_name.' )</b>
                                        <hr style="margin:0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                                <a href="test-series-enroll?tsId='.$ts_id.'" class="btn btn-primary btn-sm">Enroll Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                    }

                ?>
            </div>
        </div>
    </main>
    <?php include('footer.php');