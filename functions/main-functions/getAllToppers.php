<?php

include('./config.php');

//get course tabs from db

$sqlGettoppers = mysqli_query($conn,"SELECT * FROM toppers WHERE isDeleted='0' ORDER BY id DESC");

$getCountsqlGettoppers = mysqli_num_rows($sqlGettoppers);

if($getCountsqlGettoppers == 0)
{
    echo '<g class="text-center">No Details...</g>';
}
else
{
    while($row = mysqli_fetch_array($sqlGettoppers))
    {
        $tpr_id = $row['tpr_id'];
        $tpr_title = $row['tpr_title'];
        $tpr_date = $row['tpr_date'];
        $tpr_desc = $row['tpr_desc'];
        $tpr_link = $row['tpr_link'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        echo
        '
        <b><i class="bi bi-star-fill" style="color:#E61F26;font-size:14px"></i></b> <a href="'.$baseURL.'topper-view?tpr_id='.$tpr_id.'" style="color:black">'.$tpr_title.'</a><hr>

        ';
    }
}

?>