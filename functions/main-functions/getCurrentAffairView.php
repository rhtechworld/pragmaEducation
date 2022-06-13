<?php

error_reporting(0);

include('./config.php');

$ca_id = mysqli_real_escape_string($conn,$_GET['ca_id']);

if(empty($ca_id))
{
    header('location:./current-affairs');
}
else
{
    //check annid in database
    $searchInDb = mysqli_query($conn,"SELECT * FROM current_affairs WHERE status='0' AND ca_id='$ca_id' AND isDeleted='0'");
    $getCountOfList = mysqli_num_rows($searchInDb);

    if($getCountOfList == 0)
    {
        header('location:./current-affairs');
    }
    else
    {
        while($row = mysqli_fetch_array($searchInDb))
        {
            $ca_id = $row['ca_id'];
            $ca_title = $row['ca_title'];
            $ca_desc = $row['ca_desc'];
            $ca_link = $row['ca_link'];
            $ca_date = $row['ca_date'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];
        }
    }

    //selectfirstrandpost
    $getRandOnePost = mysqli_query($conn,"SELECT * FROM current_affairs WHERE status='0' AND isDeleted='0' AND ca_id<>'$ca_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandOnePost))
        {
            $ca_id_refOne = $row['ca_id'];
            $ca_title_refOne = $row['ca_title'];

            $showThisAsRefOne = '<a href="'.$baseURL.'current-affair-view?ca_id='.$ca_id_refOne.'" style="color:#545454">'.$ca_title_refOne.'</a>';

        }


        //selectsecondrandpost
    $getRandTwoPost = mysqli_query($conn,"SELECT * FROM current_affairs WHERE status='0' AND isDeleted='0' AND ca_id<>'$ca_id' ORDER BY RAND() LIMIT 1");
    while($row = mysqli_fetch_array($getRandTwoPost))
        {
            $ca_id_refTwo = $row['ca_id'];
            $ca_title_refTwo = $row['ca_title'];

            $showThisAsRefTwo = '<a href="'.$baseURL.'current-affair-view?ca_id='.$ca_id_refTwo.'" style="color:#545454">'.$ca_title_refTwo.'</a>';

        }
}

?>