<?php

include('../config.php');

if(isset($_GET['type']) && isset($_GET['id']))
{
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    $enrollId = mysqli_real_escape_string($conn, $_GET['id']);

    if($type == 'course')
    {
        //getCourseDetails
        $getCourseDetails = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$enrollId'");
        $getNumberOfCount = mysqli_num_rows($getCourseDetails);

        if($getNumberOfCount == 0)
        {
            $array = ['error' => true, 'message' => 'idNotFound'];

            header('Content-type: application/json');
            $makeJson = json_encode($array);

            echo $makeJson;
        }
        else
        {
            while($row = mysqli_fetch_array($getCourseDetails))
            {
                $course_id = $row['course_id'];
                $course_name = $row['course_name'];
                $course_price = $row['course_price'];
            }

            $makeProcess = ['process_type' => $type, 'process_id' => $course_id, 'process_name' => $course_name, 'process_price' => $course_price];

            $array = ['error' => false, 'payDetails' => $makeProcess];

            header('Content-type: application/json');
            $makeJson = json_encode($array);

            echo $makeJson;
        }
    }
    else if($type == 'testSeries')
    {
        //getCourseDetails
        $getCourseDetails = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$enrollId'");
        $getNumberOfCount = mysqli_num_rows($getCourseDetails);

        if($getNumberOfCount == 0)
        {
            $array = ['error' => true, 'message' => 'idNotFound'];

            header('Content-type: application/json');
            $makeJson = json_encode($array);

            echo $makeJson;
        }
        else
        {
            while($row = mysqli_fetch_array($getCourseDetails))
            {
                $ts_id = $row['ts_id'];
                $ts_name = $row['ts_name'];
                $ts_price = $row['ts_price'];
            }

            $makeProcess = ['process_type' => $type, 'process_id' => $ts_id, 'process_name' => $ts_name, 'process_price' => $ts_price];

            $array = ['error' => false, 'payDetails' => $makeProcess];

            header('Content-type: application/json');
            $makeJson = json_encode($array);

            echo $makeJson;
        }
    }
    else
    {
        $array = ['error' => true, 'message' => 'InvlidType'];

        header('Content-type: application/json');
        $makeJson = json_encode($array);

        echo $makeJson;
    }
}
else
{
    $array = ['error' => true, 'message' => 'InvalidParams'];

    header('Content-type: application/json');
    $makeJson = json_encode($array);

    echo $makeJson;
}

?>