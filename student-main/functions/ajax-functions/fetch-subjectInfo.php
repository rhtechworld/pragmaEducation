<?php

include('../../../config.php');

if(isset($_POST['subjectID']))
{
    $subjectID = mysqli_real_escape_string($conn,$_POST['subjectID']);

    $getSubDetails = mysqli_query($conn,"SELECT subject_desc FROM subjects WHERE subject_id='$subjectID'");

    if(!$getSubDetails)
    {
        echo "error";
    }
    else
    {
        $row = mysqli_fetch_array($getSubDetails); 
        
        echo json_encode($row);
    }
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>