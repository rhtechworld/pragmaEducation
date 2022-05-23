<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/course-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cource Details | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Course Details</h3>
                        <?php include('functions/course-details-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="courses-list">Courses</a> &nbsp;/ &nbsp;<a href="course-details?courseId=<?php echo $course_id; ?>"> Details </a> &nbsp;/ Edit </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Edit Course Details : <u><b><?php echo $course_name; ?></u></b>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="course-status"><b>Course Status :</b> </label>
                                        <select class="form-control" id="course-status" name="courseStatus" required>
                                            <option value="">-- Select --</option>
                                            <option value="0" <?php if($course_status_db == 0) echo "selected" ?>>Active</option>
                                            <option value="1" <?php if($course_status_db == 1) echo "selected" ?>>InActive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-tab"><b>Course Tab :</b> </label>
                                        <select class="form-control" id="course-tab" name="courseTab" required>
                                            <?php
                                                while($row = mysqli_fetch_array($showDropDownCouseTabs))
                                                {
                                                    $runningCourseTabId = $row['course_tab_id'];
                                                    $runningCourseTabName = $row['course_tab_name'];
                                                    
                                                    if($runningCourseTabId == $course_tab_id_db)
                                                    {
                                                        echo '<option value="'.$runningCourseTabId.'" selected>'.$runningCourseTabName.'</option>';
                                                    }
                                                    else
                                                    {
                                                        echo '<option value="'.$runningCourseTabId.'">'.$runningCourseTabName.'</option>';
                                                    }
                                                }
                                            ?>
                                            <option value="<?php echo $course_tab_id_db; ?>"><?php echo $course_tab_name_db; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-name"><b>Course Name :</b> </label>
                                        <input type="text" class="form-control" id="course-name" name="courseName" value="<?php if(isset($course_name)) echo $course_name; ?>" placeholder="Enter Course Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Price :</b> </label>
                                        <input type="number" class="form-control" id="course-price" name="coursePrice" value="<?php if(isset($course_price)) echo $course_price; ?>" placeholder="Enter Course Price (eg. 12500)" required>
                                        <small id="course-price-words" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>View Schedule Link :</b> </label>
                                        <input type="text" class="form-control" id="course-view-schedule" name="courseViewSchedule" value="<?php if(isset($view_schedule_link)) echo $view_schedule_link; ?>" placeholder="Enter View Schedule Link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="courseDesc" rows="15" cols="80" required><?php if(isset($course_desc)) echo $course_desc; ?></textarea>
                                    </div>
                                    <button type="submit" name="updateCourseDetails" class="btn btn-primary btn-block">Update Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
