<?php

include('./config.php');

//get course tabs from db

$sqlGetAnnouncements = mysqli_query($conn,"SELECT * FROM announcements WHERE isDeleted='0' ORDER BY id DESC");

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

        echo
        '
        <b><i class="bi bi-bell-fill" style="color:#E61F26;font-size:14px"></i></b> <a href="'.$baseURL.'announcement-view?ann_id='.$ann_id.'" style="color:black">'.$ann_title.'</a><hr>

        ';
    }
}

?>