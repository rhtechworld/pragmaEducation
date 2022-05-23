<?php

include('../../../config.php');

if(isset($_POST['OffId']))
{
    $OffId = mysqli_real_escape_string($conn,$_POST['OffId']);

    $getOffIdDetails = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE offer_id='$OffId'");
        
    if(!$getOffIdDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getOffIdDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>