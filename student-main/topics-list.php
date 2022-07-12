<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/verify-course-enrollment.php'); ?>
<?php

$chapter_id_get = mysqli_real_escape_string($conn, $_GET['chapter_id']);


//chapters
$checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE chapter_id='$chapter_id_get' AND isDeleted='0'");
$getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

if($getCntOnCheckSubjectChapters == 0)
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=course-classes?course_id=".$assigned_course_id."&assign_id=".$assigned_assign_id."&msg=ChapterIdNotFound");
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

//getSubjectDetailsFromDb
$getSubjectDetailsFromDb = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_id='$subject_id_in_db' AND isDeleted='0'");
$makeCountOnDbSubjectsNow = mysqli_num_rows($getSubjectDetailsFromDb);

if($makeCountOnDbSubjectsNow == 0)
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=course-classes?course_id=".$assigned_course_id."&assign_id=".$assigned_assign_id."&msg=SubjectIdNotFound");
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


//check CourseId
$checkCourseIdValable = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_in_db' AND isDeleted='0'");
$makeCOuntOnCourses = mysqli_num_rows($checkCourseIdValable);

if($makeCOuntOnCourses == 0)
{
    echo '<script>alert("Internal Server Error, Try again!")</script>';
    header("Refresh:0; url=course-classes?course_id=".$assigned_course_id."&assign_id=".$assigned_assign_id."&msg=CourseIdNotFound");
}
else
{
    while($row = mysqli_fetch_array($checkCourseIdValable))
    {
        $course_id_in_db = $row['course_id'];
        $course_name_in_db = $row['course_name'];
    }
}


$checkCourseTabandCourseSubjectChapters = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE chapter_id='$chapter_id_in_db' AND isDeleted='0' ORDER BY id DESC");
$getCntOnCheckSubjectChapters = mysqli_num_rows($checkCourseTabandCourseSubjectChapters);

if($getCntOnCheckSubjectChapters == 0)
    {
        //do nothing
    }
    else
    {
        $sl = 1;
        while($row = mysqli_fetch_array($checkCourseTabandCourseSubjectChapters))
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
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>All Topics | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    
    <main id="main">

        <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
            <h4 style="font-size:20px"><span>Chapter Topics : </span><?php echo $chapter_name_in_db; ?> </h4>
        </div>

        <div class="container mb-4">
            <div class="row mt-2">
            <div class="row my-auto text-center">
                <div class="col-lg-6 col-md-6 my-auto">
                    <b class="text-center"><?php echo $assigned_assign_id; ?></b> | <b><a href="course-classes?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>" style="color:#E31E26">Course Classes</a></b>
                </div>
                <div class="col-lg-6 col-md-6 text-right my-auto">
                        <select class="form-control form-control-sm" style="border:1px solid #E31E26" id="ActionOnCourseEnrolled" onchange="takePageActionNow()">
                            <option value="">-- Action To --</option>
                            <option value="course-dashboard">Dashboard</option>
                            <option value="course-classes">Course Classes</option>
                            <option value="course-updates">Course Updates</option>
                            <option value="course-faqs">Course Faq's</option>
                            <option value="course-payment">Payment History</option>
                        </select>
                </div>
            </div>
            <br><br>
            <hr>
            
        <?php echo $showInactiveNote; ?>
                <?php 
                
                //getcoursesby course id
                $getCoursesByListId = mysqli_query($conn,"SELECT * FROM chapter_topics WHERE chapter_id='$chapter_id_in_db' AND isDeleted='0' AND status='0' ORDER BY id DESC");
                $getCOuntOfCourses = mysqli_num_rows($getCoursesByListId);

                if($getCOuntOfCourses == 0)
                        {
                            echo '<div class="alert alert-warning text-center">
                                    No Topics Found On Chapter : '.$chapter_name_in_db.'!
                                    </div>';
                        }
                        else
                        {
                            echo '
                            <div class="p-2">
                            <g>Course : <b>'.$course_name_in_db.'</b></g> / <g>Subject : <b>'.$subject_name_in_db.'</b></g> / <g>Chapter : <b>'.$chapter_name_in_db.'</b></g>
                            </div><br><br>
                            <hr>
                            ';
                            while($row = mysqli_fetch_array($getCoursesByListId))
                            {
                                $id_topicDetails = $row['id'];
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


                                echo '
                                    <div class="mb-2 col-md-4 col-lg-4 p-2 text-center my-auto">
                                        <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                            <b class="mt-2 mb-2" style="font-size:19px">'.$topic_name_topicDetails.'</b>
                                            <hr style="margin:0">
                                            <div class="row my-auto">
                                                <div class="col-md-8 col-lg-8 text-center mt-2 mb-1 my-auto">
                                                By <b>'.$topic_by_topicDetails.'</b>
                                                </div>
                                                <div class="col-md-4 col-lg-4 text-center mt-2 mb-1 my-auto">
                                                <a href="take-class?chapter_id='.$chapter_id_topicDetails.'&course_id='.$assigned_course_id.'&assign_id='.$assigned_assign_id.'&subject_id='.$subject_id_topicDetails.'&topic_id='.$topic_id_topicDetails.'&tid='.$id_topicDetails.'&subjectVerify=true&verifyenrolled=true&accessCourse=true" class="btn btn-primary btn-sm newButtonEffect">Take Class</a>
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

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
            function takePageActionNow()
            {
                var ActionOnCourseEnrolled = document.getElementById('ActionOnCourseEnrolled').value;

               // alert(ActionOnCourseEnrolled);

                if(ActionOnCourseEnrolled == '')
                {
                    window.location.replace('course-dashboard?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>&verifyenrolled=true&accessCourse=true');
                }
                else
                {
                    window.location.replace(''+ActionOnCourseEnrolled+'?course_id=<?php echo $assigned_course_id; ?>&assign_id=<?php echo $assigned_assign_id; ?>&verifyenrolled=true&accessCourse=true');
                }
            }
    </script>

    <script>
    $('.collapse').collapse()
    </script>

<? ob_flush(); ?>