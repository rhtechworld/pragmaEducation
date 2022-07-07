<? ob_start(); ?>
<?php include('config.php'); ?>
<?php

if(isset($_GET['tsId']))
{
    $inputOfTestId = mysqli_real_escape_string($conn, $_GET['tsId']);

        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$inputOfTestId'");
        $getCOuntOnDetailsOfTestSeriesFromDb  = mysqli_num_rows($getDetailsOfTestSeriesFromDb);

        if($getCOuntOnDetailsOfTestSeriesFromDb == 0)
        {
            echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
            header("Refresh:0; url=./?msg=SomthingIssueWithServerSideWrongTsId");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsOfTestSeriesFromDb))
            {
                $ts_id_db = $row['ts_id'];
                $course_id_db = $row['course_id'];
                $ts_name_db = $row['ts_name'];
                $ts_price_db = $row['ts_price'];
                $ts_type_db = $row['ts_type'];
                $ts_desc_db = $row['ts_desc'];
                $pass_mark_db = $row['pass_mark'];
                $status_db = $row['status'];
                $isDeleted_db = $row['isDeleted'];
                $last_updated_db = $row['last_updated'];

                //check course details in db
                $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_db'");
                while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                }

                $AfterTaxFinalPriceIsThisToPay = $ts_price_db;
            }
        }
}
else
{
    echo '<script>alert("Somthing issue with Params!, try again!")</script>';
    header("Refresh:0; url=./?msg=SomthingIssueWithParamsMissing");
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
            <h4 style="font-size:20px"><span> Test Series : </span> <?php echo $ts_name_db; ?> (
                <?php echo $course_name; ?> )</h4>
        </div>

        <div class="container mb-3">
            <div class="row mt-2">
                <div class="col-lg-8 col-md-8 mb-2">
                    <b><?php echo $ts_name_db; ?></b>
                    <hr>
                    <?php echo $ts_desc_db; ?>
                </div>
                <div class="col-lg-4 col-md-4 mb-2">
                    <table class="table text-left">
                        <tbody>
                            <tr>
                                <th scope="row">Series Fee</th>
                                <td>₹<?php echo number_format($ts_price_db,2); ?></td>
                            </tr>
                            <tr>
                                <th>
                                <a class="btn btn-primary newButtonEffect" style="color:white" href="student-main/test-series-enroll?tsId=<?php echo $ts_id_db; ?>">Subscribe Now</a>
                                    
                                </th>
                                <td>
                                    <a class="btn btn-primary newButtonEffect" style="color:white" href="#sceduleThis">View Schedule</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <section id="sceduleThis" style="padding:0">
                <div class="mt-2 mb-2">
                    <b></b>
                </div>
                <h5 class="mb-2"><b>Test Scedule</b></h5>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id_db' AND isDeleted='0' ORDER BY id DESC");
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

                                                    echo '
                                                    <tr>
                                                        <td>'.$slNo++.'</td>
                                                        <td>'.$sc_test_name.'</td>
                                                        <td>'.$sc_test_type.'</td>
                                                        <td><b>'.date('d-m-Y',strtotime($sc_test_date)).'</b></td>
                                                        <td>'.date('l',strtotime($sc_test_date)).'</td>
                                                    </tr>
                                                    ';
                                                }

                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>