<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-student-all-details.php'); ?>
<?php
    if(isset($_GET['action']) && isset($_GET['studentId']) && isset($_GET['enId']))
    {
        $actionOnUrl = mysqli_real_escape_string($conn, $_GET['action']);
        $studentIdOnUrl = mysqli_real_escape_string($conn, $_GET['studentId']);
        $enIdOnUrl = mysqli_real_escape_string($conn, $_GET['enId']);
        $studentVerifyOnUrl = mysqli_real_escape_string($conn, $_GET['studentVerify']);

        if($actionOnUrl == 'addNew')
        {
            //add new
        }
        else if($actionOnUrl == 'editOne')
        {
            $getCoursesEnrolledNow = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$studentIdOnUrl' AND assign_id='$enIdOnUrl' AND isDeleted='0'");
            $getCountOnThisEnrolledEnrolledNow = mysqli_num_rows($getCoursesEnrolledNow);
            if($getCountOnThisEnrolledEnrolledNow == 0)
            {
                echo '<script>alert("Somthing issue with Enrollment ID, try again later!")</script>';
                header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=SomthingIssueWithEnrollmentId");
            }
            else
            {
                while($row = mysqli_fetch_array($getCoursesEnrolledNow))
                {
                    $assign_id_forMenu = $row['assign_id'];
                    $student_id_forMenu = $row['student_id'];
                    $student_email_forMenu = $row['student_email'];
                    $course_tab_id_forMenu = $row['course_tab_id'];
                    $course_id_forMenu = $row['course_id'];
                    $video_id_forMenu = $row['video_id'];
                    $date_forMenu = $row['date'];
                    $status_forMenu = $row['status'];
                    $isDeleted_forMenu = $row['isDeleted'];
                    $last_updated_forMenu = $row['last_updated'];

                    //check course details in db
                    $checkCourseDetailsInDBThis = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_forMenu'");
                    while($row = mysqli_fetch_array($checkCourseDetailsInDBThis))
                    {
                        $course_id = $row['course_id'];
                        $course_name = $row['course_name'];
                    }

                }
            }
        }
        else if($actionOnUrl == 'deleteOne')
        {
            $getCoursesEnrolledNow = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$studentIdOnUrl' AND assign_id='$enIdOnUrl' AND isDeleted='0'");
            $getCountOnThisEnrolledEnrolledNow = mysqli_num_rows($getCoursesEnrolledNow);
            if($getCountOnThisEnrolledEnrolledNow == 0)
            {
                echo '<script>alert("Somthing issue with Enrollment ID, try again later!")</script>';
                header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=SomthingIssueWithEnrollmentId");
            }
            else
            {
                while($row = mysqli_fetch_array($getCoursesEnrolledNow))
                {
                    $assign_id_forMenu = $row['assign_id'];
                    $student_id_forMenu = $row['student_id'];
                    $student_email_forMenu = $row['student_email'];
                    $course_tab_id_forMenu = $row['course_tab_id'];
                    $course_id_forMenu = $row['course_id'];
                    $video_id_forMenu = $row['video_id'];
                    $date_forMenu = $row['date'];
                    $status_forMenu = $row['status'];
                    $isDeleted_forMenu = $row['isDeleted'];
                    $last_updated_forMenu = $row['last_updated'];

                    //check course details in db
                    $checkCourseDetailsInDBThis = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_forMenu'");
                    while($row = mysqli_fetch_array($checkCourseDetailsInDBThis))
                    {
                        $course_id = $row['course_id'];
                        $course_name = $row['course_name'];
                    }

                }
            }
        }
        else
        {
            echo '<script>alert("Somthing Issue With Action, try again later!")</script>';
            header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=SomthingIssueWithAction");
        }
    }
    else
    {
        echo '<script>alert("Somthing is missing, try again later!")</script>';
        header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=SomeParameterIsMissingOnUrl");
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
        <title>Enroll New Course | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Enrollred Course : <?php echo $student_email; ?></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><b><a href="view-student-details?studentId=<?php echo $getUrlStudentId; ?>">Student Details (<?php echo $getUrlStudentId; ?>)</a></b></li>
                            <li class="breadcrumb-item">Enrollred Course</li>
                        </ol>
                        <?php include('functions/student-course-enrolled-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">                               
                                <?php

                                if($actionOnUrl == 'addNew')
                                {
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="course-tab-name"><b>Select Course Tab:</b> </label>
                                            <select class="form-control" id="course-tab" name="courseTab" onchange="getCourseListOnCourseTab(this.value)" required>
                                                <option value="">-- Select Course Tab --</option>
                                                <?php
                                                    //query to run show list drop down of course tabs
                                                    $showDropDownCouseTabs = mysqli_query($conn,"SELECT * FROM course_tabs WHERE isDeleted='0'");
                                                    while($row = mysqli_fetch_array($showDropDownCouseTabs))
                                                    {
                                                        $runningCourseTabId = $row['course_tab_id'];
                                                        $runningCourseTabName = $row['course_tab_name'];
                                                        
                                                        echo '<option value="'.$runningCourseTabId.'">'.$runningCourseTabName.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div id="getCoursesByTab"></div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="EnrollCourseLiveStatus"><b>Enroll Course Status:</b> </label>
                                            <select class="form-control" id="EnrollCourseLiveStatus" name="EnrollCourseLiveStatus" required>
                                                <option value="">-- Select Status --</option>
                                                <option value="0">Active</option>
                                                <option value="1">InActive</option>
                                            </select>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <button type="submit" name="enrollCourseByAdmin" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Enroll Course Now</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                } 
                                else if($actionOnUrl == 'editOne')
                                {
                                    
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="inputCourseNameEnrolled">Course Name</label>
                                            <input type="email" class="form-control" id="inputCourseNameEnrolled" name="inputCourseNameEnrolled" value="<?php if(isset($course_name)) { echo $course_name; } else { echo ''; } ?>" placeholder="Course Name" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEnrolledIdHere">Enrolled ID</label>
                                            <input type="email" class="form-control" id="inputEnrolledIdHere" name="inputEnrolledIdHere" value="<?php if(isset($assign_id_forMenu)) { echo $assign_id_forMenu; } else { echo ''; } ?>" placeholder="Enrolled Id" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="EnrollCourseLiveStatus"><b>Enroll Course Status:</b> </label>
                                            <select class="form-control" id="EnrollCourseLiveStatus" name="EnrollCourseLiveStatus" required>
                                                <option value="">-- Select Status --</option>
                                                <option value="0" <?php if(isset($status_forMenu)) { if($status_forMenu == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Active</option>
                                                <option value="1" <?php if(isset($status_forMenu)) { if($status_forMenu == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>InActive</option>
                                            </select>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <button type="submit" name="enrollCourseUpdateNow" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Update Enrollment Now</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php
                                }
                                else if($actionOnUrl == 'deleteOne')
                                {
                                    ?>
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="inputCourseNameEnrolled">Course Name</label>
                                            <input type="email" class="form-control" id="inputCourseNameEnrolled" name="inputCourseNameEnrolled" value="<?php if(isset($course_name)) { echo $course_name; } else { echo ''; } ?>" placeholder="Course Name" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEnrolledIdHere">Enrolled ID</label>
                                            <input type="email" class="form-control" id="inputEnrolledIdHere" name="inputEnrolledIdHere" value="<?php if(isset($assign_id_forMenu)) { echo $assign_id_forMenu; } else { echo ''; } ?>" placeholder="Enrolled Id" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label for="EnrollCourseLiveStatus"><b>Enroll Course Status:</b> </label>
                                            <select class="form-control" id="EnrollCourseLiveStatus" name="EnrollCourseLiveStatus" readonly required>
                                                <option value="">-- Select Status --</option>
                                                <option value="0" <?php if(isset($status_forMenu)) { if($status_forMenu == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Active</option>
                                                <option value="1" <?php if(isset($status_forMenu)) { if($status_forMenu == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>InActive</option>
                                            </select>
                                        </div>    
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                <button type="submit" name="enrollCourseDeleteNow" class="btn btn-danger btn-block"><i class="fa fa-trash"></i> Delete Enrollment Now</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                                else
                                {
                                    echo '<script>alert("Somthing Issue With Action, try again later!")</script>';
                                    header("Refresh:0; url=view-student-details?studentId=".$getUrlStudentId."&msg=SomthingIssueWithAction");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               