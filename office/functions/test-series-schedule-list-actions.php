<?php

if(isset($_POST['addtestSeriesScheduleDetails']))
{

    $testSeriesSceduleStatus = mysqli_real_escape_string($conn, $_POST['testSeriesSceduleStatus']);
    $testSeriesScheduleName = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleName']);
    $testSeriesScheduleType = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleType']);
    $testSeriesScheduleDate = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleDate']);
    $testSeriesSyncIdInDb = mysqli_real_escape_string($conn, $_POST['testSeriesSyncIdInDb']);

    //check existing one 
    $checkBeforeInsertNew = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$testSeriesSyncIdInDb' AND sc_test_name='$testSeriesScheduleName' AND isDeleted='0'");
    $getCountOnInsertNewBefore = mysqli_num_rows($checkBeforeInsertNew);

    if($getCountOnInsertNewBefore != 0)
    {
        echo '<script>alert("Existing Schedule Name, Try With New Name!")</script>';
    }
    else
    {

        $scIdNew = "SC".rand(1000000000,9999999999)."";
        $insertNewRecordToTestSeries = mysqli_query($conn,"INSERT INTO test_series_schedule(sc_id, ts_id, sc_test_name, sc_test_type, sc_test_date, sc_pass_mark, status, isDeleted, last_updated)
        VALUES('$scIdNew','$inputOfSceduleTestCourseId','$testSeriesScheduleName','$testSeriesScheduleType','$testSeriesScheduleDate','0','$testSeriesSceduleStatus','0','$lastUpdated')");

        echo '<script>alert("Test Schedule Added Success, Refreshing...")</script>';
        header("Refresh:0; url=test-series-schedule?ts_id=$inputOfSceduleTestCourseId&msg=AddedSuccess");

    }

}

if(isset($_POST['edittestSeriesScheduleDetails']))
{

    $testSeriesSceduleStatus = mysqli_real_escape_string($conn, $_POST['testSeriesSceduleStatus']);
    $testSeriesScheduleName = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleName']);
    $testSeriesScheduleType = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleType']);
    $testSeriesScheduleDate = mysqli_real_escape_string($conn, $_POST['testSeriesScheduleDate']);

    //update
    $updateIndatabaseOfdata = mysqli_query($conn,"UPDATE test_series_schedule SET 
    sc_test_name = '$testSeriesScheduleName',
    sc_test_type = '$testSeriesScheduleType',
    sc_test_date = '$testSeriesScheduleDate',
    status = '$testSeriesSceduleStatus',
    last_updated = '$lastUpdated' WHERE sc_id='$sc_id_db'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=test-series-schedule?ts_id=$inputOfSceduleTestCourseId&msg=UpdatedSuccess");

}

if(isset($_POST['deletetestSeriesScheduleDetails']))
{
    //update
    $updateIndatabaseOfdata = mysqli_query($conn,"UPDATE test_series_schedule SET 
    isDeleted = '1',
    last_updated = '$lastUpdated' WHERE sc_id='$sc_id_db'");

    echo '<script>alert("Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=test-series-schedule?ts_id=$inputOfSceduleTestCourseId&msg=DeletedSuccess");
}

?>