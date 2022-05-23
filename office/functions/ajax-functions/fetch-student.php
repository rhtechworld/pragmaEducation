<?php

include('../../../config.php');

if(isset($_POST['studentId']))
{
    $studentId = mysqli_real_escape_string($conn,$_POST['studentId']);

    $getStudentDetails = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$studentId'");
        
    if(!$getStudentDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getStudentDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>