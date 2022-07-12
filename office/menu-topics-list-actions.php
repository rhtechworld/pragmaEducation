<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['action']) && isset($_GET['chapter_id']) && isset($_GET['topic_id']) && isset($_GET['actionTaken']) && isset($_GET['subject_id']) && isset($_GET['course_id']))
{
    $action_get = mysqli_real_escape_string($conn, $_GET['action']);
    $chapter_id_get = mysqli_real_escape_string($conn, $_GET['chapter_id']);
    $actionTaken_get = mysqli_real_escape_string($conn, $_GET['actionTaken']);
    $subject_id_get = mysqli_real_escape_string($conn, $_GET['subject_id']);
    $course_id_get = mysqli_real_escape_string($conn, $_GET['course_id']);
    $topic_id_get = mysqli_real_escape_string($conn, $_GET['topic_id']);

    if($action_get == 'addNew' && $actionTaken_get == true)
    {
        //check CourseId
        $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_get' AND isDeleted='0'");
        $makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

        if($makeCOuntOnCourses == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorCourseIdWrongOrDeleted");
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
            header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
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

        //chapters
        $checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_get' AND isDeleted='0'");
        $getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

        if($getCntOnCheckSubjectChapters == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsChapterIdNotFoundOrDeleted");
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

        $pageTitileHead = "Add New Topic";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="addNewTopicNow" class="btn btn-primary btn-block">Add New Topic</button>';
    }
    else if($action_get == 'editOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE topic_id='$topic_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsTopicNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $course_id_topicDetails = $row['course_id'];
                $subject_id_topicDetails = $row['subject_id'];
                $topic_id_topicDetails = $row['topic_id'];
                $chapter_id_topicDetails = $row['chapter_id'];
                $topic_name_topicDetails = $row['topic_name'];
                $topic_by_topicDetails = $row['topic_by'];
                $topic_content_topicDetails = $row['topic_content'];
                $topic_video_topicDetails = $row['topic_video'];
                $topic_status_topicDetails = $row['topic_status'];
                $topic_date_topicDetails = $row['topic_date'];
                $status_topicDetails = $row['status'];
                $isDeleted_topicDetails = $row['isDeleted'];
                $last_updated_topicDetails = $row['last_updated'];
            }

            //getSubjectDetailsFromDb
            $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_topicDetails' AND isDeleted='0'");
            $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

            if($makeCountOnDbSubjectsNow == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
            }
            else
            {
                while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
                {
                    $subject_id_in_db = $row['subject_id'];
                    $subject_name_in_db  = $row['subject_name'];
                }
            }

            //chapters
            $checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_topicDetails' AND isDeleted='0'");
            $getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

            if($getCntOnCheckSubjectChapters == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsChapterIdNotFoundOrDeleted");
            }
            else
            {
                while($row = mysqli_fetch_array($checkCourseTabandCourseSubjectChapters))
                {
                    $chapter_id_in_db = $row['chapter_id'];
                    $subject_id_in_db = $row['subject_id'];
                    $chapter_name_in_db = $row['chapter_name'];
                }

            }

            //check CourseId
            $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_topicDetails' AND isDeleted='0'");
            $makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

            if($makeCOuntOnCourses == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorCourseIdWrongOrDeleted");
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

        $pageTitileHead = "Edit Topic";
        $inputActionOnFocus = '';
        $actionButtonToTakeAction = '<button type="submit" name="updateAddedTopicNow" class="btn btn-primary btn-block">Update Topic</button>';
    }
    else if($action_get == 'deleteOne' && $actionTaken_get == true)
    {
        //getSubjectDetailsFromDb
        $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE topic_id='$topic_id_get' AND isDeleted='0'");
        $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

        if($makeCountOnDbSubjectsNow == 0)
        {
            echo '<script>alert("Internal Server Error, Try again!")</script>';
            header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsTopicNotFoundOrDeleted");
        }
        else
        {
            while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
            {
                $course_id_topicDetails = $row['course_id'];
                $subject_id_topicDetails = $row['subject_id'];
                $topic_id_topicDetails = $row['topic_id'];
                $chapter_id_topicDetails = $row['chapter_id'];
                $topic_name_topicDetails = $row['topic_name'];
                $topic_by_topicDetails = $row['topic_by'];
                $topic_content_topicDetails = $row['topic_content'];
                $topic_video_topicDetails = $row['topic_video'];
                $topic_status_topicDetails = $row['topic_status'];
                $topic_date_topicDetails = $row['topic_date'];
                $status_topicDetails = $row['status'];
                $isDeleted_topicDetails = $row['isDeleted'];
                $last_updated_topicDetails = $row['last_updated'];
            }

            //getSubjectDetailsFromDb
            $getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_topicDetails' AND isDeleted='0'");
            $makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

            if($makeCountOnDbSubjectsNow == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsSubjectIdNotFoundOrDeleted");
            }
            else
            {
                while($row = mysqli_fetch_array($getSubjectDetailsFromDb))
                {
                    $subject_id_in_db = $row['subject_id'];
                    $subject_name_in_db  = $row['subject_name'];
                }
            }

            //chapters
            $checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_topicDetails' AND isDeleted='0'");
            $getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

            if($getCntOnCheckSubjectChapters == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsChapterIdNotFoundOrDeleted");
            }
            else
            {
                while($row = mysqli_fetch_array($checkCourseTabandCourseSubjectChapters))
                {
                    $chapter_id_in_db = $row['chapter_id'];
                    $subject_id_in_db = $row['subject_id'];
                    $chapter_name_in_db = $row['chapter_name'];
                }

            }

            //check CourseId
            $checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_topicDetails' AND isDeleted='0'");
            $makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

            if($makeCOuntOnCourses == 0)
            {
                echo '<script>alert("Internal Server Error, Try again!")</script>';
                header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorCourseIdWrongOrDeleted");
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

        $pageTitileHead = "Delete Topic";
        $inputActionOnFocus = 'readonly';
        $actionButtonToTakeAction = '<button type="submit" name="deleteAddedTopicNow" class="btn btn-danger btn-block">Delete Topic</button>';
    }
    else
    {
        echo '<script>alert("Internal Server Error, Try again!")</script>';
        header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsWrongActionTaken");
    }

}
else
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=menu-topics-list?msg=InternalServerErrorOnGetParamsWrongOnSubject");
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
        <title>Topic Action | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:17px"><?php echo $pageTitileHead; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="menu-topics-list">Chapter Topics</a> </li>
                            <li class="breadcrumb-item active"><b><a href="menu-topics-list-view?courseId=<?php echo $course_id_get; ?>&subjectId=<?php echo $subject_id_get; ?>&chapterId=<?php echo $chapter_id_get; ?>"><?php echo $chapter_name_in_db; ?></a></b></li>
                            <li class="breadcrumb-item"><?php echo $pageTitileHead; ?></li>
                        </ol>
                        <?php include('functions/menu-topics-list-actions.php'); ?>
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
                                        <label for="topicStatusInput"><b>Topic Status :</b></label>
                                        <select class="form-control" id="topicStatusInput" name="topicStatusInput" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select --</option> 
                                            <option value='0' <?php if(isset($topic_status_topicDetails)) { if($topic_status_topicDetails == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($topic_status_topicDetails)) { if($topic_status_topicDetails == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
                                        </select>
                                    </div>
                                    <g class="mb-4"><b>NOTE : </b> Check <b><a href="https://drive.google.com/uc?id=<?php echo $topic_video_topicDetails; ?>&export=view" id="previewVideoOnModalOnAddTwo" target="_blank">Preview</a></b> Before Add, It Ignores the issues on video playing. If Preview not works then check video id again!<br><br></g>
                                    <?php echo $actionButtonToTakeAction; ?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
      
