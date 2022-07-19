<?php

include('../config.php');

if(isset($_GET['studentId']))
{
    $studentId = mysqli_real_escape_string($conn, $_GET['studentId']);

    //getStudentDetails
    $getStudentDetailsNow = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$studentId' AND isDeleted='0'");

    if(!$getStudentDetailsNow)
    {
        $array = ['error' => true, 'message' => 'StudentNotFound!'];

        header('Content-type: application/json');
        $makeJson = json_encode($array);

        echo $makeJson;
    }
    else
    {
        $array = mysqli_fetch_assoc($getStudentDetailsNow);

        $array = ['error' => false, 'student' => $array];

        header('Content-type: application/json');
        $makeJson = json_encode($array);

        echo $makeJson;
    }

}
else
{
    $array = ['error' => true, 'message' => 'InvalidParam'];

    header('Content-type: application/json');
    $makeJson = json_encode($array);

    echo $makeJson;
}

?>