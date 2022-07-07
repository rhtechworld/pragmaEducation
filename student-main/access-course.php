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
            <h4 style="font-size:20px"><span>Course </span> Details </h4>
        </div>

        <div class="container mb-4">
            <?php
                if(isset($_POST['actionAccessCourse']))
                {
                    $accessCourseId = mysqli_real_escape_string($conn, $_POST['accessCourseId']);
                    $accessRollId = mysqli_real_escape_string($conn, $_POST['accessRollId']);

                    //check valid access or not
                    $checkingValidAccess = mysqli_query($conn,"SELECT * FROM course_assigned WHERE assign_id='$accessRollId' AND course_id='$accessCourseId' AND student_id='$student_id_session' AND isDeleted='0' AND status='0'");
                    $getCountOnValidAccess = mysqli_num_rows($checkingValidAccess);

                    if($getCountOnValidAccess == 0)
                    {
                        echo '<script>alert("Invalid Access, Try to Access again!")</script>';
                        header('location:enrolled-courses?access=invalid');
                    }
                    else
                    {
                        //do nothing
                    }
                }
                else
                {
                    echo '<script>alert("Something Wrong, Try to Access again!")</script>';
                    header('location:enrolled-courses?action=invalid');
                }
            ?>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>