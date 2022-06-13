<?php

//get all courses
$getToppersList = mysqli_query($conn,"SELECT * FROM toppers WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfToppers = mysqli_num_rows($getToppersList);

if($getCOuntOfToppers == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getToppersList))
    {
        $tpr_id = $row['tpr_id'];
        $tpr_title = $row['tpr_title'];
        $tpr_date = $row['tpr_date'];
        $tpr_desc = $row['tpr_desc'];
        $tpr_link = $row['tpr_link'];
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
            <td>#'.$tpr_id.'</td>
            <td><b>'.$tpr_title.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="display-toppers-actions?action=editOne&tpr_id='.$tpr_id.'&actionTaken=true" data-action-id="'.$tpr_id.'"><i class="fa fa-edit"></i></a> <a href="display-toppers-actions?action=deleteOne&tpr_id='.$tpr_id.'&actionTaken=true"  id="D'.$tpr_id.'" data-action-id="'.$tpr_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>