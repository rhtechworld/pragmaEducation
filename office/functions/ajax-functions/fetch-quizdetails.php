<?php

include('../../../config.php');

if(isset($_POST['quizId']))
{
    $quizId = mysqli_real_escape_string($conn,$_POST['quizId']);

    $getOffIdDetails = mysqli_query($conn,"SELECT * FROM quiz_controls WHERE qz_id='$quizId'");
        
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