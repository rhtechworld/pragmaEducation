<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/course-details.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    
    <main id="main">

        <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
            <h4 style="font-size:20px"><span>Enroll Course : </span><b><?php echo $course_name; ?></b> </h4>
        </div>

        <div class="container mb-4">
            <div class="row pl-3 mt-3">
                <div class="col-md-7 col-lg-7 p-2 mb-2">
                <a data-toggle="collapse" href="#collapseOnCourseDetails" role="button" aria-expanded="false" aria-controls="collapseOnCourseDetails">
                    <b><i class="fa fa-eye"></i> View Course Details</b>
                </a>
                <div class="collapse show" id="collapseOnCourseDetails">
                    <hr>
                        <?php echo $course_desc; ?>
                </div>
                </div>
                <div class="col-md-5 col-lg-5 border rounded p-3 my-auto text-center mb-2">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Course Fee : </th>
                            <td>₹<?php echo number_format($course_price,2); ?></td>
                        </tr>
                        <?php
                        if($getCOuntOfOffers == 0)
                        {
                            //do nothing 
                            $passThisIntoPaymentFrOrDb = '-';
                            $offer_at = 0;
                        }
                        else
                        {
                            echo 
                            '
                            <tr>
                                <th scope="row">'.$offer_name.' @ '.$offer_at.'% : </th>
                                <td>- ₹'.$addOfferHere.'</td>
                            </tr>

                            ';
                            $passThisIntoPaymentFrOrDb = ''.$offer_name.'@'.$offer_at.'%';
                        }
                        ?>
                        <?php
                        if($taxEnabled == false)
                        {
                            //do nothing 
                         
                        }
                        else
                        {
                            echo 
                            '
                            <tr>
                                <th scope="row">'.$database_tax_name.' @ '.$database_tax_at.'% : </th>
                                <td>₹'.$calsi_TaxNow.'</td>
                            </tr>

                            ';
                        }
                        ?>
                        <tr>
                            <th scope="row">Final Price : </th>
                            <td>₹<b><?php echo number_format($AfterTaxFinalPriceIsThisToPay,2); ?></b></td>
                        </tr>
                    </tbody>
                    </table>
                    <hr>
                    <?php
                    if($AfterTaxFinalPriceIsThisToPay == 0 || $AfterTaxFinalPriceIsThisToPay == null || $AfterTaxFinalPriceIsThisToPay == '')
                    {
                        $AfterTaxFinalPriceIsThisToPay = 163045; //for razorpay
                        echo '<a href="enroll-free-course?courseTab='.$course_tab_id.'&course='.$course_id.'&cf='.$AfterTaxFinalPriceIsThisToPay.'&enroll=free" class="btn btn-primary brn-sm">Subscribe For Free</a>';
                    }
                    else if($AfterTaxFinalPriceIsThisToPay > 0)
                    { 
                        echo '<button id="rzp-button1" class="btn btn-primary brn-sm">Subscribe Now</button>';
                    }
                    else
                    {
                        echo '<b class="text-danger">ERROR</b>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

    <?php
    
    require('payment/config.php');
    require('payment/razorpay-php/Razorpay.php');

    //CreateNewTrasactionId 

    $newTransId = "T".date('dmy')."".rand(10000,99999)."";
    $_SESSION['assign_new_txn_id'] = $newTransId;
    $_SESSION['assign_student_id'] = $student_id_session;
    $_SESSION['assign_student_email'] = $student_email_session;
    $_SESSION['assign_course_tab_id'] = $course_tab_id;
    $_SESSION['assign_course_id'] = $course_id;
    $_SESSION['razorpay_paid_amount'] = $AfterTaxFinalPriceIsThisToPay;

    $_SESSION['course_amount_basic'] = $course_price;

    //pay in details amount
    $_SESSION['stuTrxn_pay_tax_at'] = $database_tax_nameNew;
    $_SESSION['stuTrxn_pay_tax'] = $calsi_TaxNow;
    $_SESSION['stuTrxn_pay_discount'] = $addOfferHere;
    $_SESSION['stuTrxn_pay_coupon'] = $passThisIntoPaymentFrOrDb;
    $_SESSION['stuTrxn_pay_total'] = $AfterTaxFinalPriceIsThisToPay;


    $_SESSION['taxAtOnThisPayment'] = $database_tax_at;
    $_SESSION['taxAtAmountThisPayment'] = $calsi_TaxNow;

    $_SESSION['offerOnThisPayment'] = $offer_at;
    $_SESSION['offerAmountThisPayment'] = $addOfferHere;
    

    // Create the Razorpay Order

    use Razorpay\Api\Api;

    $api = new Api($keyId, $keySecret);
                        
    //
    // We create an razorpay order using orders api
    // Docs: https://docs.razorpay.com/docs/orders
    //
    $orderData = [
        'receipt'         => 3456,
        'amount'          => $AfterTaxFinalPriceIsThisToPay * 100, // 2000 rupees in paise
        'currency'        => 'INR',
        'payment_capture' => 1 // auto capture
    ];

    $razorpayOrder = $api->order->create($orderData);

    $razorpayOrderId = $razorpayOrder['id'];

    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

    $displayAmount = $amount = $orderData['amount'];

    if ($displayCurrency !== 'INR')
    {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);

        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }

    $checkout = 'automatic';

    if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
    {
        $checkout = $_GET['checkout'];
    }

    $data = [
        "key"               => $keyId,
        "amount"            => $AfterTaxFinalPriceIsThisToPay,
        "name"              => "Pragma Edu.",
        "description"       => $course_name,
        "image"             => "https://stage.pragmaeducation.com/assets/new-img/favicon.png",
        "prefill"           => [
        "name"              => $student_name_session,
        "email"             => $student_email_session,
        "contact"           => $student_number_session,
        ],
        "notes"             => [
        "address"           => "CourseTab:".$course_tab_id.", CourseId:".$course_id."",
        "merchant_order_id" => $newTransId,
        ],
        "theme"             => [
        "color"             => "#F37254"
        ],
        "order_id"          => $razorpayOrderId,
    ];

    if ($displayCurrency !== 'INR')
    {
        $data['display_currency']  = $displayCurrency;
        $data['display_amount']    = $displayAmount;
    }

    $json = json_encode($data);

    ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <form name='razorpayform' action="payment/verify.php" method="POST">
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    </form>
    <script>
    // Checkout details as a json
    var options = <?php echo $json?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    options.modal = {
        ondismiss: function() {
            console.log("This code runs when the popup is closed");
        },
        // Boolean indicating whether pressing escape key 
        // should close the checkout form. (default: true)
        escape: true,
        // Boolean indicating whether clicking translucent blank
        // space outside checkout form should close the form. (default: false)
        backdropclose: false
    };

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e){
        rzp.open();
        e.preventDefault();
    }
    </script>
    
<? ob_flush(); ?>

    