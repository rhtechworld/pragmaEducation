<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pragma Student | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container px-4">
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
                    Payment successful :-), You can check your enrolled courses in your dashboad section or enrolled courses section.
                   </div>
                   <br>
                   <a href="enrolled-courses?pay=success" class="btn btn-primary btn-sm">Check Enrolled Courses</a>
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
    </main>
    <?php include('footer.php');