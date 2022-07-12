<?php

if(isset($_POST['addtestSeriesDetails']))
{
    $testSeriesStatus = mysqli_real_escape_string($conn, $_POST['testSeriesStatus']);
    $testSeriesCourse = mysqli_real_escape_string($conn, $_POST['testSeriesCourse']);
    $testSeriesTitle = mysqli_real_escape_string($conn, $_POST['testSeriesTitle']);
    $testSeriesPrice = mysqli_real_escape_string($conn, $_POST['testSeriesPrice']);
    $testSeriesDesc = mysqli_real_escape_string($conn, $_POST['testSeriesDesc']);

    //check existing one
    $checkBeforeInsertNew = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_name='$testSeriesTitle' AND course_id='$testSeriesCourse' AND isDeleted='0'");
    $getCountOnInsertNewBefore = mysqli_num_rows($checkBeforeInsertNew);

    if($getCountOnInsertNewBefore != 0)
    {
        echo '<script>alert("Existing Series Name, Try With New Name!")</script>';
    }
    else
    {

        $tsIdNew = "TS".rand(1000000000,9999999999)."";
        $insertNewRecordToTestSeries = mysqli_query($conn,"INSERT INTO test_series_manage(ts_id, course_id, ts_name, ts_price, ts_type, ts_desc, pass_mark, status, isDeleted, last_updated)
        VALUES('$tsIdNew','$testSeriesCourse','$testSeriesTitle','$testSeriesPrice','-','$testSeriesDesc','0','$testSeriesStatus','0','$lastUpdated')");

        echo '<script>alert("Test Series Added Success, Refreshing...")</script>';
        header("Refresh:0; url=test-series-list?msg=AddSuccess");

    }
}

if(isset($_POST['edittestSeriesDetails']))
{
    $testSeriesStatus = mysqli_real_escape_string($conn, $_POST['testSeriesStatus']);
    $testSeriesCourse = mysqli_real_escape_string($conn, $_POST['testSeriesCourse']);
    $testSeriesTitle = mysqli_real_escape_string($conn, $_POST['testSeriesTitle']);
    $testSeriesPrice = mysqli_real_escape_string($conn, $_POST['testSeriesPrice']);
    $testSeriesDesc = mysqli_real_escape_string($conn, $_POST['testSeriesDesc']);

    //updateDataInDatabase
    $updateInDbNowTestSeries = mysqli_query($conn,"UPDATE test_series_manage SET
    course_id = '$testSeriesCourse',
    ts_name = '$testSeriesTitle',
    ts_price = '$testSeriesPrice',
    ts_desc = '$testSeriesDesc',
    status = '$testSeriesStatus',
    last_updated = '$lastUpdated' WHERE ts_id='$ts_id_db'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';
    header("Refresh:0; url=test-series-list?msg=UpdatedSuccess");

}

if(isset($_POST['deletetestSeriesDetails']))
{
    //updateDataInDatabase
    $updateInDbNowTestSeries = mysqli_query($conn,"UPDATE test_series_manage SET
    isDeleted = '1',
    last_updated = '$lastUpdated' WHERE ts_id='$ts_id_db'");

    echo '<script>alert("Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=test-series-list?msg=DeletedSuccess");
}

?>