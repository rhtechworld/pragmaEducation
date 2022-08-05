<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['tsId']))
{
    $inputOfTestId = mysqli_real_escape_string($conn, $_GET['tsId']);

        //getDetailsByTestSeries
        $getDetailsOfTestSeriesFromDb = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$inputOfTestId'");
        $getCOuntOnDetailsOfTestSeriesFromDb  = mysqli_num_rows($getDetailsOfTestSeriesFromDb);

        if($getCOuntOnDetailsOfTestSeriesFromDb == 0)
        {
            echo '<script>alert("Somthing Issue From Server Side!, try again!")</script>';
            header("Refresh:0; url=./?msg=SomthingIssueWithServerSideWrongTsId");
        }
        else
        {
            while($row = mysqli_fetch_array($getDetailsOfTestSeriesFromDb))
            {
                $ts_id_db = $row['ts_id'];
                $course_id_db = $row['course_id'];
                $ts_name_db = $row['ts_name'];
                $ts_price_db = $row['ts_price'];
                $ts_type_db = $row['ts_type'];
                $ts_desc_db = $row['ts_desc'];
                $pass_mark_db = $row['pass_mark'];
                $status_db = $row['status'];
                $isDeleted_db = $row['isDeleted'];
                $last_updated_db = $row['last_updated'];

                //check course details in db
                $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_db'");
                while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                {
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                }

                $AfterTaxFinalPriceIsThisToPay = $ts_price_db;
            }
        }
}
else
{
    echo '<script>alert("Somthing issue with Params!, try again!")</script>';
    header("Refresh:0; url=./?msg=SomthingIssueWithParamsMissing");
}
?>
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
            <h4 style="font-size:20px"><span> Test Series : </span> <?php echo $ts_name_db; ?></h4>
        </div>

        <div class="container mb-3">
            <div class="row mt-2">
                <div class="col-lg-8 col-md-8 mb-2">
                    <b><?php echo $ts_name_db; ?></b>
                    <hr>
                    <?php echo $ts_desc_db; ?>
                </div>
                <div class="col-lg-4 col-md-4 mb-2">
                    <table class="table text-left">
                        <tbody>
                            <tr>
                                <th scope="row">Series Fee</th>
                                <td>₹<?php echo number_format($ts_price_db,2); ?></td>
                            </tr>
                            <tr>
                                <th>

                                <?php

                                    //check enrollment now
                                    $checkEnrollmentNowHere = mysqli_query($conn,"SELECT * FROM test_series_assigned WHERE ts_id='$ts_id_db' AND student_id='$student_id_session' AND isDeleted='0' AND status='0'");
                                    $getCountOnThisNowTs = mysqli_num_rows($checkEnrollmentNowHere);

                                    if($getCountOnThisNowTs == 0)
                                    {
                                        if($AfterTaxFinalPriceIsThisToPay == 0 || $AfterTaxFinalPriceIsThisToPay == null || $AfterTaxFinalPriceIsThisToPay == '')
                                        {
                                            $AfterTaxFinalPriceIsThisToPay = 163045; //for razorpay
                                            $showNewButtonActionOnTs = '<a href="enroll-free-test-series?tsId='.$ts_id_db.'&cf='.$AfterTaxFinalPriceIsThisToPay.'&enroll=free" class="btn btn-primary newButtonEffect" style="color:white" href="#">Subscribe For Free</a>';
                                           //  echo '<a href="enroll-free-course?courseTab='.$course_tab_id.'&course='.$course_id.'&cf='.$AfterTaxFinalPriceIsThisToPay.'&enroll=free" class="btn btn-primary brn-sm">Subscribe For Free</a>';
                                        }
                                        else if($AfterTaxFinalPriceIsThisToPay > 0)
                                        { 
                                        // echo '<button id="rzp-button1" class="btn btn-primary brn-sm">Subscribe Now</button>'; 
                                            $showNewButtonActionOnTs = '<a class="btn btn-primary newButtonEffect" id="rzp-button1" style="color:white" href="#">Subscribe Now</a>';
                                        }
                                        else
                                        {
                                            $showNewButtonActionOnTs = '<b class="text-danger">ERROR</b>';
                                        }
                                    }
                                    else
                                    {
                                        while($row = mysqli_fetch_array($checkEnrollmentNowHere))
                                        {
                                            $checkEnrollmentIdNowHereDb = $row['ts_assigned_id'];
                                        }

                                        $showNewButtonActionOnTs = '<a href="test-series-enroll-access?tsId='.$ts_id_db.'&enId='.$checkEnrollmentIdNowHereDb.'" class="btn btn-success">Enrolled, Access Now</a>';
                                    }

                                    echo $showNewButtonActionOnTs;

                                ?>
                                </th>
                                <td>
                                    <a class="btn btn-primary newButtonEffect" style="color:white" href="#sceduleThis">View Schedule</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <section id="sceduleThis" style="padding:0">
                <div class="mt-2 mb-2">
                    <b></b>
                </div>
                <h5 class="mb-2"><b>Test Scedule</b></h5>
                <div class="row mb-2">
                    <div class="col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="CoursesList" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Test Name</th>
                                        <th>Test Type</th>
                                        <th>Test Date</th>
                                        <th>Test Day</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                                $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id_db' AND isDeleted='0' ORDER BY id DESC");
                                                $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

                                                $slNo = 1;
                                                while($row = mysqli_fetch_array($getListOfTestSeries))
                                                {
                                                    $sc_id = $row['sc_id'];
                                                    $ts_id = $row['ts_id'];
                                                    $sc_test_name = $row['sc_test_name'];
                                                    $sc_test_type = $row['sc_test_type'];
                                                    $sc_test_date = $row['sc_test_date'];
                                                    $sc_pass_mark = $row['sc_pass_mark'];
                                                    $status = $row['status'];
                                                    $isDeleted = $row['isDeleted'];
                                                    $last_updated = $row['last_updated'];

                                                    //count of schedule now
                                                    $getTheCountOfScheduleNowHereQtn = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0'");
                                                    $thisIsCountOfListOfAllScedulesQtn = mysqli_num_rows($getTheCountOfScheduleNowHereQtn);

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
                                                        <td>'.$slNo++.'</td>
                                                        <td>'.$sc_test_name.'</td>
                                                        <td>'.$sc_test_type.'</td>
                                                        <td><b>'.date('d-m-Y',strtotime($sc_test_date)).'</b></td>
                                                        <td>'.date('l',strtotime($sc_test_date)).'</td>
                                                    </tr>
                                                    ';
                                                }

                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>


    <?php

    //CreateNewTrasactionId 

    $newTransId = "TS".date('dmy')."".rand(10000,99999)."";
    $_SESSION['assign_new_txn_id'] = $newTransId;
    $_SESSION['assign_student_id'] = $student_id_session;
    $_SESSION['assign_student_email'] = $student_email_session;
    $_SESSION['assign_ts_id'] = $ts_id_db;
    $_SESSION['assign_course_id'] = 'NA';
    $_SESSION['razorpay_paid_amount'] = $AfterTaxFinalPriceIsThisToPay;

    $_SESSION['course_amount_basic'] = $ts_price_db;

    //pay in details amount
    $_SESSION['stuTrxn_pay_tax_at'] = 0;
    $_SESSION['stuTrxn_pay_tax'] = 0;
    $_SESSION['stuTrxn_pay_discount'] = 0;
    $_SESSION['stuTrxn_pay_coupon'] = 0;
    $_SESSION['stuTrxn_pay_total'] = $AfterTaxFinalPriceIsThisToPay;


    $_SESSION['taxAtOnThisPayment'] = 0;
    $_SESSION['taxAtAmountThisPayment'] = 0;

    $_SESSION['offerOnThisPayment'] = 0;
    $_SESSION['offerAmountThisPayment'] = 0;

    require('payment/config.php');
    require('payment/razorpay-php/Razorpay.php');

    

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
        "description"       => $ts_name_db,
        "image"             => "https://stage.pragmaeducation.com/assets/new-img/favicon.png",
        "prefill"           => [
        "name"              => $student_name_session,
        "email"             => $student_email_session,
        "contact"           => $student_number_session,
        ],
        "notes"             => [
        "address"           => "TestSeries:".$ts_id_db."",
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
    <form name='razorpayform' action="payment/ts-verify.php" method="POST">
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_signature" id="razorpay_signature">
    </form>
    <script>
    // Checkout details as a json
    var options = <?php echo $json?>;

    /**
     * The entire list of Checkout fields is available at
     * https://docs.razorpay.com/docs/checkout-form#checkout-fields
     */
    options.handler = function(response) {
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

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }
    </script>

    <? ob_flush(); ?>