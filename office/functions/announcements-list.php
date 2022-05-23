<?php

//get all courses
$getAllAnnouncements = mysqli_query($conn,"SELECT * FROM announcements WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfAnnouncements = mysqli_num_rows($getAllAnnouncements);

if($getCOuntOfAnnouncements == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getAllAnnouncements))
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

        //status show
        if($status == 0)
        {
            $showThisStatus = '<span class="badge badge-success">Public</span>';
        }
        else
        {
            $showThisStatus = '<span class="badge badge-danger">Private</span>';
        }

        echo '
        <tr>
            <td>'.$sl++.'</td>
            <td>#'.$ann_id.'</td>
            <td><b>'.$ann_title.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a class="ann-js-edit" href="announcement-details?annId='.$ann_id.'" id="E'.$ann_id.'" data-action-id="'.$ann_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="ann-js-delete" id="D'.$ann_id.'" data-action-id="'.$ann_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>