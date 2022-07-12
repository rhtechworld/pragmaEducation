<?php

include('./config.php');

//get course tabs from db

$sqlGetCurrentAf = mysqli_query($conn,"SELECT * FROM current_affairs WHERE status='0' AND isDeleted='0' ORDER BY id DESC");

$getCountsqlGetCurrentAf = mysqli_num_rows($sqlGetCurrentAf);

if($getCountsqlGetCurrentAf == 0)
{
    echo '<g class="text-center">No Current Affairs...</g>';
}
else
{
    while($row = mysqli_fetch_array($sqlGetCurrentAf))
    {
        $ca_id = $row['ca_id'];
        $ca_title = $row['ca_title'];
        $ca_desc = $row['ca_desc'];
        $ca_link = $row['ca_link'];
        $ca_date = $row['ca_date'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        echo
        '
        <b><g style="font-size:12px;color:#C5C5C5">'.$last_updated.'</g><br><i class="bi bi-star-fill" style="color:#E61F26;font-size:14px"></i></b> <a href="'.$baseURL.'current-affair-view?ca_id='.$ca_id.'" style="color:black">'.$ca_title.'</a><hr>

        ';
    }
}

?>