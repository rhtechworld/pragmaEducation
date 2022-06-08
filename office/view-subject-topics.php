<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/all-subjects-topics-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Subject Topics | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:16px">Topics On: </g> <b><?php echo $course_name; ?> / <?php echo $subject_type; ?> / Paper - <?php echo $subject_paper; ?> / <?php echo $subject_name; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="course-subjects">Subject Topics</a> &nbsp;/ &nbsp;<b><?php echo $course_name; ?> (<?php echo $subject_type; ?>)(Paper-<?php echo $subject_paper; ?>): <?php echo $subject_name; ?></b> &nbsp;/ &nbsp;<b><a id="<?php echo $course_id; ?>" courseNameAtt="<?php echo $course_name; ?>" courseSubjectType="<?php echo $subjectType; ?>" CourseSubjectPaper="<?php echo $subjectPaper; ?>" data-action-id="<?php echo $course_id; ?>" href="add-new-subject-topic?course_id=<?php echo $course_id; ?>&subject_id=<?php echo $subject_id; ?>&verifyCourse=true&verifySubject=true#"><i class="fa fa-plus"></i> Add New Topic</a></b></li>
                        </ol>
                        <?php include('functions/all-course-subject-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                        if($getCOuntgetTopicsFromDbOfSubjects == 0)
                                        {
                                            echo '
                                            <div class="alert alert-primary text-primary">
                                            No Topics Found On This Subject: <b>'.$subject_name.'</b>!
                                            </div>
                                            ';
                                        }
                                        else
                                        {
                                            while($row = mysqli_fetch_array($getTopicsFromDbOfSubjects))
                                            {
                                                $course_id = $row['course_id'];
                                                $subject_id = $row['subject_id'];
                                                $topic_id = $row['topic_id'];
                                                $topic_name = $row['topic_name'];
                                                $topic_by = $row['topic_by'];
                                                $topic_content = $row['topic_content'];
                                                $topic_video = $row['topic_video'];
                                                $topic_status = $row['topic_status'];
                                                $status = $row['status'];
                                                $topic_date = $row['topic_date'];
                                                $isDeleted = $row['isDeleted'];
                                                $last_updated = $row['last_updated'];

                                                //status show
                                                if($status == 0)
                                                {
                                                    $showStatus = '<span class="badge badge-success"><i class="fa fa-eye"></i> Public</span>';
                                                }
                                                else
                                                {
                                                    $showStatus = '<span class="badge badge-danger"><i class="fa fa-lock"></i> Private</span>';
                                                }

                                                echo'
                                                <div class="mb-2 col-md-4 col-lg-4 p-2">
                                                    <div class="card p-2 shadow" style="border:1px solid black">
                                                        <video style="width:100%;border-radius:10px"
                                                            id="my-video"
                                                            class="video-js"
                                                            controls
                                                            preload="auto"
                                                            height="150"
                                                            poster="MY_VIDEO_POSTER.jpg"
                                                            data-setup="{}"
                                                            >
                                                            <source src="https://drive.google.com/uc?id='.$topic_video.'&export=download" type="video/mp4" />
                                                        </video>
                                                        <b class="mt-2 mb-2 text-center">'.$topic_name.' :  by <i>'.$topic_by.'</i></b>
                                                        <hr style="margin:0">
                                                        <div class="row">
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              '.$showStatus.'
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              <a href="add-new-subject-topic?course_id='.$course_id.'&subject_id='.$subject_id.'&verifyCourse=true&verifySubject=true&action=edit&topic_id='.$topic_id.'" id="E'.$topic_id.'" data-action-id="'.$topic_id.'"><i class="fa fa-edit"></i> Edit</a>
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                            <a href="add-new-subject-topic?course_id='.$course_id.'&subject_id='.$subject_id.'&verifyCourse=true&verifySubject=true&action=delete&topic_id='.$topic_id.'" id="D'.$topic_id.'" data-action-id="'.$topic_id.'"><i class="fa fa-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
