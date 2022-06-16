<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Payment | <?php echo $course_name_CourseDashboard; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4">Course : <?php echo $course_name_CourseDashboard; ?></h5>
            <b><?php echo $assigned_assign_id; ?></b> | <b><a
                    href="course-payment?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>">Payment History</a></b>
            <hr>
            <?php echo $showInactiveNote; ?>
            <div class="accordion" id="accordionCoursePrelims">
            <div class="row">
            <?php 
                    if($CourseThingsAccessOnStatus == '0')
                    {
                        ?>
                             <?php include('functions/course-payments-access.php'); ?>
                        <?php
                    }
                    else
                    {
                        //do nothing
                    }
                ?>
               
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <script>
    var actionCourseId = '<?php echo $assigned_course_id; ?>';
    $("#collapseArrow"+actionCourseId).html('<i class="fas fa-angle-down"></i>');
    $("#Clps"+actionCourseId).addClass("active");
    $("#payment"+actionCourseId).addClass("active");
    $("#sidenavAccordionCourse"+actionCourseId).addClass("show");
    </script>
    <script>
                $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(
                    {
                        html:true,
                        container: 'body'
                    }
                    );   
                });
                </script>