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
            <h4 style="font-size:20px"><span>Enrolled </span>Courses </h4>
        </div>

        <div class="container mb-4">
            <h5>Your Enrolled Courses</h5>
                <div class="row mt-2">
                    <?php include('functions/student-dashboard-access-courses.php'); ?>
                </div>
                <hr>
                <h5>Our Top Courses</h5>
                <div class="row mt-2">
                    <?php include('functions/dashboard-top-tabs.php'); ?>
                </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>