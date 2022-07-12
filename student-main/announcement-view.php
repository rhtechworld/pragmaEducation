<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-annpuncement-view.php'); ?>
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
            <h4 style="font-size:20px"><span>Announcements : </span> <?php echo $ann_title; ?> </h4>
        </div>

        <div class="container mb-4">
            <div class="row mt-2">
                <div class="card p-3">
                   <g style="font-size:12px;color:#C5C5C5"><?php echo $last_updated; ?></g>
                   <h5 class="mt-1"><?php echo $ann_title; ?></h5>
                   <p>
                        <?php echo $ann_desc; ?>
                   </p>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>