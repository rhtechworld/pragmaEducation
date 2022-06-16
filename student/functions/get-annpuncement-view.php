<?php

error_reporting(0);

include('./config.php');

$ann_id = mysqli_real_escape_string($conn,$_GET['ann_id']);

if(empty($ann_id) && $ann_id)
{
    header('location:./announcements');
}
else
{
    //check annid in database
    $searchInDb = mysqli_query($conn,"SELECT * FROM announcements WHERE status='0' AND ann_id='$ann_id' AND isDeleted='0'");
    $getCountOfList = mysqli_num_rows($searchInDb);

    if($getCountOfList == 0)
    {
        header('location:./announcements');
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
            $last_updated = $row['date'];
        }
    }

}

?>