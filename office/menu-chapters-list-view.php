<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['courseId']) && isset($_GET['subjectId']))
{
    $get_courseId = mysqli_real_escape_string($conn, $_GET['courseId']);
    $get_subjectId = mysqli_real_escape_string($conn, $_GET['subjectId']);

    //check CourseId
    $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$get_courseId' AND isDeleted='0'");
    $makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

    if($makeCOuntOnCourses == 0)
    {
        echo '<script>alert("Internal Server Error, Try again!")</script>';
        header("Refresh:0; url=menu-chapters-list?msg=InternalServerErrorCourseIdWrongOrDeleted");
    }
    else
    {
        while($row = mysqli_fetch_array($checkCourseIdValable))
        {
            $course_id_in_db = $row['course_id'];
            $course_name_in_db = $row['course_name'];
        }
    }

    //getSubjectDetailsFromDb
    $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$get_subjectId' AND isDeleted='0'");
    $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

    if($makeCountOnDbSubjectsNow == 0)
    {
        echo '<script>alert("Internal Server Error, Try again!")</script>';
        header("Refresh:0; url=menu-chapters-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
    }
    else
    {
        while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
        {
            $subject_id_in_db = $row['subject_id'];
            $course_id_in_db  = $row['course_id'];
            $subject_type_in_db  = $row['subject_type'];
            $subject_paper_in_db  = $row['subject_paper'];
            $subject_name_in_db  = $row['subject_name'];
            $subject_desc_in_db  = $row['subject_desc'];
            $date_in_db  = $row['date'];
            $status_in_db  = $row['status'];
            $isDeleted_in_db  = $row['isDeleted'];
            $last_updated_in_db  = $row['last_updated'];
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
        <title>Subject Chapters List | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4"><?php echo  $course_name_in_db; ?> => <?php echo $subject_name_in_db; ?> => Chapters List</h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="menu-chapters-list">Subject Chapters</a></li>
                            <li class="breadcrumb-item active"><b><?php echo  $subject_name_in_db; ?></b></li>
                            <li class="breadcrumb-item active">Chapters List</li>
                            <li class="breadcrumb-item active"><a href="menu-chapters-list-actions?action=addNew&chapter_id=<?php echo rand(10000,99999); ?>&subject_id=<?php echo $subject_id_in_db; ?>&course_id=<?php echo $course_id_in_db; ?>&actionTaken=true"><b><i class="fa fa-plus"></i> Add New Chapter</b></a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="StudentsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>ChapterId</th>
                                            <th>ChapterName</th>
                                            <th>LastUpdated</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    
                                        $checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE subject_id='$subject_id_in_db' AND isDeleted='0' ORDER BY id DESC");
                                        $getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

                                        if($getCntOnCheckSubjectChapters == 0)
                                        {
                                            echo '
                                            <div class="alert alert-primary text-primary">
                                                No Chapters Found On This Subject : <i>'.$subject_name_in_db.'</i>!
                                            </div>
                                            ';
                                        }
                                        else
                                        {
                                            $sl = 1;
                                            while($row = mysqli_fetch_array($checkCourseTabandCourseSubjectChapters))
                                            {
                                                $chapter_id = $row['chapter_id'];
                                                $subject_id = $row['subject_id'];
                                                $chapter_name = $row['chapter_name'];
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
                                                <td>#'.$chapter_id.'</td>
                                                <td>'.$chapter_name.'</td>
                                                <td>'.$last_updated.'</td>
                                                <td>'.$showStatus.'</td>
                                                <td><a href="menu-chapters-list-actions?action=editOne&chapter_id='.$chapter_id.'&subject_id='.$subject_id_in_db.'&course_id='.$course_id_in_db.'&actionTaken=true" data-action-id="'.$chapter_id.'"><i class="fa fa-edit"></i></a> <a href="menu-chapters-list-actions?action=deleteOne&chapter_id='.$chapter_id.'&subject_id='.$subject_id_in_db.'&course_id='.$course_id_in_db.'&actionTaken=true"  id="D'.$chapter_id.'" data-action-id="'.$chapter_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
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
               
