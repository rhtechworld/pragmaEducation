<?php

include('../../../config.php');

if(isset($_POST['courseId']))
{
    $courseId = mysqli_real_escape_string($conn,$_POST['courseId']);

    $getCourseDetails = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$courseId'");
        
    if(!$getCourseDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getCourseDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>