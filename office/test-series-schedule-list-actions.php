<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['sc_id']) && isset($_GET['ts_id']) && isset($_GET['action']))
{
    $inputOfSceduleTestId = mysqli_real_escape_string($conn, $_GET['sc_id']);
    $inputOfSceduleTestCourseId = mysqli_real_escape_string($conn, $_GET['ts_id']);
    $inputOfSceduleTestAction = mysqli_real_escape_string($conn, $_GET['action']);

    if($inputOfSceduleTestAction == 'add')
    {
        $headeerTitleShow = "Add Test Schedule";
        $pageInputActionsShow = '';
        $inputActionsButtonTake = '<button type="submit" name="addtestSeriesScheduleDetails" class="btn btn-primary btn-block">Add Test Series</button>';
        $testSeriesNameShowNow = '';
    }
    else if($inputOfSceduleTestAction == 'edit')
    {
        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$inputOfSceduleTestCourseId' AND sc_id='$inputOfSceduleTestId'");
        $getCOuntOnDetailsOfTestSeriesFromDb  = mysqli_num_rows($getDetailsOfTestSeriesFromDb);

        if($getCOuntOnDetailsOfTestSeriesFromDb == 0)
        {
            echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
            header("Refresh:0; url=test-series-list?msg=SomthingIssueWithServerSideWrongTsId");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsOfTestSeriesFromDb))
            {
                $sc_id_db = $row['sc_id'];
                $ts_id_db = $row['ts_id'];
                $sc_test_name_db = $row['sc_test_name'];
                $sc_test_type_db = $row['sc_test_type'];
                $sc_test_date_db = $row['sc_test_date'];
                $status_db = $row['status'];
                $isDeleted_db = $row['isDeleted'];
                $last_updated_db = $row['last_updated'];
            }
        }

        $headeerTitleShow = "Edit Test Schedule";
        $pageInputActionsShow = '';
        $inputActionsButtonTake = '<button type="submit" name="edittestSeriesScheduleDetails" class="btn btn-primary btn-block">Update Test Series</button>';
        $testSeriesNameShowNow = " : ".$sc_test_name_db."";

    }
    else if($inputOfSceduleTestAction == 'delete')
    {
        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$inputOfSceduleTestCourseId' AND sc_id='$inputOfSceduleTestId'");
        $getCOuntOnDetailsOfTestSeriesFromDb  = mysqli_num_rows($getDetailsOfTestSeriesFromDb);

        if($getCOuntOnDetailsOfTestSeriesFromDb == 0)
        {
            echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
            header("Refresh:0; url=test-series-list?msg=SomthingIssueWithServerSideWrongTsId");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsOfTestSeriesFromDb))
            {
                $sc_id_db = $row['sc_id'];
                $ts_id_db = $row['ts_id'];
                $sc_test_name_db = $row['sc_test_name'];
                $sc_test_type_db = $row['sc_test_type'];
                $sc_test_date_db = $row['sc_test_date'];
                $status_db = $row['status'];
                $isDeleted_db = $row['isDeleted'];
                $last_updated_db = $row['last_updated'];
            }
        }

        $headeerTitleShow = "Delete Test Schedule";
        $pageInputActionsShow = 'disabled';
        $inputActionsButtonTake = '<button type="submit" name="deletetestSeriesScheduleDetails" class="btn btn-danger btn-block">Delete Test Series</button>';
        $testSeriesNameShowNow = " : ".$sc_test_name_db."";

    }
    else
    {
        echo '<script>alert("Somthing issue with Params!, try again!")</script>';
        header("Refresh:0; url=test-series-list?msg=SomthingIssueWithParamsAction");
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
        <title><?php echo $headeerTitleShow; ?> | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4"><?php echo $headeerTitleShow; ?></h3>
                        <?php include('functions/test-series-schedule-list-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-list">Test Series List</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-schedule?ts_id=<?php echo $inputOfSceduleTestCourseId; ?>">Test Series Schedule List</a></li>
                            <li class="breadcrumb-item active"><b><?php echo $headeerTitleShow; ?> <?php echo $testSeriesNameShowNow; ?></b></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                <?php echo $headeerTitleShow; ?> Details</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="testSeriesSceduleStatus"><b>Test Series Schedule Status :</b> </label>
                                        <select class="form-control" id="testSeriesSceduleStatus" name="testSeriesSceduleStatus" required <?php echo $pageInputActionsShow; ?>>
                                            <option value="">-- Select Status --</option>
                                            <option value="0" <?php if(isset($status_db)){ if($status_db == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public</option>
                                            <option value="1" <?php if(isset($status_db)){ if($status_db == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesScheduleName"><b>Test Series Schedule Name :</b> </label>
                                        <input type="text" class="form-control" id="testSeriesScheduleName" name="testSeriesScheduleName" value="<?php if(isset($sc_test_name_db)) { echo $sc_test_name_db; } else { echo ''; } ?>"  placeholder="Enter Test Series Schedule Name" required <?php echo $pageInputActionsShow; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesScheduleType"><b>Test Series Schedule Type :</b> </label>
                                        <input type="text" class="form-control" id="testSeriesScheduleType" name="testSeriesScheduleType" value="<?php if(isset($sc_test_type_db)) { echo $sc_test_type_db; } else { echo ''; } ?>" placeholder="Test Series Schedule Type" required <?php echo $pageInputActionsShow; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesScheduleDate"><b>Test Series Schedule Date :</b> </label>
                                        <input type="date" class="form-control" id="testSeriesScheduleDate" name="testSeriesScheduleDate" value="<?php if(isset($sc_test_date_db)) { echo date('Y-m-d',strtotime($sc_test_date_db)); } else { echo ''; } ?>" placeholder="Test Series Schedule Date" required <?php echo $pageInputActionsShow; ?>>
                                    </div>
                                    <?php echo $inputActionsButtonTake; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
