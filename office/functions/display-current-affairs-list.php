<?php

//get all courses
$getcurrent_affairs = mysqli_query($conn,"SELECT * FROM current_affairs WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfcurrent_affairs = mysqli_num_rows($getcurrent_affairs);

if($getCOuntOfcurrent_affairs == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getcurrent_affairs))
    {
            $ca_id = $row['ca_id'];
            $ca_title = $row['ca_title'];
            $ca_desc = $row['ca_desc'];
            $ca_link = $row['ca_link'];
            $ca_date = $row['ca_date'];
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
            <td>#'.$ca_id.'</td>
            <td><b>'.$ca_title.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="display-current-affairs-actions?action=editOne&ca_id='.$ca_id.'&actionTaken=true" data-action-id="'.$ca_id.'"><i class="fa fa-edit"></i></a> <a href="display-current-affairs-actions?action=deleteOne&ca_id='.$ca_id.'&actionTaken=true"  id="D'.$ca_id.'" data-action-id="'.$ca_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>