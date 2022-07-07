<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<?php include('functions/verify-course-subject.php'); ?>
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
            <h4 style="font-size:20px"><span>Course Topics : </span> <?php echo $course_name_CourseDashboard; ?> </h4>
        </div>

        <div class="container mb-4">
            <b><?php echo $assigned_assign_id; ?></b> | <b><a href="<?php echo $prilimsForwardLinkIs; ?>?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>"><?php echo $subject_type_ForHead; ?></a></b> | <b><?php echo $subject_paper_ForHead_show; ?></b> | <b><a href="#" class="js-get-subject-info" id="<?php echo $subject_id_ForHead; ?>" data-subject-id="<?php echo $subject_id_ForHead; ?>" data-subject-name="<?php echo $subject_name_ForHead; ?>"><?php echo $subject_name_ForHead; ?> <i style="font-size:13px" class="fa fa-info-circle"></i></a></b>
                <hr>
                <div class="accordion" id="accordionCoursePrelims">
                <div class="row d-flex justify-content-center">
                    
                    <?php include('functions/subject-topics-access.php'); ?>

                </div>
                </div>
        </div>

    </main><!-- End #main -->


    <!-- About Subject Modal -->
    <div class="modal fade" id="AboutSubjectModalThis1" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="AboutSubjectModalThis">About Subject</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" onclick="hideModal('AboutSubjectModalThis1')" >&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <g id="course-subject-topic-info"></g>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="hideModal('AboutSubjectModalThis1')" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>