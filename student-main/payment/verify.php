<?php

error_reporting(0);

include('../../config.php');

require('config.php');

session_start();


    $newTransId = $_SESSION['assign_new_txn_id'];
    $student_id_session = $_SESSION['assign_student_id'];
    $student_email_session = $_SESSION['assign_student_email'];
    $course_tab_id = $_SESSION['assign_course_tab_id'];
    $course_id = $_SESSION['assign_course_id'];
    $rz_oid = $_SESSION['razorpay_order_id'];
    $rz_payAmount = $_SESSION['razorpay_paid_amount'];
    $rz_payid = $_POST['razorpay_payment_id'];
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
    $enrollId = "EP".rand(100000000000,999999999999)."";


require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    
    //insert Transaction
    $insertIntoTxns = mysqli_query($conn,"INSERT INTO student_txns(student_id, student_email, txn_id, razorpay_order_id, razorpay_payment_id, razorpay_reason, course_amount, paid_amount, pay_tax_at, pay_tax, pay_discount, pay_coupon, pay_total, course_id, assign_id, date, status, isDeleted, last_updated)
    VALUES('$student_id_session','$student_email_session','$newTransId','$rz_oid','$rz_payid','Payment Success','$courseOriginalAmount','$rz_payAmount','$stuTrxn_pay_tax_at','$stuTrxn_pay_tax','$stuTrxn_pay_discount','$stuTrxn_pay_coupon','$stuTrxn_pay_total','$course_id','$enrollId','$todayDate','0','0','$lastUpdated')");

    //insert txn details now
    $insertTxndetailsNow = mysqli_query($conn,"INSERT INTO pay_txn_details(txn_id, student_id, rz_payid, rz_order, course_amount, sub_total, tax_at, tax_amt, discount_at, discount_amt, total_paid, rz_reason, date_time, status)
    VALUES('$newTransId','$student_id_session','$rz_payid','$rz_oid','$courseOriginalAmount','$courseOriginalAmount','$taxAtOnThisPayment','$taxAtAmountThisPayment','$offerOnThisPayment','$offerAmountThisPayment','$rz_payAmount','Payment Success','$lastUpdated','0')");

    //insert into ASSIGN details
    $assignCourseNow = mysqli_query($conn,"INSERT INTO course_assigned(assign_id, student_id, student_email, course_tab_id, course_id, video_id, date, status, isDeleted, last_updated)
    VALUES('$enrollId','$student_id_session','$student_email_session','$course_tab_id','$course_id','','$todayDate','0','0','$lastUpdated')");

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    //unsetting payment sessions
    unset($_SESSION['assign_student_id']);
    unset($_SESSION['assign_student_email']);
    unset($_SESSION['assign_course_tab_id']);
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
     unset($_SESSION['assign_course_tab_id']);
     unset($_SESSION['assign_course_id']);

    $_SESSION['final_pay_status'] = "failed";

    header('location:../pay-status?pay=invalid');
}

