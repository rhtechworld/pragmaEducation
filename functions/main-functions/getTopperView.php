<?php

error_reporting(0);

include('./config.php');

$tpr_id = mysqli_real_escape_string($conn,$_GET['tpr_id']);

if(empty($tpr_id))
{
    header('location:./toppers');
}
else
{
    //check annid in database
    $searchInDb = mysqli_query($conn,"SELECT * FROM toppers WHERE tpr_id='$tpr_id' AND status='0' AND isDeleted='0'");
    $getCountOfList = mysqli_num_rows($searchInDb);

    if($getCountOfList == 0)
    {
        header('location:./toppers');
    }
    else
    {
        while($row = mysqli_fetch_array($searchInDb))
        {
            $tpr_id = $row['tpr_id'];
            $tpr_title = $row['tpr_title'];
            $tpr_date = $row['tpr_date'];
            $tpr_desc = $row['tpr_desc'];
            $tpr_link = $row['tpr_link'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];
        }
    }

    //selectfirstrandpost
    $getRandOnePost = mysqli_query($conn,"SELECT * FROM toppers WHERE status='0' AND isDeleted='0' AND tpr_id<>'$tpr_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandOnePost))
        {
            $tpr_id_refOne = $row['tpr_id'];
            $tpr_title_refOne = $row['tpr_title'];

            $showThisAsRefOne = '<a href="'.$baseURL.'topper-view?tpr_id='.$tpr_id_refOne.'" style="color:#545454">'.$tpr_title_refOne.'</a>';

        }


        //selectsecondrandpost
    $getRandTwoPost = mysqli_query($conn,"SELECT * FROM toppers WHERE status='0' AND isDeleted='0' AND tpr_id<>'$tpr_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandTwoPost))
        {
            $tpr_id_refTwo = $row['tpr_id'];
            $tpr_title_refTwo = $row['tpr_title'];

            $showThisAsRefTwo = '<a href="'.$baseURL.'topper-view?tpr_id='.$tpr_id_refTwo.'" style="color:#545454">'.$tpr_title_refTwo.'</a>';

        }
}

?>