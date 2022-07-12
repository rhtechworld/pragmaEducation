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
        <title>Test Series List | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Test Series List</h3>
                        <?php include('functions/announcement-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Test Series List </li>
                            <li class="breadcrumb-item active"><a href="test-series-list-actions?ts_id=<?php echo rand(100000,999999); ?>&courseId=<?php echo rand(100000,999999); ?>&action=add"><b><i class="fa fa-plus"></i> Add New Test Series</a></b></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of all Test Series's
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="CoursesList" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SNo.</th>
                                                <th>TS.Id</th>
                                                <th>TS.Title</th>
                                                <th>TS.Course</th>
                                                <th>TS.Price</th>
                                                <th>TS.Test's</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                                    <tr>
                                                        <td>'.$slNo++.'</td>
                                                        <td>#'.$ts_id.'</td>
                                                        <td>'.$ts_name.'</td>
                                                        <td><b>'.$course_name.'</b></td>
                                                        <td>₹'.number_format($ts_price,2).'</td>
                                                        <td><a href="test-series-schedule?ts_id='.$ts_id.'"><b>Tests ( '.$thisIsCountOfListOfAllScedules.' )</b></a></td>
                                                        <td>'.$showThisStatus.'</td>
                                                        <td><a href="test-series-list-actions?ts_id='.$ts_id.'&courseId='.$course_id.'&action=edit" data-action-id="'.$ts_id.'"><i class="fa fa-edit"></i></a> <a href="test-series-list-actions?ts_id='.$ts_id.'&courseId='.$course_id.'&action=delete" id="D'.$ts_id.'" data-action-id="'.$ts_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
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
               
