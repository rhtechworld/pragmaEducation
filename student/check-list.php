<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/course-tab-details.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Check List | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4 mt-3">
            <h5>Check List : <?php echo $dbCoureseTabName; ?></h5>
            <hr>
            <div class="row mt-2 my-auto">
                <?php include('functions/list-of-courses.php'); ?>
            </div>
        </div>
    </main>
    <?php include('footer.php');