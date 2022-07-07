<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
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
            <h4 style="font-size:20px"><span>Payment</span> Status</h4>
        </div>

        <div class="container mb-4">
        <?php
            $payStatusNow = $_SESSION['final_pay_status'];

            if($payStatusNow == 'success')
            {
                ?>
                <h5 class="mt-4">Yourd Payment is Success</h5>
                <br>
                <h5>Txn ID : <?php echo $_SESSION['assign_new_txn_id']; ?></h5>
                <div class="row mt-2">
                   <div class="alert alert-success">
                    Payment successful :-), You will get enrollment details updated in dashboard soon.
                   </div>
                   <br>
                   <a href="./?pay=success" class="btn btn-primary newButtonEffect">Check Dashboard</a>
                </div>
                <?php
            }
            else
            {
                ?>
                <h5 class="mt-4">Yourd Payment is Failed</h5>
                <h5>Txn ID : <?php echo $_SESSION['assign_new_txn_id']; ?></h5>
                <div class="row mt-2">
                   <div class="alert alert-danger">
                    Payment Failed, If amount deducted from your bank it will reflect in 5-7 days.
                   </div>
                </div>
                <?php
            }
            ?>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>