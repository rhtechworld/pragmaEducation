<?php

                                            //get last 10 trasactions
                                            $getTxnsOnDashboard = mysqli_query($conn,"SELECT * FROM student_txns WHERE isDeleted='0' ORDER BY id DESC LIMIT 10");
                                            $getCOuntOngetTxnsOnDashboard = mysqli_num_rows($getTxnsOnDashboard);

                                            if($getCOuntOngetTxnsOnDashboard == 0)
                                            {
                                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">No Data Found</div>';
                                            }
                                            else
                                            {
                                                $slNO = "1";
                                                while($row = mysqli_fetch_array($getTxnsOnDashboard))
                                                {
                                                    $student_id_paymentDetails = $row['student_id'];
                                                    $student_email_paymentDetails = $row['student_email'];
                                                    $txn_id_paymentDetails = $row['txn_id'];
                                                    $razorpay_order_id_paymentDetails = $row['razorpay_order_id'];
                                                    $razorpay_payment_id_paymentDetails = $row['razorpay_payment_id'];
                                                    $razorpay_reason_paymentDetails = $row['razorpay_reason'];
                                                    $paid_amount_paymentDetails = $row['paid_amount'];
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

                                                    echo '
                                                    <tr>
                                                        <td>'.$slNO++.'</td>
                                                        <td>'.$last_updated_paymentDetails.'</td>
                                                        <td>'.$txn_id_paymentDetails.'</td>
                                                        <td>'.$razorpay_payment_id_paymentDetails.'</td>
                                                        <td>'.$student_email_paymentDetails.'</td>
                                                        <td>₹'.number_format($paid_amount_paymentDetails,2).'</td>
                                                        <td>'.$showThisIsAsPaymentStatus.'</td>
                                                        <td>'.$assign_id_paymentDetails.'</td>
                                                        <td>'.$course_name.'</td>
                                                    </tr>
                                                    ';
                                                }
                                            }
                                        ?>