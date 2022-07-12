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
        <div class="row my-auto text-center">
                <div class="col-lg-6 col-md-6 my-auto">
                    <b class="text-center"><?php echo $ts_assigned_id; ?></b> | <b><a href="#" style="color:#E31E26">Enrolled Payment</a></b>
                </div>
                <div class="col-lg-6 col-md-6 text-right my-auto">
                        <select class="form-control form-control-sm" style="border:1px solid #E31E26" id="ActionOnCourseEnrolled" onchange="takePageActionNow()">
                            <option value="">-- Action To --</option>
                            <option value="test-series-enroll-access">Dashboard/Schedules</option>
                            <option value="test-series-enroll-access-payment">Payment History</option>
                        </select>
                </div>
            </div>
                <hr>
                <div class="accordion" id="accordionCoursePrelims">
                <div class="row">
                    <?php include('functions/test-series-payments-access.php'); ?>
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
    var actionCourseId = '<?php echo $assigned_course_id; ?>';
    $("#collapseArrow"+actionCourseId).html('<i class="fas fa-angle-down"></i>');
    $("#Clps"+actionCourseId).addClass("active");
    $("#payment"+actionCourseId).addClass("active");
    $("#sidenavAccordionCourse"+actionCourseId).addClass("show");
    </script>
    <script>
                $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(
                    {
                        html:true,
                        container: 'body'
                    }
                    );   
                });
                </script>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>