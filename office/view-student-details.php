<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-student-all-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Details | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Student Details</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="students-list">Students</a> &nbsp;/ &nbsp;Student Details / <?php echo $getUrlStudentId; ?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-user"></i> Student Details <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php

                                            $checkStudentIdInDbNow = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$getUrlStudentId'");
                                            while($row = mysqli_fetch_array($checkStudentIdInDbNow))
                                            {
                                                $student_id = $row['student_id'];
                                                $student_name = $row['student_name'];
                                                $student_email = $row['student_email'];
                                                $student_number = $row['student_number'];
                                                $date = $row['date'];
                                                $status = $row['status'];
                                                $isDeleted = $row['isDeleted'];
                                                $last_updated = $row['last_updated'];

                                                //get student_access on student
                                                $getStudentAccessOnStudent = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$student_id'");
                                                $getCntOfStudentAccess = mysqli_num_rows($getStudentAccessOnStudent);

                                                if($getCntOfStudentAccess == 0)
                                                {
                                                    //DO NOTHING
                                                    echo 'error';
                                                }
                                                else
                                                {
                                                    while($row = mysqli_fetch_array($getStudentAccessOnStudent))
                                                    {
                                                        $count_login_access = $row['count_login'];
                                                        $last_login_access = $row['last_login'];
                                                        $two_fa_access = $row['two_fa'];
                                                        $otp_for_access = $row['otp_for_access'];
                                                        $verify_state_access = $row['verify_state'];
                                                        $status_access = $row['status'];
                                                    }
                                                

                                                    //status show
                                                    if($verify_state_access == 0)
                                                    {
                                                        $status = '<span class="badge badge-danger">Not Verified</span>';
                                                    }
                                                    else
                                                    {
                                                        $status = '<span class="badge badge-success">Verified</span>';
                                                    }

                                                    echo '
                                                    
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                            <th scope="row">Student Id</th>
                                                            <td>'.$student_id.'</td>
                                                            </tr>
                                                            <tr>
                                                            <th scope="row">Name</th>
                                                            <td>'.$student_name.'</td>
                                                            </tr>
                                                            <tr>
                                                            <th scope="row">Email</th>
                                                            <td>'.$student_email.'</td>
                                                            </tr>
                                                            <tr>
                                                            <tr>
                                                            <th scope="row">Mobile</th>
                                                            <td>'.$student_number.'</td>
                                                            </tr>
                                                            <tr>
                                                            <th scope="row">Student Status</th>
                                                            <td>'.$status.'</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    ';
                                                }
                                            }

                                        ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-book-open"></i> Courses Enrolled <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <a href="student-courses-action?action=addNew&studentId=<?php echo $getUrlStudentId; ?>&enId=<?php echo rand(10000,99999); ?>&studentVerify=true"><b><i class="fa fa-plus"></i> Enroll New Course (Manually)</b></a>
                                        <hr>
                                        <?php

                                            //get courses enrolled
                                            $getCoursesEnrolledNow = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$getUrlStudentId' AND isDeleted='0'");
                                            $checkCountOnCoursesEnrolledNow = mysqli_num_rows($getCoursesEnrolledNow);

                                            if($checkCountOnCoursesEnrolledNow == 0)
                                            {
                                                echo '
                                                <div class="alert alert-warning text-center">
                                                    No Courses Enrolled!
                                                </div>
                                                ';
                                            }
                                            else
                                            {
                                                while($row = mysqli_fetch_array($getCoursesEnrolledNow))
                                                {
                                                    $assign_id_forMenu = $row['assign_id'];
                                                    $student_id_forMenu = $row['student_id'];
                                                    $student_email_forMenu = $row['student_email'];
                                                    $course_tab_id_forMenu = $row['course_tab_id'];
                                                    $course_id_forMenu = $row['course_id'];
                                                    $video_id_forMenu = $row['video_id'];
                                                    $date_forMenu = $row['date'];
                                                    $status_forMenu = $row['status'];
                                                    $isDeleted_forMenu = $row['isDeleted'];
                                                    $last_updated_forMenu = $row['last_updated'];

                                                    //check course details in db
                                                    $checkCourseDetailsInDBThis = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_forMenu'");
                                                    while($row = mysqli_fetch_array($checkCourseDetailsInDBThis))
                                                    {
                                                        $course_id = $row['course_id'];
                                                        $course_name = $row['course_name'];
                                                    }

                                                    //status show
                                                    if($status_forMenu == 0)
                                                    {
                                                        $showStatus = '<span class="badge badge-success"><i class="fa fa-eye"></i> Active</span>';
                                                    }
                                                    else
                                                    {
                                                        $showStatus = '<span class="badge badge-danger"><i class="fa fa-lock"></i> InActive</span>';
                                                    }

                                                    echo '<i class="fa fa-chevron-circle-right"></i> <b>'.$course_name.'</b> :  '.$showStatus.'<br> <div class="mt-3"> [ '.$assign_id_forMenu.' ] <a href="student-courses-action?action=editOne&studentId='.$getUrlStudentId.'&enId='.$assign_id_forMenu.'&studentVerify=true" class="ml-3" href=""><i class="fa fa-edit"></i> Edit</a> <a href="student-courses-action?action=deleteOne&studentId='.$getUrlStudentId.'&enId='.$assign_id_forMenu.'&studentVerify=true" class="ml-4" href=""><i class="fa fa-trash"></i> Delete</a></div><hr>';
                                                }
                                            }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-inr"></i> Payment Transactions <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                    <table id="datatablesSimple" class="text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Txn Date</th>
                                            <th>TxnId</th>
                                            <th>RazorPay PaymentId</th>
                                            <th>Paid Amount</th>
                                            <th>Pay Status</th>
                                            <th>Assign Id</th>
                                            <th>Course</th>
                                            <th>Pay Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            //get transaction
                                            $getPerticularStudentTransactions = mysqli_query($conn,"SELECT * FROM student_txns WHERE student_id='$getUrlStudentId' AND isDeleted='0'");
                                            $checkCountOnPerticularStudentTransactions = mysqli_num_rows($getPerticularStudentTransactions);

                                            if($checkCountOnPerticularStudentTransactions == 0)
                                            {
                                                echo '
                                                <div class="alert alert-warning text-center">
                                                    No Payments!
                                                </div>
                                                ';
                                            }
                                            else
                                            {
                                                $slNO = "1";
                                                while($row = mysqli_fetch_array($getPerticularStudentTransactions))
                                                {
                                                    $student_id_paymentDetails = $row['student_id'];
                                                    $student_email_paymentDetails = $row['student_email'];
                                                    $txn_id_paymentDetails = $row['txn_id'];
                                                    $razorpay_order_id_paymentDetails = $row['razorpay_order_id'];
                                                    $razorpay_payment_id_paymentDetails = $row['razorpay_payment_id'];
                                                    $razorpay_reason_paymentDetails = $row['razorpay_reason'];
                                                    $course_amount_paymentDetails = $row['course_amount'];
                                                    $paid_amount_paymentDetails = $row['paid_amount'];
                                                    $pay_tax_at_paymentDetails = $row['pay_tax_at'];
                                                    $pay_tax_paymentDetails = $row['pay_tax'];
                                                    $pay_discount_paymentDetails = $row['pay_discount'];
                                                    $pay_coupon_paymentDetails = $row['pay_coupon'];
                                                    $pay_total_paymentDetails = $row['pay_total'];
                                                    $course_id_paymentDetails = $row['course_id'];
                                                    $assign_id_paymentDetails = $row['assign_id'];
                                                    $date_paymentDetails = $row['date'];
                                                    $status_paymentDetails = $row['status'];
                                                    $isDeleted_paymentDetails = $row['isDeleted'];
                                                    $last_updated_paymentDetails = $row['last_updated'];

                                                    if($status_paymentDetails == 0)
                                                    {
                                                        $showThisIsAsPaymentStatus = '<span class="badge badge-success">Success</span>';
                                                    }
                                                    else if($status_paymentDetails == 1)
                                                    {
                                                        $showThisIsAsPaymentStatus = '<span class="badge badge-danger">Failed</span>';
                                                    }
                                                    else
                                                    {
                                                        $showThisIsAsPaymentStatus = '<span class="badge badge-success">UnDefined</span>';
                                                    }

                                                    //check course details in db
                                                    $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_paymentDetails'");
                                                    while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                                                    {
                                                        $course_id = $row['course_id'];
                                                        $course_name = $row['course_name'];
                                                    }

                                                    $tooltipHtmlHere = '<br>
                                                    Course Fee : ₹'.number_format($course_amount_paymentDetails,2).'<br>
                                                    Discount ('.$pay_coupon_paymentDetails.') : - ₹'.number_format($pay_discount_paymentDetails,2).'<br>
                                                    Tax ('.$pay_tax_at_paymentDetails.') : ₹'.number_format($pay_tax_paymentDetails,2).'<hr>
                                                    Total Paid : <b>₹'.number_format($paid_amount_paymentDetails,2).'</b><br><br>
                                                    ';

                                                    echo '
                                                    <tr>
                                                        <td>'.$slNO++.'</td>
                                                        <td>'.$last_updated_paymentDetails.'</td>
                                                        <td>'.$txn_id_paymentDetails.'</td>
                                                        <td>'.$razorpay_payment_id_paymentDetails.'</td>
                                                        <td>₹'.number_format($paid_amount_paymentDetails,2).' <a href="#" data-toggle="tooltip" data-html="true" title="'.$tooltipHtmlHere.'"><i class="fa fa-info-circle"></i></a></td>
                                                        <td>'.$showThisIsAsPaymentStatus.'</td>
                                                        <td>'.$assign_id_paymentDetails.'</td>
                                                        <td>'.$course_name.'</td>
                                                        <td>'.$razorpay_reason_paymentDetails.'</td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                        ?>
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               <script>
                $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip({html:true});   
                });
                </script>
               
