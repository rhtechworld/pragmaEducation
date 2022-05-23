<?php

include('../../../config.php');

if(isset($_POST['AnnId']))
{
    $AnnId = mysqli_real_escape_string($conn,$_POST['AnnId']);

    $getAnnDetails = mysqli_query($conn,"SELECT * FROM announcements WHERE ann_id='$AnnId'");

    if(!$getAnnDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getAnnDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>