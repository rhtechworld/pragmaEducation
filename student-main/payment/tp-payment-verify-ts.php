<?php

error_reporting(0);

include('../../config.php');

session_start();


    $newTransId = $_SESSION['assign_new_txn_id'];
    $student_id_session = $_SESSION['assign_student_id'];
    $student_email_session = $_SESSION['assign_student_email'];
    $assign_ts_id = $_SESSION['assign_ts_id'];
    $course_id = $_SESSION['assign_course_id'];
    $rz_oid = $_GET['razorpay_order_id'];
    $rz_payAmount = $_GET['razorpay_paid_amount'];
    $rz_payid = $_GET['razorpay_payment_id'];
    $courseOriginalAmount = $_SESSION['course_amount_basic'];

    //tax and otther details
    $stuTrxn_pay_tax_at = $_SESSION['stuTrxn_pay_tax_at'];
    $stuTrxn_pay_tax = $_SESSION['stuTrxn_pay_tax'];
    $stuTrxn_pay_discount = $_SESSION['stuTrxn_pay_discount'];
    $stuTrxn_pay_coupon = $_SESSION['stuTrxn_pay_coupon'];
    $stuTrxn_pay_total = $_SESSION['stuTrxn_pay_total'];

    //tax details for diff save
    $taxAtOnThisPayment = $_SESSION['taxAtOnThisPayment'];
    $taxAtAmountThisPayment = $_SESSION['taxAtAmountThisPayment'];

    $offerOnThisPayment = $_SESSION['offerOnThisPayment'];
    $offerAmountThisPayment = $_SESSION['offerAmountThisPayment'];

    //new assign Id
    //new assign Id
    $enrollId = $_GET['enrollId'];

    $success = $_GET['status'];

$error = "Payment Failed";

if ($success == 'true')
{
    
    //insert Transaction
    $insertIntoTxns = mysqli_query($conn,"INSERT INTO student_txns(student_id, student_email, txn_id, razorpay_order_id, razorpay_payment_id, razorpay_reason, course_amount, paid_amount, pay_tax_at, pay_tax, pay_discount, pay_coupon, pay_total, course_id, assign_id, date, status, isDeleted, last_updated)
    VALUES('$student_id_session','$student_email_session','$newTransId','$rz_oid','$rz_payid','Payment Success','$courseOriginalAmount','$rz_payAmount','$stuTrxn_pay_tax_at','$stuTrxn_pay_tax','$stuTrxn_pay_discount','$stuTrxn_pay_coupon','$stuTrxn_pay_total','$course_id','$enrollId','$todayDate','0','0','$lastUpdated')");

    //insert txn details now
    $insertTxndetailsNow = mysqli_query($conn,"INSERT INTO pay_txn_details(txn_id, student_id, rz_payid, rz_order, course_amount, sub_total, tax_at, tax_amt, discount_at, discount_amt, total_paid, rz_reason, date_time, status)
    VALUES('$newTransId','$student_id_session','$rz_payid','$rz_oid','$courseOriginalAmount','$courseOriginalAmount','$taxAtOnThisPayment','$taxAtAmountThisPayment','$offerOnThisPayment','$offerAmountThisPayment','$rz_payAmount','Payment Success','$lastUpdated','0')");

    //insert into ASSIGN details
    $assignCourseNow = mysqli_query($conn,"INSERT INTO test_series_assigned(ts_assigned_id, ts_id, course_id, student_id, student_email, status, isDeleted, date, last_updated)
    VALUES('$enrollId','$assign_ts_id','$course_id','$student_id_session','$student_email_session','0','0','$todayDate','$lastUpdated')");

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    //unsetting payment sessions
    unset($_SESSION['assign_student_id']);
    unset($_SESSION['assign_student_email']);
    unset($_SESSION['assign_ts_id']);
    unset($_SESSION['assign_course_id']);

    $_SESSION['final_pay_status'] = "success";

    header('location:../pay-status?pay=valid');
}
else
{

    //insert Transaction
    $insertIntoTxns = mysqli_query($conn,"INSERT INTO student_txns(student_id, student_email, txn_id, razorpay_order_id, razorpay_payment_id, razorpay_reason, course_amount, paid_amount, pay_tax_at, pay_tax, pay_discount, pay_coupon, pay_total, course_id, assign_id, date, status, isDeleted, last_updated)
    VALUES('$student_id_session','$student_email_session','$newTransId','$rz_oid','$rz_payid','$error','$courseOriginalAmount','$rz_payAmount','$stuTrxn_pay_tax_at','$stuTrxn_pay_tax','$stuTrxn_pay_discount','$stuTrxn_pay_coupon','$stuTrxn_pay_total','$course_id','$enrollId','$todayDate','1','0','$lastUpdated')");

    //insert txn details now
    $insertTxndetailsNow = mysqli_query($conn,"INSERT INTO pay_txn_details(txn_id, student_id, rz_payid, rz_order, course_amount, sub_total, tax_at, tax_amt, discount_at, discount_amt, total_paid, rz_reason, date_time, status)
    VALUES('$newTransId','$student_id_session','$rz_payid','$rz_oid','$courseOriginalAmount','$courseOriginalAmount','$taxAtOnThisPayment','$taxAtAmountThisPayment','$offerOnThisPayment','$offerAmountThisPayment','$rz_payAmount','$error','$lastUpdated','1')");

    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";

     //unsetting payment sessions
     unset($_SESSION['assign_student_id']);
     unset($_SESSION['assign_student_email']);
     unset($_SESSION['assign_ts_id']);
     unset($_SESSION['assign_course_id']);

    $_SESSION['final_pay_status'] = "failed";

    header('location:../pay-status?pay=invalid');
}

