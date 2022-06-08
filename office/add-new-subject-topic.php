<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/all-subjects-topics-details.php'); ?>
<?php include('functions/topic-edit-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $actionPageTitle; ?> | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:16px"><?php echo $actionOnTopicDetailsTone; ?> On: </g> <b><?php echo $course_name; ?> / <?php echo $subject_type; ?> / Paper - <?php echo $subject_paper; ?> / <?php echo $subject_name; ?> <?php echo $actionOnTopicDetailsTwo; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="course-subjects">Subject Topics</a> &nbsp;/ &nbsp;<a href="view-subject-topics?course_id=<?php echo $course_id; ?>&subject_id=<?php echo $subject_id; ?>&verifyCourse=true&verifySubject=true"><b><?php echo $course_name; ?> (<?php echo $subject_type; ?>)(Paper-<?php echo $subject_paper; ?>): <?php echo $subject_name; ?></b></a> &nbsp;/ &nbsp; <?php echo $actionOnTopicDetails; ?></li>
                        </ol>
                        <?php include('functions/all-topics-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="topicNameInput"><b>Topic Name :</b></label>
                                        <input type="text" class="form-control" id="topicNameInput" name="topicNameInput" value="<?php if(isset($topic_name_topicDetails)) { echo $topic_name_topicDetails; } else { echo ''; } ?>" placeholder="Class 1" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="topicByInput"><b>Topic By ( Faculty ) :</b></label>
                                        <input type="text" class="form-control" id="topicByInput" name="topicByInput" value="<?php if(isset($topic_by_topicDetails)) { echo $topic_by_topicDetails; } else { echo ''; } ?>" placeholder="Ravi" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group"> 
                                        <label for="topicVideoId"><b>Topic Video ID : </b><small>( <a href="find-video-id-process" target="_blank">Video ID ?</a> )</small></label>
                                        <input type="text" class="form-control" id="topicVideoId" name="topicVideoId" placeholder="Enter Video ID" value="<?php if(isset($topic_video_topicDetails)) { echo $topic_video_topicDetails; } else { echo ''; } ?>" oninput="AddPreviewLink(this.value)" required <?php echo $inputActionOnFocus; ?>>
                                        <small>After adding video ID <b><a href="https://drive.google.com/uc?id=<?php echo $topic_video_topicDetails; ?>&export=view" id="previewVideoOnModalOnAdd" target="_blank">CLICK HERE</a></b> to Preview.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="topicContentInput"><b>Topic Content :</b> </label>
                                        <textarea class="form-control" id="editor" name="topicContentInput" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($topic_content_topicDetails)) { echo $topic_content_topicDetails; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="topicStatusInput"><b>Topic Status : <?php echo $showStatus_topicDetails; ?></b></label>
                                        <select class="form-control" id="topicStatusInput" name="topicStatusInput" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select --</option> 
                                            <option value='0' <?php if(isset($topic_status_topicDetails)) { if($topic_status_topicDetails == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($topic_status_topicDetails)) { if($topic_status_topicDetails == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
                                        </select>
                                    </div>
                                    <b>NOTE : </b> Check <b><a href="https://drive.google.com/uc?id=<?php echo $topic_video_topicDetails; ?>&export=view" id="previewVideoOnModalOnAddTwo" target="_blank">Preview</a></b> Before Add, It Ignores the issues on video playing. If Preview not works then check video id again!<br>
                                    <?php echo $actionButtonToTakeAction; ?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
