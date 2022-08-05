<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['ts_id']))
{
    $testSereiseIdNow = mysqli_real_escape_string($conn, $_GET['ts_id']);

    $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$testSereiseIdNow' ORDER BY id DESC");
    $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

    if($getCountOnLstOfData == 0)
    {
        echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
        header("Refresh:0; url=test-series-list?msg=SomthingIssueWithServerSideZeroTsId");
    }
    else
    {
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
else
{
    echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
    header("Refresh:0; url=test-series-list?msg=SomthingIssueWithParam");
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
        <title>Test Series Schedule | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Test Series Test's</h3>
                        <?php include('functions/announcement-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-list">Test Series List</a></li>
                            <li class="breadcrumb-item active"><b><?php echo $ts_name; ?></b></li>
                            <li class="breadcrumb-item active"><a href="test-series-schedule-list-actions?sc_id=<?php echo rand(100000,999999); ?>&ts_id=<?php echo $ts_id; ?>&action=add"><b><i class="fa fa-plus"></i> Add New Test</a></b></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of all Tests : <b><?php echo $ts_name; ?></b>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="CoursesList" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>Test Name</th>
                                                <th>Test Type</th>
                                                <th>Test Date</th>
                                                <th>Test Day</th>
                                                <th>Test Questions</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id' AND isDeleted='0' ORDER BY id DESC");
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
                                                        <td><a href="test-series-questions?ts_id='.$ts_id.'&sc_id='.$sc_id.'"><b>Active Questions ( '.$thisIsCountOfListOfAllScedulesQtn.' )</b></a></td>
                                                        <td>'.$showThisStatus.'</td>
                                                        <td><a href="test-series-schedule-list-actions?sc_id='.$sc_id.'&ts_id='.$ts_id.'&action=edit" data-action-id="'.$sc_id.'"><i class="fa fa-edit"></i></a> <a href="test-series-schedule-list-actions?sc_id='.$sc_id.'&ts_id='.$ts_id.'&action=delete" id="D'.$sc_id.'" data-action-id="'.$sc_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
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
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
