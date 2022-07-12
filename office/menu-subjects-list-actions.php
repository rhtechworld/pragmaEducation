<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['action']) && isset($_GET['subject_id']) && isset($_GET['actionTaken']) && isset($_GET['csid']) && isset($_GET['csname']))
{
    $action_get = mysqli_real_escape_string($conn, $_GET['action']);
    $subject_id_get = mysqli_real_escape_string($conn, $_GET['subject_id']);
    $actionTaken_get = mysqli_real_escape_string($conn, $_GET['actionTaken']);
    $csname_get = mysqli_real_escape_string($conn, $_GET['csname']);
    $csid_get = mysqli_real_escape_string($conn, $_GET['csid']);

    if($action_get == 'addNew' && $actionTaken_get == true)
    {
        //check CourseId
        $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$csid_get' AND isDeleted='0'");
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
        
        $pageTitileHead = "Add New Subject";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="addNewSubjectNow" class="btn btn-primary btn-block">Add New Subject</button>';
    }
    else if($action_get == 'editOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $subject_id_db = $row['subject_id'];
                $course_id_db  = $row['course_id'];
                $subject_type_db  = $row['subject_type'];
                $subject_paper_db  = $row['subject_paper'];
                $subject_name_db  = $row['subject_name'];
                $subject_desc_db  = $row['subject_desc'];
                $date_db  = $row['date'];
                $status_db  = $row['status'];
                $isDeleted_db  = $row['isDeleted'];
                $last_updated_db  = $row['last_updated'];
            }
        }

        $pageTitileHead = "Edit Subject";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="updateAddedSubjectNow" class="btn btn-primary btn-block">Update Subject</button>';
    }
    else if($action_get == 'deleteOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-subjects-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $subject_id_db = $row['subject_id'];
                $course_id_db  = $row['course_id'];
                $subject_type_db  = $row['subject_type'];
                $subject_paper_db  = $row['subject_paper'];
                $subject_name_db  = $row['subject_name'];
                $subject_desc_db  = $row['subject_desc'];
                $date_db  = $row['date'];
                $status_db  = $row['status'];
                $isDeleted_db  = $row['isDeleted'];
                $last_updated_db  = $row['last_updated'];
            }
        }

        $pageTitileHead = "Delete Subject";
        $inputActionOnFocus = 'readonly';
        $actionButtonToTakeAction = '<button type="submit" name="deleteAddedSubjectNow" class="btn btn-danger btn-block">Delete Subject</button>';
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
        <title>Subject Action | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:17px"><?php echo $pageTitileHead; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="menu-subject-list">Course Subjects</a> </li>
                            <li class="breadcrumb-item active"><b><a href="menu-subjects-list-view?courseId=<?php echo $csid_get; ?>"><?php echo $csname_get; ?></a></b></li>
                            <li class="breadcrumb-item"><?php echo $pageTitileHead; ?></li>
                        </ol>
                        <?php include('functions/menu-subjects-list-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="subjectNameInput"><b>Subject Name :</b></label>
                                        <input type="text" class="form-control" id="subjectNameInput" name="subjectNameInput" value="<?php if(isset($subject_name_db)) { echo $subject_name_db; } else { echo ''; } ?>" placeholder="Subject Name" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="subjectDescInput"><b>Subject Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="subjectDescInput" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($subject_desc_db)) { echo $subject_desc_db; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="subjectLiveStatusInput"><b>Subject Status :</b></label>
                                        <select class="form-control" id="subjectLiveStatusInput" name="subjectLiveStatusInput" required <?php echo $inputActionOnFocus; ?>>
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
      
