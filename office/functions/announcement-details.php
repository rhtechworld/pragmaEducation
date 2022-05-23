<?php

$getAnnId =  mysqli_real_escape_string($conn,$_GET['annId']);

//check Ann details in db
$checkAnnDetailsInDB = mysqli_query($conn,"SELECT * FROM announcements WHERE ann_id='$getAnnId'");
$getCountOfDetails = mysqli_num_rows($checkAnnDetailsInDB);

if($getCountOfDetails == 0)
{
    header('location:announcements');
}
else
{
    while($row = mysqli_fetch_array($checkAnnDetailsInDB))
    {
        $ann_id = $row['ann_id'];
        $ann_title = $row['ann_title'];
        $ann_date = $row['ann_date'];
        $ann_by = $row['ann_by'];
        $ann_desc = $row['ann_desc'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $date = $row['date'];
        $last_updated = $row['last_updated'];

        if($status == 0)
        {
            $statusNameShow = "Public";
        }
        else
        {
            $statusNameShow = "Private";
        }


    }

}


?>