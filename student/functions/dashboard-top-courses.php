<?php

//get all courses
$getAllCourses = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0' AND status='0' ORDER BY RAND() LIMIT 6");
$getCOuntOfCourses = mysqli_num_rows($getAllCourses);

if($getCOuntOfCourses == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getAllCourses))
    {
        $course_tab_id = $row['course_tab_id'];
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $date = $row['date'];
        $last_updated = $row['last_updated'];

        //get Courese tab on courese
        $getCOureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id' AND isDeleted='0' AND status='0'");
        $getCntOfCourseTab = mysqli_num_rows($getCOureseTabOnCourse);

        if($getCntOfCourseTab == 0)
        {
            //DO NOTHING
        }
        else
        {
            while($row = mysqli_fetch_array($getCOureseTabOnCourse))
            {
                $dbCoureseTabName = $row['course_tab_name'];
            }
        }

        echo '
                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                    <div class="card p-2 shadow" style="border:1px solid black">
                        <b class="mt-2 mb-2" style="font-size:18px">'.$course_name.'</b>
                        <hr style="margin:0">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                <a href="#" class="btn btn-primary btn-sm">Enroll Now</a>
                            </div>
                        </div>
                    </div>
                </div>
        ';
    }
}

?>