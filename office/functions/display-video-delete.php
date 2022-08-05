<?php

include('../../config.php');

if(isset($_GET['deleteVideoId']))
{
    $deleteVideoId = mysqli_real_escape_string($conn, $_GET['deleteVideoId']);

    //delete video
    $deleteVideoNow = mysqli_query($conn,"UPDATE videos SET isDeleted='1' WHERE vid_id='$deleteVideoId'");

    echo '<script>alert("Video Deleted Success, Refreshing...")</script>';
    header("Refresh:0; url=../display-videos");
}

?>