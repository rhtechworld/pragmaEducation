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
        <div class="container-fluid px-4">
            <h5 class="mt-4">Hello <?php echo $student_name_session; ?>, Welcome back</h5>
            <hr>
            <h5>Your Active Courses</h5>
            <div class="row mt-2">
                <?php include('functions/student-dashboard-access-courses.php'); ?>
            </div>
            <hr>
            <h5>Our Top Courses</h5>
            <div class="row mt-2">
                <?php include('functions/dashboard-top-tabs.php'); ?>
            </div>
        </div>
    </main>
    <?php include('footer.php');