<?php

$sqlGetAnnouncements = mysqli_query($conn,"SELECT * FROM announcements WHERE status='0' AND isDeleted='0' ORDER BY id DESC");

$getCountsqlGetAnnouncements = mysqli_num_rows($sqlGetAnnouncements);

if($getCountsqlGetAnnouncements == 0)
{
    echo '<g class="text-center">No Announcements...</g>';
}
else
{
    while($row = mysqli_fetch_array($sqlGetAnnouncements))
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

        echo
        '
        <b><g style="font-size:12px;color:#C5C5C5">'.$last_updated.'</g><br></b><a href="announcement-view?ann_id='.$ann_id.'" style="color:black"><i class="fa fa-arrow-circle-right"></i> '.$ann_title.'</a><hr>

        ';
    }
}

?>