<?php

//get all Offers
$getAllOffers = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfOffers = mysqli_num_rows($getAllOffers);

if($getCOuntOfOffers == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getAllOffers))
    {
        $course_id = $row['course_id'];
        $offer_id = $row['offer_id'];
        $offer_name = $row['offer_name'];
        $offer_at = $row['offer_at'];
        $status = $row['status'];
        $date = $row['date'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        //get CourseName on Offer
        $getCOureseNameOnOffer = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id'");
        $getCntOfCourseName = mysqli_num_rows($getCOureseNameOnOffer);

        if($getCntOfCourseName == 0)
        {
            //DO NOTHING
        }
        else
        {
            while($row = mysqli_fetch_array($getCOureseNameOnOffer))
            {
                $dbcourse_name = $row['course_name'];
            }
        }

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
            <td><b>'.$offer_name.'</b></td>
            <td>'.$offer_at.'%</td>
            <td><b>'.$dbcourse_name.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="#" class="offer-js-edit" id="E'.$offer_id.'" data-action-id="'.$offer_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="offer-js-delete" id="D'.$offer_id.'" data-action-id="'.$offer_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>