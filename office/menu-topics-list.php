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
        <title>Chapter Topics | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Chapter Topics</h5>
                        <?php include('functions/menu-topics-list-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Chapter Topics </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="courseInputSelect"><b>Select Course:</b> </label>
                                        <select class="form-control" id="courseInputSelect" name="courseInputSelect" onchange="getSubjectBasedOnCourse(this.value);" required>
                                            <option value="">-- Select Course --</option>
                                            <?php
                                                //query to run show list drop down of course tabs
                                                $showDropDownCouseList = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0'");
                                                while($row = mysqli_fetch_array($showDropDownCouseList))
                                                {
                                                    $runningcourse_id = $row['course_id'];
                                                    $runningcourse_name = $row['course_name'];
                                                    
                                                    echo '<option value="'.$runningcourse_id.'">'.$runningcourse_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        
                                         <div id="getSubjectsBasedOnCourse"></div>
                                        
                                    </div>
                                    <div class="form-group">
                                        
                                         <div id="getChaptersBasedOnSubject"></div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                        <button type="submit" name="viewCourseSubjectChaptersTopics" class="btn btn-primary btn-block"> Add / View Chapter Topics</button>
                                        </div>
                                    </div>   

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>

               <script>
                    
                    function getSubjectBasedOnCourse(courseid)
                    {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getSubjectsBasedOnCourse").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "functions/ajax-functions/fetch-course-subjects.php?courseId="+courseid, true);
                    xhttp.send();
                    }
                    
                    function getChaptersBasedOnSubject(subjectid)
                    {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("getChaptersBasedOnSubject").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "functions/ajax-functions/fetch-subjects-chapters.php?subjectId="+subjectid, true);
                    xhttp.send();
                    }
               </script>
               
