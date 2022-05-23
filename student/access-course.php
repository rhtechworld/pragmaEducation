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
            <h5 class="mt-4">Course Details</h5>
            <hr>
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
    </main>
    <?php include('footer.php');