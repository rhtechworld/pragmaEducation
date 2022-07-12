<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/all-course-subjects-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Course Subjects | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:16px">Subjects On: </g> <b><?php echo $course_name; ?> / <?php echo $subjectType; ?> / <?php echo $subjectPaper_show; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="course-subjects">Course Subjects</a> &nbsp;/ &nbsp;<b><?php echo $course_name; ?> (<?php echo $subjectType; ?>)(<?php echo $subjectPaper_show; ?>)</b> &nbsp;/ &nbsp;<b><a class="subject-js-add" id="<?php echo $course_id; ?>" courseNameAtt="<?php echo $course_name; ?>" courseSubjectType="<?php echo $subjectType; ?>" CourseSubjectPaper="<?php echo $subjectPaper; ?>" data-action-id="<?php echo $course_id; ?>" href="#"><i class="fa fa-plus"></i> Add New Subject</a></b></li>
                        </ol>
                        <?php include('functions/all-course-subject-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                        if($getCntOnCheckSubject == 0)
                                        {
                                            echo '
                                            <div class="alert alert-primary text-primary">
                                                No Subjects Found On This Course Types '.$subjectType.' & '.$subjectPaper_show.'!
                                            </div>
                                            ';
                                        }
                                        else
                                        {
                                            while($row = mysqli_fetch_array($checkCourseTabandCourseSubject))
                                            {
                                                $subject_id = $row['subject_id'];
                                                $course_id = $row['course_id'];
                                                $subject_type = $row['subject_type'];
                                                $subject_paper = $row['subject_paper'];
                                                $subject_name = $row['subject_name'];
                                                $subject_desc = $row['subject_desc'];
                                                $date = $row['date'];
                                                $status = $row['status'];
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
                                                        <b class="mt-2 mb-3 text-center">'.$subject_name.'</b>
                                                        <hr style="margin:0">
                                                        <div class="row my-auto">
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              '.$showStatus.'
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              <a href="#" class="subject-js-edit" id="E'.$subject_id.'" courseNameOnJs="'.$course_name.'" data-action-id="'.$subject_id.'"><i class="fa fa-edit"></i> Edit</a>
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                            <a href="#" class="subject-js-delete" id="D'.$subject_id.'" courseNameOnJs="'.$course_name.'" data-action-id="'.$subject_id.'"><i class="fa fa-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                        <a class="mt-3 btn btn-primary btn-sm" href="view-subject-topics?course_id='.$course_id.'&subject_id='.$subject_id.'&verifyCourse=true&verifySubject=true"><i class="fa fa-chain"></i>Add/View Topics</a>
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
               
