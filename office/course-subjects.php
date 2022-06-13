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
        <title>Course Subjects | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Course Subjects</h5>
                        <?php include('functions/all-course-subject-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Course Subjects </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
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
                                        
                                         <div id="getSubjectTypesByCourse"></div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                        <button type="submit" name="viewCourseSubjects" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> View Course Subjects / Topics</button>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                        <button type="submit" name="AddNewCourseSubjects" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add New Course Subject / Topics</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
