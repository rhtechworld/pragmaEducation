<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['ts_id']))
{
    $inputOfTestId = mysqli_real_escape_string($conn, $_GET['ts_id']);

        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$inputOfTestId' AND course_id='$inputOfTestCourseId'");
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
            }
        }
}
else
{
    echo '<script>alert("Somthing issue with Params!, try again!")</script>';
    header("Refresh:0; url=test-series-list?msg=SomthingIssueWithParamsMissing");
}
?>
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
            <h5 class="mt-4"><?php echo $ts_name_db; ?></h5>
            <hr>
            
        </div>
    </main>
    <?php include('footer.php');