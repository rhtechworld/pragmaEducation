<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<?php include('functions/verify-course-subject.php'); ?>
<?php include('functions/verify-subject-topic.php'); ?>
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
            <b><?php echo $assigned_assign_id; ?></b> | <b><a href="course-prelims?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>">Prelims</a></b> | <b><?php echo $subject_paper_ForHead_show; ?></b> | <b><a href="#" class="js-get-subject-info" id="<?php echo $subject_id_ForHead; ?>" data-subject-id="<?php echo $subject_id_ForHead; ?>" data-subject-name="<?php echo $subject_name_ForHead; ?>"><?php echo $subject_name_ForHead; ?> <i style="font-size:13px" class="fa fa-info-circle"></i></a></b><br>
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
    </main>
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
    <?php include('footer.php');
    