<?php

                //get Subjects as per the papers
                $getSubjectsOnPayments = mysqli_query($conn,"SELECT * FROM student_txns WHERE course_id='$course_id_CourseDashboard' AND assign_id='$assigned_assign_id' AND student_id='$student_id_session' AND isDeleted='0' ORDER BY id DESC");
                $getCountSubjectsOnPayments = mysqli_num_rows($getSubjectsOnPayments);

                if($getCountSubjectsOnPayments == 0)
                {
                    echo '
                        <div class="alert alert-warning " role="alert">
                            <b>No Payments Found On This Course!</b>
                        </div>
                        ';
                }
                else
                {
                    while($row = mysqli_fetch_array($getSubjectsOnPayments))
                    {
                        $id_onPayments = $row['id'];
                        $student_id_onPayments = $row['student_id'];
                        $student_email_onPayments = $row['student_email'];
                        $txn_id_onPayments = $row['txn_id'];
                        $paid_amount_onPayments = $row['paid_amount'];
                        $razorpay_order_id_onPayments = $row['razorpay_order_id'];
                        $razorpay_payment_id_onPayments = $row['razorpay_payment_id'];
                        $razorpay_reason_onPayments = $row['razorpay_reason'];
                        $course_id_onPayments = $row['course_id'];
                        $assign_id_onPayments = $row['assign_id'];
                        $date_onPayments = $row['date'];
                        $status_onPayments = $row['status'];
                        $isDeleted_onPayments = $row['isDeleted'];
                        $last_updated_onPayments = $row['last_updated'];

                        echo '
                        <div class="col-md-12 col-lg-12">
                        <div class="card mb-3 rounded" style="border:1px solid black">
                            <div class="card-header" id="headingOne'.$id_onPayments.'">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$id_onPayments.'" aria-expanded="true" aria-controls="collapse'.$id_onPayments.'">
                                <b>'.$txn_id_onPayments.'</b> ( '.$date_onPayments.' ) 
                                </button>
                            </h2>
                            </div>
                            <div id="collapse'.$id_onPayments.'" class="collapse" aria-labelledby="headingOne'.$id_onPayments.'" data-parent="#accordionCoursePrelims">
                            <div class="card-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                <th scope="col">Txn. ID</th>
                                <th scope="row">'.$txn_id_onPayments.'</th>
                                </tr>
                                <tr>
                                <th scope="col">Total amount</th>
                                <td>₹ '.number_format($paid_amount_onPayments,2).'</td>
                                </tr>
                                <tr>
                                <th scope="col">Pay Via</th>
                                <td>Razorpay</td>
                                </tr>
                                <tr>
                                <th scope="col">Payment Txn Id</th>
                                <td>'.$razorpay_payment_id_onPayments.'</td>
                                </tr>
                                <tr>
                                <th scope="col">Order id</th>
                                <td>'.$razorpay_order_id_onPayments.'</td>
                                </tr>
                                <tr>
                                <th scope="col">Assign Id</th>
                                <td>'.$assign_id_onPayments.'</td>
                                </tr>
                                <tr>
                                <th scope="col">Date & Time</th>
                                <td>'.$date_onPayments.'</td>
                                </tr>
                                <tr>
                                <th scope="col">Payment Status</th>
                                <td>'.$razorpay_reason_onPayments.'</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                        </div>
                        ';
                    }
                }
            ?>