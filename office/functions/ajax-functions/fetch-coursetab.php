<?php

include('../../../config.php');

if(isset($_POST['courseTabId']))
{
    $courseTabId = mysqli_real_escape_string($conn,$_POST['courseTabId']);

    $getCourseTabDetails = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$courseTabId'");
        
    if(!$getCourseTabDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getCourseTabDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>