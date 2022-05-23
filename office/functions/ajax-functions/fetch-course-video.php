<?php

include('../../../config.php');

if(isset($_POST['VidId']))
{
    $VidId = mysqli_real_escape_string($conn,$_POST['VidId']);

    $getVideoDetails = mysqli_query($conn,"SELECT * FROM course_videos WHERE video_uid='$VidId'");
        
    if(!$getVideoDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getVideoDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>