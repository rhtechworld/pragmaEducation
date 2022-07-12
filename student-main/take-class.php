<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<?php include('functions/verify-course-subject.php'); ?> 
<?php include('functions/verify-subject-topic.php'); ?>
<?php

$chapter_id_get = mysqli_real_escape_string($conn, $_GET['chapter_id']);

//chapters
$checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_get' AND isDeleted='0'");
$getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

if($getCntOnCheckSubjectChapters == 0)
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=course-classes?course_id=".$assigned_course_id."&assign_id=".$assigned_assign_id."&msg=ChapterIdNotFound");
}
else
{
    while($row = mysqli_fetch_array($checkCourseTabandCourseSubjectChapters))
    {
        $chapter_id_in_db = $row['chapter_id'];
        $subject_id_in_db = $row['subject_id'];
        $chapter_name_in_db = $row['chapter_name'];
        $date_in_db = $row['date'];
        $status_in_db = $row['status'];
        $isDeleted_in_db = $row['isDeleted'];
        $last_updated_in_db = $row['last_updated'];
    }

}


//check CourseId
$checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_ForHead' AND isDeleted='0'");
$makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

if($makeCOuntOnCourses == 0)
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=course-classes?course_id=".$assigned_course_id."&assign_id=".$assigned_assign_id."&msg=CourseIdNotFound");
}
else
{
    while($row = mysqli_fetch_array($checkCourseIdValable))
    {
        $course_id_in_db = $row['course_id'];
        $course_name_in_db = $row['course_name'];
    }
}

?>
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
            <h4 style="font-size:20px"><span>Topic :</span> <?php echo $topic_name_Topic; ?></h4>
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
        <b><?php echo $assigned_assign_id; ?></b> | <b><?php echo $course_name_in_db; ?></b> / <b><?php echo $subject_name_ForHead; ?></b> / <b><?php echo $chapter_name_in_db; ?></b> / <b><?php echo $topic_name_Topic; ?></b><br>
            <hr>
             <h5>Topic : <a href="#"><b><i><?php echo $topic_name_Topic; ?></i></b></a></h5>
            <div class="accordion mt-3" id="accordionCoursePrelims">
            <div class="row d-flex justify-content-center">
                
            <div id="accordion">
                <div class="card mb-2">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           <i class="fa fa-file-text"></i> Topic Content
                        </button>
                    </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <?php echo $topic_content_Topic; ?>
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" id="getVideoNow" aria-controls="collapseTwo">
                        <i class="fa fa-video-camera"></i> Topic Video
                        </button>
                    </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <?php

                        $simple_string = $topic_video_Topic;

                        $ciphering = "AES-128-CTR";
  
                        // Use OpenSSl Encryption method
                        $iv_length = openssl_cipher_iv_length($ciphering);
                        $options = 0;
                        
                        // Non-NULL Initialization Vector for encryption
                        $encryption_iv = "3045160714733045";
                        
                        // Store the encryption key
                        $encryption_key = $student_email_session;

                        $encryptionString = openssl_encrypt($simple_string, $ciphering,
                        $encryption_key, $options, $encryption_iv);

                    ?>
                    <div class="card-body">
                        <video 
                            id="my-video"
                            class="video-js"
                            controls
                            preload="auto"
                            height="auto"
                            poster=""
                            data-setup="{}" 
                            style = "width:100%"
                        >
                        <source id="dynamicTopicVideo" src="https://drive.google.com/uc?id=<?php echo $topic_video_Topic; ?>&export=download" type="video/mp4">
                        </video>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </main><!-- End #main -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#dynamicTopicVideo").remove();
    });
    </script>
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
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>
    