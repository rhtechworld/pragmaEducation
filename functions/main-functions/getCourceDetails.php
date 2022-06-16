<?php

$course_id_url = mysqli_real_escape_string($conn,$_GET['course_id']);

if(empty($course_id_url) && $course_id_url)
{
    header('location:./courses');
}
else
{
    //check coursein db
    $checkCourseInDb = mysqli_query($conn,"SELECT * FROM course_details WHERE  course_id='$course_id_url' AND isDeleted='0'");
    $getCuntOfCourseInDb = mysqli_num_rows($checkCourseInDb);

    if($getCuntOfCourseInDb == 0)
    {
        header('location:./courses');
    }
    else
    {
        while($row = mysqli_fetch_array($checkCourseInDb))
        {
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $course_desc = $row['course_desc'];
            $course_price = $row['course_price'];
            $view_schedule_link = $row['view_schedule_link'];
            $date = $row['date'];
            $last_updated = $row['last_updated'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];


            //get erlybird offer
            $getErlyBirdOffer = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE course_id='$course_id' AND isDeleted='0' AND status='0'");
            $getCountOfErlyBirdOffer = mysqli_num_rows($getErlyBirdOffer);
            
            if($getCountOfErlyBirdOffer == 0)
            {
                $OfferPricingDetails = '
                        <div class="course-info d-flex ustify-content-center">
                            <p><a href="#">'.$course_name.'</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Course Fee</h5>
                            <p>₹'.number_format($course_price,2).'</p>
                        </div>

                        <div class="course-info d-flex justify-content-center">
                            <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$baseURL.'login?action=subscribe&id='.$course_id.'">Subscribe Now</a>
                        </div>

                        <div class="course-info d-flex justify-content-center">
                            <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$view_schedule_link.'" target="_blank">View Schedule</a>
                        </div>
                ';

                $navTabPricingDetails = '
                
                <tbody>
                    <tr>
                        <th scope="row">Course Fee</th>
                        <td>₹'.number_format($course_price,2).'</td>
                    </tr>
                    <tr>
                        <th>
                        <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$baseURL.'login?action=subscribe&id='.$course_id.'">Subscribe Now</a>
                        </th>
                        <td>
                        <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$view_schedule_link.'" target="_blank">View Schedule</a>
                        </td>
                    </tr>
                </tbody>

                ';
            }
            else
            {
                while($row = mysqli_fetch_array($getErlyBirdOffer))
                {
                    $offer_id = $row['offer_id'];
                    $offer_name = $row['offer_name'];
                    $offer_at = $row['offer_at'];
                    $status = $row['status'];
                    $date = $row['date'];
                    $isDeleted = $row['isDeleted'];
                    $last_updated = $row['last_updated'];

                    $discountAmountNow = $course_price * $offer_at / 100;
                    $finalPayNowAsperCals = $course_price - $discountAmountNow;
                }


                $OfferPricingDetails = '
                        <div class="course-info d-flex justify-content-center">
                            <p><a href="#">'.$course_name.'</a></p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Course Fee</h5>
                            <p>₹'.number_format($course_price,2).'</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>'.$offer_name.' ('.$offer_at.'%)</h5>
                            <p>- ₹'.number_format($discountAmountNow,2).'</p>
                        </div>

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Enroll Course @</h5>
                            <p><b>₹'.number_format($finalPayNowAsperCals,2).'</b></p>
                        </div>

                        <div class="course-info d-flex justify-content-center">
                            <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$baseURL.'login?action=subscribe&id='.$course_id.'">Subscribe Now</a>
                        </div>

                        <div class="course-info d-flex justify-content-center">
                            <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$view_schedule_link.'" target="_blank">View Schedule</a>
                        </div>
                ';


                $navTabPricingDetails = '
                
                <tbody>
                    <tr>
                        <th scope="row">Course Fee</th>
                        <td>₹'.number_format($course_price,2).'</td>
                    </tr>
                    <tr>
                        <th scope="row">'.$offer_name.' ('.$offer_at.'%)</th>
                        <td>- ₹'.number_format($discountAmountNow,2).'</td>
                    </tr>
                    <tr>
                        <th scope="row">Final @ </th>
                        <td><b>₹'.number_format($finalPayNowAsperCals,2).'</b></td>
                    </tr>
                    <tr>
                        <th>
                        <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$baseURL.'login?action=subscribe&id='.$course_id.'">Subscribe Now</a>
                        </th>
                        <td>
                        <a class="btn btn-primary newButtonEffect" style="color:white" href="'.$view_schedule_link.'" target="_blank">View Schedule</a>
                        </td>
                    </tr>
                </tbody>

                ';
            }
        }
    }
}
?>