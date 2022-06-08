<?php

//getAllActiveCourses
$getALlActiveCourses = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$student_id_session' AND status='0' AND isDeleted='0'");
$getCountOnActiveCourses = mysqli_num_rows($getALlActiveCourses);

if($getCountOnActiveCourses == 0)
{
    echo '<div class="alert alert-warning text-center">
    No Active Courses!
    </div>';
}
else
{
    while($row = mysqli_fetch_array($getALlActiveCourses))
    {
        $assign_id = $row['assign_id'];
        $student_id = $row['student_id'];
        $student_email = $row['student_email'];
        $course_tab_id = $row['course_tab_id'];
        $course_id = $row['course_id'];
        $video_id = $row['video_id'];
        $date = $row['date'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        //get student details
        $getStudentDetailsHere = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id'");
        while($row = mysqli_fetch_array($getStudentDetailsHere))
        {
            $course_tab_id = $row['course_tab_id'];
            $course_id = $row['course_id'];
            $course_name = $row['course_name'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $date = $row['date'];
            $last_updated = $row['last_updated'];

            //get Courese tab on courese
            $getCoureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id'");
            while($row = mysqli_fetch_array($getCoureseTabOnCourse))
            {
                $dbCoureseTabName = $row['course_tab_name'];
            }

        }

        echo '
                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                    <div class="card p-2 shadow" style="border:1px solid red">
                        <b class="mt-2 mb-2" style="font-size:18px">'.$course_name.'</b>
                        <hr style="margin:0">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 text-center mt-2 mb-1">
                                <a class="btn btn-success btn-sm" name="actionAccessCourse" href="course-dashboard?course_id='.$course_id.'&assign_id='.$assign_id.'&verifyenrolled=true&accessCourse=true">Access Course</a>
                            </div>
                            <div class="col-md-6 col-lg-6 text-center mt-2 mb-1 my-auto">
                                Roll ID : '.$assign_id.'
                            </div>
                        </div>
                    </div>
                </div>
        ';
    }
}

?>