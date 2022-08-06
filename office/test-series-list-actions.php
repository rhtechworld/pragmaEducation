<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['ts_id']) && isset($_GET['courseId']) && isset($_GET['action']))
{
    $inputOfTestId = mysqli_real_escape_string($conn, $_GET['ts_id']);
    $inputOfTestCourseId = mysqli_real_escape_string($conn, $_GET['courseId']);
    $inputOfTestAction = mysqli_real_escape_string($conn, $_GET['action']);

    if($inputOfTestAction == 'add')
    {
        $headeerTitleShow = "Add Test Series";
        $pageInputActionsShow = '';
        $inputActionsButtonTake = '<button type="submit" name="addtestSeriesDetails" class="btn btn-primary btn-block">Add Test Series</button>';
        $testSeriesNameShowNow = '';
    }
    else if($inputOfTestAction == 'edit')
    {
        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$inputOfTestId'");
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

        $headeerTitleShow = "Edit Test Series";
        $pageInputActionsShow = '';
        $inputActionsButtonTake = '<button type="submit" name="edittestSeriesDetails" class="btn btn-primary btn-block">Update Test Series</button>';
        $testSeriesNameShowNow = " : ".$ts_name_db."";

    }
    else if($inputOfTestAction == 'delete')
    {
        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$inputOfTestId'");
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

        $headeerTitleShow = "Delete Test Series";
        $pageInputActionsShow = 'disabled';
        $inputActionsButtonTake = '<button type="submit" name="deletetestSeriesDetails" class="btn btn-danger btn-block">Delete Test Series</button>';
        $testSeriesNameShowNow = " : ".$ts_name_db."";

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
                        <?php include('functions/test-series-list-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-list">Test Series List</a></li>
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
                                        <label for="testSeriesStatus"><b>Test Series Status :</b> </label>
                                        <select class="form-control" id="testSeriesStatus" name="testSeriesStatus" required <?php echo $pageInputActionsShow; ?>>
                                            <option value="">-- Select Status --</option>
                                            <option value="0" <?php if(isset($status_db)){ if($status_db == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public</option>
                                            <option value="1" <?php if(isset($status_db)){ if($status_db == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesCourse"><b>Select Test Series Course:</b> </label>
                                        <select class="form-control" id="testSeriesCourse" name="testSeriesCourse" required <?php echo $pageInputActionsShow; ?>>
                                            <option value="Na">-- No Course --</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesTitle"><b>Test Series Title :</b> </label>
                                        <input type="text" class="form-control" id="testSeriesTitle" name="testSeriesTitle" value="<?php if(isset($ts_name_db)) { echo $ts_name_db; } else { echo ''; } ?>"  placeholder="Enter Test Series Title" required <?php echo $pageInputActionsShow; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesPrice"><b>Test Series Price :</b> </label>
                                        <input type="number" class="form-control" id="testSeriesPrice" name="testSeriesPrice" value="<?php if(isset($ts_price_db)) { echo $ts_price_db; } else { echo ''; } ?>" placeholder="Test Series Price" required <?php echo $pageInputActionsShow; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="testSeriesDesc"><b>Test Series Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="testSeriesDesc" rows="15" cols="80" required <?php echo $pageInputActionsShow; ?>><?php if(isset($ts_desc_db)) { echo $ts_desc_db; } else { echo ''; } ?></textarea>
                                    </div>
                                    <?php echo $inputActionsButtonTake; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
