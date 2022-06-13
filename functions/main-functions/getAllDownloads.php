<?php

include('./config.php');

//get course tabs from db

$sqlGetDownloads = mysqli_query($conn,"SELECT * FROM downloads WHERE status='0' AND isDeleted='0' ORDER BY id DESC");

$getCountsqlGetDownloads = mysqli_num_rows($sqlGetDownloads);

if($getCountsqlGetDownloads == 0)
{
    echo '<g class="text-center">No Downloads...</g>';
}
else
{
    while($row = mysqli_fetch_array($sqlGetDownloads))
    {
        $dwn_id = $row['dwn_id'];
        $dwn_title = $row['dwn_title'];
        $dwn_desc = $row['dwn_desc'];
        $dwn_link = $row['dwn_link'];
        $dwn_date = $row['dwn_date'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        echo
        '
        <b><i class="bi bi-file-pdf" style="color:#E61F26;font-size:14px"></i></b> <a href="'.$baseURL.'download-view?dwn_id='.$dwn_id.'" style="color:black">'.$dwn_title.'</a><hr>

        ';
    }
}

?>