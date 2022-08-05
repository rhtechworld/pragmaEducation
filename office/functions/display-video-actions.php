<?php

if(isset($_POST['addNewVideoNow']))
{
    $videpoIdIs = mysqli_real_escape_string($conn, $_POST['inputVideoAdding']);

    //check video id now
    $checkVideoBeforeAdding = mysqli_query($conn,"SELECT * FROM videos WHERE vid_link='$videpoIdIs' AND isDeleted='0'");
    $getCntOnDb = mysqli_num_rows($checkVideoBeforeAdding);

    if($getCntOnDb == 0)
    {
        $vdRand = "V".rand(100000,999999)."";
        $inserNewVideoNow = mysqli_query($conn,"INSERT INTO videos(vid_id, vid_title, vid_link, vid_status, date, last_updated, isDeleted)
        VALUES('$vdRand','','$videpoIdIs','0','$lastUpdated','$lastUpdated','0')");

        echo '<script>alert("Video Added Success, Refreshing...")</script>';
        header("Refresh:0; url=display-videos");
    }
    else
    {
        echo '<script>alert("Video Id Already Added, Try With New!")</script>';
        header("Refresh:0; url=display-videos");
    }
}

?>