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
            <h4 style="font-size:20px"><span>Course :  </span> <?php echo $course_name_CourseDashboard; ?> </h4>
        </div>

        <div class="container mb-4">
            <div class="row my-auto text-center">
                <div class="col-lg-6 col-md-6 my-auto">
                    <b class="text-center"><?php echo $assigned_assign_id; ?></b> | <b><a href="course-classes?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>" style="color:#E31E26">Course Classes</a></b>
                </div>
                <div class="col-lg-6 col-md-6 text-right my-auto">
                        <select class="form-control form-control-sm" style="border:1px solid #E31E26" id="ActionOnCourseEnrolled" onchange="takePageActionNow()">
                            <option value="">-- Action To --</option>
                            <option value="course-dashboard">Dashboard</option>
                            <option value="course-classes">Course Classes</option>
                            <option value="course-updates">Course Updates</option>
                            <option value="course-faqs">Course Faq's</option>
                            <option value="course-payment">Payment History</option>
                        </select>
                </div>
            </div>
        <hr>
        <?php echo $showInactiveNote; ?>
            <?php 
                    if($CourseThingsAccessOnStatus == '0')
                    {
                        ?>
                            <div class="row mt-2 my-auto border p-2">
                            <div class="p-2 text-center">
                                <h5><b><?php echo $course_name_CourseDashboard; ?> - Subjects</b></h5>
                            </div>
                                <?php

                                //get Subjects as per the papers
                                $getSubjectsOnMains = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$course_id_CourseDashboard' AND isDeleted='0' AND status='0' ORDER BY id ASC");
                                $getCountSubjectsOnMains = mysqli_num_rows($getSubjectsOnMains);

                                if($getCountSubjectsOnMains == 0)
                                {
                                    echo '
                                    <div class="text-center alert text-center alert-primary">
                                        No Subjects Found On <i>'.$course_name_CourseDashboard.'</i>
                                    </div>
                                    ';
                                }
                                else
                                {
                                    echo '<div id="accordion">';

                                    while($row = mysqli_fetch_array($getSubjectsOnMains))
                                    {
                                        $subject_id = $row['subject_id'];
                                        $course_id = $row['course_id'];
                                        $subject_name = $row['subject_name'];
                                        $subject_desc = $row['subject_desc'];
                                        $date = $row['date'];
                                        $status = $row['status'];
                                        $isDeleted = $row['isDeleted'];
                                        $last_updated = $row['last_updated'];

                                        echo '
                                        <div class="card mb-3 shadow" style="border:1px solid #E31E26">
                                            <div class="card-header text-center" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#'.$subject_id.'" aria-expanded="true" aria-controls="'.$subject_id.'">
                                                <b>'.$subject_name.'</b>
                                                </button>
                                            </h5>
                                            </div>
                                        
                                            <div id="'.$subject_id.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="card-body text-left">
                                                <p>'.$subject_desc.'</p>
                                                <hr>
                                                <h6><b>Chapters</b></h6>
                                                ';
                                                 $getChaptersBasedOnSubject = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE subject_id='$subject_id' AND isDeleted='0' AND status='0'");
                                                 $makeCntOnBasedCHapters = mysqli_num_rows($getChaptersBasedOnSubject);

                                                 if($makeCntOnBasedCHapters == 0)
                                                 {
                                                    echo '
                                                    <div class="text-center alert text-center alert-primary">
                                                        No Chapters Found On <i>'.$subject_name.'</i>
                                                    </div>
                                                    ';
                                                 }
                                                 else
                                                 {
                                                    while($row = mysqli_fetch_array($getChaptersBasedOnSubject))
                                                    {
                                                        $chapter_id_chapter = $row['chapter_id'];
                                                        $subject_id_chapter = $row['subject_id'];
                                                        $chapter_name_chapter = $row['chapter_name'];
                                                        $date_chapter = $row['date'];
                                                        $status_chapter = $row['status'];
                                                        $isDeleted_chapter = $row['isDeleted'];
                                                        $last_updated_chapter = $row['last_updated'];

                                                        echo '
                                                                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                                                    <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                                                        <b class="mt-2 mb-2" style="font-size:18px">'.$chapter_name_chapter.'</b>
                                                                        <hr style="margin:0">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                                                                <a href="topics-list?chapter_id='.$chapter_id_chapter.'&assign_id='.$assigned_assign_id.'&course_id='.$course_id.'" class="btn btn-primary btn-sm newButtonEffect">View All Topics</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        ';
                                                    }
                                                 }

                                                echo'
                                            </div>
                                            </div>
                                        </div>
                                        ';
                                    }

                                    echo '</div>';
                                }
                                ?>
                            </div>
    
                        <?php
                    }
                    else
                    {
                        //do nothing
                    }
                ?>
        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
            function takePageActionNow()
            {
                var ActionOnCourseEnrolled = document.getElementById('ActionOnCourseEnrolled').value;

               // alert(ActionOnCourseEnrolled);

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
    $("#dashboard"+actionCourseId).addClass("active");
    $("#sidenavAccordionCourse"+actionCourseId).addClass("show");
    </script>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>