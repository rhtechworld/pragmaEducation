<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>All Courses | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    
    <main id="main">

        <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
            <h4 style="font-size:20px"><span>All </span> Courses </h4>
        </div>

        <div class="container mb-4">
            <div class="row mt-2">
                <?php 
                
                //getcoursesby course id
        $getCoursesByListId = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0' AND status='0'");
        $getCOuntOfCourses = mysqli_num_rows($getCoursesByListId);

        if($getCOuntOfCourses == 0)
                {
                    echo '<div class="alert alert-warning text-center">
                            No Courses Found On CheckList!
                            </div>';
                }
                else
                {
                    while($row = mysqli_fetch_array($getCoursesByListId))
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
                            $dbCoureseTabName = $row['course_tab_name'];
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
                            $finalPriceToPay = $course_price;
                            $cutOffPriceToShow = '';
                            $discountAlertShow = '';
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
                            $cutOffPriceToShow = '<small><s>₹'.number_format($course_price).'</s></small>';

                            $discountAlertShow = '<div class="alert alert-success"> '.$offer_name.' @ '.$offer_at.'%</div>';
                        } 


                        if($course_price == 0 || $course_price == '' || $course_price == null)
                        {
                            $thenShowCoursePrice = "<b>FREE</b>";
                        }
                        else
                        {
                            $thenShowCoursePrice = "".$cutOffPriceToShow." ₹".number_format($finalPriceToPay,2)."";
                        }

                        //check enrolled or not
                        $checkCourseEnrolledment = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$student_id_session' AND course_id='$course_id' AND isDeleted='0' AND status='0'");
                        $getCountOnAssignedMent = mysqli_num_rows($checkCourseEnrolledment);

                        if($getCountOnAssignedMent == 0)
                        {
                            $giveAccessToEnrollCourse = '<a href="enroll-course?cid='.$course_id.'" class="btn btn-primary btn-sm">Enroll Now</a>';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($checkCourseEnrolledment))
                            {
                                $assign_id = $row['assign_id'];
                            }

                            $giveAccessToEnrollCourse = '
                            <a class="btn btn-success btn-sm newButtonEffect" name="actionAccessCourse" href="course-dashboard?course_id='.$course_id.'&assign_id='.$assign_id.'&verifyenrolled=true&accessCourse=true">Access Course</a>
                            ';
                        }

                        echo '
                            <div class="mb-2 col-md-4 col-lg-4 p-2 text-center my-auto">
                                <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                    <b class="mt-2 mb-2" style="font-size:19px">'.$course_name.'</b>
                                    '.$discountAlertShow.'
                                    <hr style="margin:0">
                                    <div class="row my-auto">
                                        <div class="col-md-6 col-lg-6 text-center mt-2 mb-1 my-auto">
                                        <b>'.$thenShowCoursePrice.'</b>
                                        </div>
                                        <div class="col-md-6 col-lg-6 text-center mt-2 mb-1 my-auto">
                                            '.$giveAccessToEnrollCourse.'
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    
        
                    }
                }

                ?>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>