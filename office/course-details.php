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
                        <?php include('functions/course-details.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="courses-list">Courses</a> &nbsp;/ Details </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-info-circle me-1"></i>
                                Course Details : <u><b><?php echo $course_name; ?></u></b>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="course-status"><b>Course Status :</b> </label>
                                        <select class="form-control" id="course-status" name="courseStatus" readonly>
                                            <option value="<?php echo $course_status_db; ?>"><?php echo $statusNameShow; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-tab"><b>Course Tab :</b> </label>
                                        <select class="form-control" id="course-tab" name="courseTab" readonly>
                                            <option value="<?php echo $course_tab_id_db; ?>"><?php echo $course_tab_name_db; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-name"><b>Course Name :</b> </label>
                                        <input type="text" class="form-control" id="course-name" name="courseName" value="<?php if(isset($course_name)) echo $course_name; ?>" placeholder="Enter Course Name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Price :</b> </label>
                                        <input type="number" class="form-control" id="course-price" name="coursePrice" value="<?php if(isset($course_price)) echo $course_price; ?>" placeholder="Enter Course Price (eg. 12500)" readonly>
                                        <small id="course-price-words" class="form-text text-muted"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>View Schedule Link :</b> </label>
                                        <input type="text" class="form-control" id="course-view-schedule" name="courseViewSchedule" value="<?php if(isset($view_schedule_link)) echo $view_schedule_link; ?>" placeholder="Enter View Schedule Link" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="course-price"><b>Course Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="courseDesc" rows="15" cols="80" readonly><?php if(isset($course_desc)) echo $course_desc; ?></textarea>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <a class="btn btn-primary btn-sm" href="edit-course-details?courseId=<?php echo $course_id; ?>">Edit Course Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
