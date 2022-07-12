<?php

error_reporting(0);

include('./config.php');

$dwn_id = mysqli_real_escape_string($conn,$_GET['dwn_id']);

if(empty($dwn_id))
{
    header('location:./downloads');
}
else
{
    //check annid in database
    $searchInDb = mysqli_query($conn,"SELECT * FROM downloads WHERE status='0' AND dwn_id='$dwn_id' AND isDeleted='0'");
    $getCountOfList = mysqli_num_rows($searchInDb);

    if($getCountOfList == 0)
    {
        header('location:./downloads');
    }
    else
    {
        while($row = mysqli_fetch_array($searchInDb))
        {
            $dwn_id = $row['dwn_id'];
            $dwn_title = $row['dwn_title'];
            $dwn_desc = $row['dwn_desc'];
            $dwn_link = $row['dwn_link'];
            $dwn_date = $row['dwn_date'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];
        }
    }

    //selectfirstrandpost
    $getRandOnePost = mysqli_query($conn,"SELECT * FROM downloads WHERE status='0' AND isDeleted='0' AND dwn_id<>'$dwn_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandOnePost))
        {
            $dwn_id_refOne = $row['dwn_id'];
            $dwn_title_refOne = $row['dwn_title'];

            $showThisAsRefOne = '<a href="'.$baseURL.'download-view?dwn_id='.$dwn_id_refOne.'" style="color:#545454">'.$dwn_title_refOne.'</a>';

        }


        //selectsecondrandpost
    $getRandTwoPost = mysqli_query($conn,"SELECT * FROM downloads WHERE status='0' AND isDeleted='0' AND dwn_id<>'$dwn_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandTwoPost))
        {
            $dwn_id_refTwo = $row['dwn_id'];
            $dwn_title_refTwo = $row['dwn_title'];

            $showThisAsRefTwo = '<a href="'.$baseURL.'download-view?dwn_id='.$dwn_id_refTwo.'" style="color:#545454">'.$dwn_title_refTwo.'</a>';

        }
}

?>