<?php

error_reporting(0);

include('./config.php');

$ann_id = mysqli_real_escape_string($conn,$_GET['ann_id']);

if(empty($ann_id) && $ann_id)
{
    header('location:./all-announcements');
}
else
{
    //check annid in database
    $searchInDb = mysqli_query($conn,"SELECT * FROM announcements WHERE status='0' AND ann_id='$ann_id' AND isDeleted='0'");
    $getCountOfList = mysqli_num_rows($searchInDb);

    if($getCountOfList == 0)
    {
        header('location:./all-announcements');
    }
    else
    {
        while($row = mysqli_fetch_array($searchInDb))
        {
            $ann_id = $row['ann_id'];
            $ann_title = $row['ann_title'];
            $ann_date = $row['ann_date'];
            $ann_by = $row['ann_by'];
            $ann_desc = $row['ann_desc'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $date = $row['date'];
        }
    }

    //selectfirstrandpost
    $getRandOnePost = mysqli_query($conn,"SELECT * FROM announcements WHERE isDeleted='0' AND ann_id<>'$ann_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandOnePost))
        {
            $ann_id_refOne = $row['ann_id'];
            $ann_title_refOne = $row['ann_title'];

            $showThisAsRefOne = '<a href="'.$baseURL.'announcement-view?ann_id='.$ann_id_refOne.'" style="color:#545454">'.$ann_title_refOne.'</a>';

        }


        //selectsecondrandpost
    $getRandTwoPost = mysqli_query($conn,"SELECT * FROM announcements WHERE isDeleted='0' AND ann_id<>'$ann_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandTwoPost))
        {
            $ann_id_refTwo = $row['ann_id'];
            $ann_title_refTwo = $row['ann_title'];

            $showThisAsRefTwo = '<a href="'.$baseURL.'announcement-view?ann_id='.$ann_id_refTwo.'" style="color:#545454">'.$ann_title_refTwo.'</a>';

        }
}

?>