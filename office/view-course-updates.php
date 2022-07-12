<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-course-updates-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Course Updates | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Course Updates : <?php echo $course_name; ?></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="course-updates-actions">Course Updates</a> &nbsp;/ &nbsp; <b><?php echo $course_name; ?></b>&nbsp;  / &nbsp; <a href="display-course-updates-actions?action=addNew&courseId=<?php echo $course_id; ?>&updId=<?php echo rand(10000,99999); ?>&checkCourseStatus=true&actionTaken=true"><i class="fa fa-plus"></i> Add New Update</a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <?php
                                    if($getCountOnItCourseUpdatesById == 0)
                                    {
                                        echo '
                                            <div class="alert alert-primary text-primary">
                                                No Updates Found On This Course!
                                            </div>
                                            ';
                                    }
                                    else
                                    {
                                        while($row = mysqli_fetch_array($getCourseUpdatesById))
                                        {
                                            $update_id_OnUpdates = $row['update_id'];
                                            $course_id_OnUpdates = $row['course_id'];
                                            $up_title_OnUpdates = $row['up_title'];
                                            $up_desc_OnUpdates = $row['up_desc'];
                                            $up_date_OnUpdates = $row['up_date'];
                                            $status_OnUpdates = $row['status'];
                                            $isDeleted_OnUpdates = $row['isDeleted'];
                                            $last_updated_OnUpdates = $row['last_updated'];

                                             //status show
                                             if($status_OnUpdates == 0)
                                             {
                                                 $showStatus = '<span class="badge badge-success"><i class="fa fa-eye"></i> Public</span>';
                                             }
                                             else
                                             {
                                                 $showStatus = '<span class="badge badge-danger"><i class="fa fa-lock"></i> Private</span>';
                                             }

                                            echo '
                                            <div class="card">
                                                <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$update_id_OnUpdates.'" aria-expanded="true" aria-controls="collapse'.$update_id_OnUpdates.'">
                                                    <i class="fa fa-arrow-circle-right"></i> <small>'.$last_updated_OnUpdates.'</small> '.$showStatus.' : <b>'.$up_title_OnUpdates.'</b>
                                                    </button>
                                                </h2>
                                                </div>

                                                <div id="collapse'.$update_id_OnUpdates.'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    '.$up_desc_OnUpdates.'
                                                    <hr>
                                                     <a href="display-course-updates-actions?action=editOne&courseId='.$course_id_OnUpdates.'&updId='.$update_id_OnUpdates.'&checkCourseStatus=true&actionTaken=true"><i class="fa fa-edit"></i> Edit</a> <a class="ml-5" href="display-course-updates-actions?action=deleteOne&courseId='.$course_id_OnUpdates.'&updId='.$update_id_OnUpdates.'&checkCourseStatus=true&actionTaken=true"><i class="fa fa-trash"></i> Delete</a> 
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
               
