<?php

//get all courses
$getDownloadsList = mysqli_query($conn,"SELECT * FROM downloads WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfDownloads = mysqli_num_rows($getDownloadsList);

if($getCOuntOfDownloads == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getDownloadsList))
    {
        $dwn_id = $row['dwn_id'];
        $dwn_title = $row['dwn_title'];
        $dwn_desc = $row['dwn_desc'];
        $dwn_link = $row['dwn_link'];
        $dwn_date = $row['dwn_date'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        //status show
        if($status == 0)
        {
            $showThisStatus = '<span class="badge badge-success">Active</span>';
        }
        else
        {
            $showThisStatus = '<span class="badge badge-danger">InActive</span>';
        }

        echo '
        <tr>
            <td>'.$sl++.'</td>
            <td>#'.$dwn_id.'</td>
            <td><b>'.$dwn_title.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="display-downloads-actions?action=editOne&dwn_id='.$dwn_id.'&actionTaken=true" data-action-id="'.$dwn_id.'"><i class="fa fa-edit"></i></a> <a href="display-downloads-actions?action=deleteOne&dwn_id='.$dwn_id.'&actionTaken=true"  id="D'.$dwn_id.'" data-action-id="'.$dwn_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>