<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add New Cource | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Add New Course</h3>
                        <?php include('functions/course-details-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="courses-list">Courses</a> &nbsp;/ Add New Course</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Enter Course Details</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="course-status"><b>Course Status :</b> </label>
                                        <select class="form-control" id="course-status" name="courseStatus" required>
                                            <option value="">-- Select --</option>
                                            <option value="0" selected>Active</option>
                                            <option value="1">InActive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-tab"><b>Select Course Tab :</b> </label>
                                        <select class="form-control" id="course-tab" name="courseTab" required>
                                            <option value="NA">-- No Course Tab --</option>
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
                                        <label for="course-name"><b>Course Name :</b> </label>
                                        <input type="text" class="form-control" id="course-name" name="courseName"  placeholder="Enter Course Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Price :</b> </label>
                                        <input type="number" class="form-control" id="course-price" name="coursePrice"  placeholder="Enter Course Price (eg. 12500)" required>
                                        <small id="course-price-words" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>View Schedule Link :</b> </label>
                                        <input type="text" class="form-control" id="course-view-schedule" name="courseViewSchedule" value="#"  placeholder="Enter View Schedule Link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="courseDesc" rows="15" cols="80" required></textarea>
                                    </div>
                                    <button type="submit" name="addCourseDetails" class="btn btn-primary btn-block">Add Course Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
