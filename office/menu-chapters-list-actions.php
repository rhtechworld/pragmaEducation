<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['action']) && isset($_GET['chapter_id']) && isset($_GET['actionTaken']) && isset($_GET['subject_id']) && isset($_GET['course_id']))
{
    $action_get = mysqli_real_escape_string($conn, $_GET['action']);
    $chapter_id_get = mysqli_real_escape_string($conn, $_GET['chapter_id']);
    $actionTaken_get = mysqli_real_escape_string($conn, $_GET['actionTaken']);
    $subject_id_get = mysqli_real_escape_string($conn, $_GET['subject_id']);
    $course_id_get = mysqli_real_escape_string($conn, $_GET['course_id']);

    if($action_get == 'addNew' && $actionTaken_get == true)
    {
        //check CourseId
        $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_get' AND isDeleted='0'");
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
        
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_get' AND isDeleted='0'");
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

        $pageTitileHead = "Add New Chapter";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="addNewChapterNow" class="btn btn-primary btn-block">Add New Chapter</button>';
    }
    else if($action_get == 'editOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-chapters-list?msg=InternalServerErrorOnGetParamsChapterNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $chapter_id = $row['chapter_id'];
                $subject_id = $row['subject_id'];
                $chapter_name = $row['chapter_name'];
                $date = $row['date'];
                $status_db = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }

            //getSubjectDetailsFromDb
            $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id' AND isDeleted='0'");
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
                    $subject_name_in_db  = $row['subject_name'];
                }
            }
        }

        $pageTitileHead = "Edit Chapter";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="updateAddedChapterNow" class="btn btn-primary btn-block">Update Subject</button>';
    }
    else if($action_get == 'deleteOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-chapters-list?msg=InternalServerErrorOnGetParamsChapterNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $chapter_id = $row['chapter_id'];
                $subject_id = $row['subject_id'];
                $chapter_name = $row['chapter_name'];
                $date = $row['date'];
                $status_db = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }

            //getSubjectDetailsFromDb
            $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id' AND isDeleted='0'");
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
                    $subject_name_in_db  = $row['subject_name'];
                }
            }
        }

        $pageTitileHead = "Delete Chapter";
        $inputActionOnFocus = 'readonly';
        $actionButtonToTakeAction = '<button type="submit" name="deleteAddedChapterNow" class="btn btn-danger btn-block">Delete Subject</button>';
    }
    else
    {
        echo '<script>alert("Internal Server Error, Try again!")</script>';
        header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorOnGetParamsWrongActionTaken");
    }

}
else
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorOnGetParamsWrongOnSubject");
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
        <title>CHapter Action | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:17px"><?php echo $pageTitileHead; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="menu-chapters-list">Subjects Chapters</a> </li>
                            <li class="breadcrumb-item active"><b><a href="menu-chapters-list-view?courseId=<?php echo $course_id_get; ?>&subjectId=<?php echo $subject_id_get; ?>"><?php echo $subject_name_in_db; ?></a></b></li>
                            <li class="breadcrumb-item"><?php echo $pageTitileHead; ?></li>
                        </ol>
                        <?php include('functions/menu-chapters-list-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="chapterNameInput"><b>Chapter Name :</b></label>
                                        <input type="text" class="form-control" id="chapterNameInput" name="chapterNameInput" value="<?php if(isset($chapter_name)) { echo $chapter_name; } else { echo ''; } ?>" placeholder="Chapter Name" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="chapterStatusInput"><b>Chapter Status :</b></label>
                                        <select class="form-control" id="chapterStatusInput" name="chapterStatusInput" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select Status--</option> 
                                            <option value='0' <?php if(isset($status_db)) { if($status_db == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($status_db)) { if($status_db == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
                                        </select>
                                    </div>
                                    <?php echo $actionButtonToTakeAction; ?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
      
