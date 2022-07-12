<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
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
            <h4 style="font-size:20px"><span>Prelims : </span> <?php echo $course_name_CourseDashboard; ?> </h4>
        </div>

        <div class="container mb-4">
            <b><?php echo $assigned_assign_id; ?></b> | <b><a
                        href="course-prelims?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>">Prelims</a></b>
                <hr>
                <?php echo $showInactiveNote; ?>
                <div class="accordion" id="accordionCoursePrelims">
                <div class="row">
                <?php 
                        if($CourseThingsAccessOnStatus == '0')
                        {
                            ?>
                                <?php include('functions/course-prelims-access.php'); ?>
                            <?php
                        }
                        else
                        {
                            //do nothing
                        }
                    ?>

                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
            function takePageActionNow()
            {
                var ActionOnCourseEnrolled = document.getElementById('ActionOnCourseEnrolled').value;

                alert(ActionOnCourseEnrolled);

                if(ActionOnCourseEnrolled == '')
                {
                    window.location.replace('course-dashboard?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>&verifyenrolled=true&accessCourse=true');
                }
                else
                {
                    window.location.replace(''+ActionOnCourseEnrolled+'?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>&verifyenrolled=true&accessCourse=true');
                }
            }
    </script>

    
    <script>
    var actionCourseId = '<?php echo $assigned_course_id; ?>';
    $("#collapseArrow"+actionCourseId).html('<i class="fas fa-angle-down"></i>');
    $("#Clps"+actionCourseId).addClass("active");
    $("#prelims"+actionCourseId).addClass("active");
    $("#sidenavAccordionCourse"+actionCourseId).addClass("show");
    </script>
    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>