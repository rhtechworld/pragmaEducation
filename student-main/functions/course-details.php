<?php

$urlCourseIdOnGet = mysqli_real_escape_string($conn, $_GET['cid']);

    $gettingCourseOnGet = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$urlCourseIdOnGet' AND isDeleted='0' AND status='0'");
    $checkCOuntOnsOnGet = mysqli_num_rows($gettingCourseOnGet);

    if($checkCOuntOnsOnGet == 0)
    {
        echo '<script>alert("Somthing missing! Try again!")</script>';
        header('location:all-courses');
    }
    else
    {
        //get Courese  on courese
        while($row = mysqli_fetch_array($gettingCourseOnGet))
        {

            $course_tab_id = $row['course_tab_id'];
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $date = $row['date'];
            $last_updated = $row['last_updated'];

            //get Courese tab on courese
            $getCOureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id'");
            while($row = mysqli_fetch_array($getCOureseTabOnCourse))
            {
                $course_tab_id = $row['course_tab_id'];
                $course_tab_name = $row['course_tab_name'];
                $status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $date = $row['date'];
                $last_updated = $row['last_updated'];
            }


            //course details
            $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id'");
            while($row = mysqli_fetch_array($checkCourseDetailsInDB))
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
            }

            //get all Offers
            $getAllOffers = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE course_id='$course_id' AND isDeleted='0' AND status='0'");
            $getCOuntOfOffers = mysqli_num_rows($getAllOffers);

            if($getCOuntOfOffers == 0)
            {
                //do nothing
                $addOfferHere = 0;
                $finalPriceToPay = $course_price;
            }
            else
            {
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
                }

                //getFinalPrice
                $addOfferHere = $course_price * $offer_at / 100;
                $finalPriceToPay = $course_price - $addOfferHere;

            } 

            //get tax detailsNow
            $getTaxDetailsOfPayment = mysqli_query($conn,"SELECT * FROM tax_details WHERE tax_id='160714733045' AND status='1' AND isDeleted='0'");
            $CountOngetTaxDetailsOfPayment = mysqli_num_rows($getTaxDetailsOfPayment);

            if($CountOngetTaxDetailsOfPayment == 0)
            {
                //if tax disbaled
                $taxEnabled = false;
                $calsi_TaxNow = 0;
                $database_tax_nameNew = '-';
                $database_tax_at = 0;
                $AfterTaxFinalPriceIsThisToPay = $finalPriceToPay;
            }
            else
            {
                $taxEnabled = true;
                //if tax enabled
                while($row = mysqli_fetch_array($getTaxDetailsOfPayment))
                {
                    $database_tax_name = $row['tax_name'];
                    $database_tax_at = $row['tax_at'];
                }

                $database_tax_nameNew = ''.$database_tax_name.'@'.$database_tax_at.'%';
                $calsi_TaxNow = $finalPriceToPay * $database_tax_at / 100;
                $AfterTaxFinalPriceIsThisToPay = $finalPriceToPay + $calsi_TaxNow;

            }

            
            //check enrolled or not
            $checkCourseEnrolledment = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$student_id_session' AND course_id='$course_id' AND isDeleted='0' AND status='0'");
            $getCountOnAssignedMent = mysqli_num_rows($checkCourseEnrolledment);

            if($getCountOnAssignedMent == 0)
            {
                //do nothing
            }
            else
            {
                echo '<script>alert("Already Enrolled, Thanks")</script>';
                header('location:enrolled-courses');
            }
            
        }
    }

?>