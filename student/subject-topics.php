<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<?php include('functions/verify-course-subject.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Prelims | <?php echo $course_name_CourseDashboard; ?> | <?php echo $subject_name_ForHead; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h6 class="mt-4">Course Topics : <?php echo $course_name_CourseDashboard; ?></h6>
            <b><?php echo $assigned_assign_id; ?></b> | <b><a href="<?php echo $prilimsForwardLinkIs; ?>?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>"><?php echo $subject_type_ForHead; ?></a></b> | <b><?php echo $subject_paper_ForHead_show; ?></b> | <b><a href="#" class="js-get-subject-info" id="<?php echo $subject_id_ForHead; ?>" data-subject-id="<?php echo $subject_id_ForHead; ?>" data-subject-name="<?php echo $subject_name_ForHead; ?>"><?php echo $subject_name_ForHead; ?> <i style="font-size:13px" class="fa fa-info-circle"></i></a></b>
            <hr>
            <div class="accordion" id="accordionCoursePrelims">
            <div class="row d-flex justify-content-center">
                
                <?php include('functions/subject-topics-access.php'); ?>

            </div>
        </div>
    </main>

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
    <?php include('footer.php');