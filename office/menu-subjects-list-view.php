<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['courseId']))
{
    $get_courseId = mysqli_real_escape_string($conn, $_GET['courseId']);

    //check CourseId
    $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$get_courseId' AND isDeleted='0'");
    $makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

    if($makeCOuntOnCourses == 0)
    {
        echo '<script>alert("Internal Server Error, Try again!")</script>';
        header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorCourseIdWrongOrDeleted");
    }
    else
    {
        while($row = mysqli_fetch_array($checkCourseIdValable))
        {
            $course_id_in_db = $row['course_id'];
            $course_name_in_db = $row['course_name'];
        }
    }
}
else
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorOnGetParamsWrong");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Subjects List | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4"><?php echo  $course_name_in_db; ?> => Subjects List</h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="menu-subjects-list">Course Subjects</a></li>
                            <li class="breadcrumb-item active"><b><?php echo  $course_name_in_db; ?></b></li>
                            <li class="breadcrumb-item active">Subjects List</li>
                            <li class="breadcrumb-item active"><a href="menu-subjects-list-actions?action=addNew&subject_id=<?php echo rand(10000,99999); ?>&actionTaken=true&csname=<?php echo $course_name_in_db; ?>&csid=<?php echo $course_id_in_db; ?>"><b><i class="fa fa-plus"></i> Add New Subject</b></a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="StudentsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>SubjectId</th>
                                            <th>SubjectName</th>
                                            <th>LastUpdated</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    
                                        $checkCourseTabandCourseSubject = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$course_id_in_db' AND isDeleted='0' ORDER BY id DESC");
                                        $getCntOnCheckSubject = mysqli_num_rows($checkCourseTabandCourseSubject);

                                        if($getCntOnCheckSubject == 0)
                                        {
                                            echo '
                                            <div class="alert alert-primary text-primary">
                                                No Subjects Found On This Course : <i>'.$course_name_in_db.'</i>!
                                            </div>
                                            ';
                                        }
                                        else
                                        {
                                            $sl = 1;
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
                                                <tr>
                                                <td>'.$sl++.'</td>
                                                <td>#'.$subject_id.'</td>
                                                <td>'.$subject_name.'</td>
                                                <td>'.$last_updated.'</td>
                                                <td>'.$showStatus.'</td>
                                                <td><a href="menu-subjects-list-actions?action=editOne&subject_id='.$subject_id.'&actionTaken=true&csname='.$course_name_in_db.'&csid='.$course_id_in_db.'" data-action-id="'.$subject_id.'"><i class="fa fa-edit"></i></a> <a href="menu-subjects-list-actions?action=deleteOne&subject_id='.$subject_id.'&actionTaken=true&csname='.$course_name_in_db.'&csid='.$course_id_in_db.'"  id="D'.$subject_id.'" data-action-id="'.$subject_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
                                                </tr>
                                                ';
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
