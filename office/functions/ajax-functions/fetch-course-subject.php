<?php

include('../../../config.php');

if(isset($_POST['SubId']))
{
    $SubId = mysqli_real_escape_string($conn,$_POST['SubId']);

    $getSubjectDetails = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$SubId'");
        
    if(!$getSubjectDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getSubjectDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>