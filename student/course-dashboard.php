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
    <title>Course Dashboard | <?php echo $course_name_CourseDashboard; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4"><?php echo $course_name_CourseDashboard; ?></h5>
            <b><?php echo $assigned_assign_id; ?></b> | <b><a href="course-dashboard?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>">Dashboard</a></b>
            <hr> 
            <?php echo $showInactiveNote; ?>
            <?php 
                    if($CourseThingsAccessOnStatus == '0')
                    {
                        ?>
                            <div class="row text-center my-auto border">
                                <div class="col-md-4 col-lg-4 p-2 my-auto">
                                <table class="table text-left">
                                    <tbody>
                                        <tr>
                                        <th scope="row"><b>Prelims <i class="fa fa-arrow-circle-right"></i></th>
                                        <td><b><?php echo $countgetCountOfPrimlisFromDataBase; ?></b></td>
                                        </tr>
                                        <tr>
                                        <th scope="row"><b>Mains <i class="fa fa-arrow-circle-right"></i></th>
                                        <td><b><?php echo $countgetCountOfMainsFromDataBase; ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>                              
                                <div class="col-md-8 col-lg-8 p-2 text-center my-auto">
                                    <b>Advertisement</b>
                                </div>
                            </div>
                            <hr>
                            <h5 class="mt-2 mb-3"><u>Course Updates</u></h5>
                            <div class="accordion" id="accordionCoursePrelims">
                                <?php include('functions/course-dashboard-updates-access.php'); ?>
                            </div>
                        <?php
                    }
                    else
                    {
                        //do nothing
                    }
                ?>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <script>
    var actionCourseId = '<?php echo $assigned_course_id; ?>';
    $("#collapseArrow"+actionCourseId).html('<i class="fas fa-angle-down"></i>');
    $("#Clps"+actionCourseId).addClass("active");
    $("#dashboard"+actionCourseId).addClass("active");
    $("#sidenavAccordionCourse"+actionCourseId).addClass("show");
    </script>