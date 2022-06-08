<?php

include('./config.php');

//get course tabs from db

$sqlGetCourceTabs = mysqli_query($conn,"SELECT * FROM course_tabs WHERE isDeleted='0' ORDER BY id DESC");

$getCountsqlGetCourceTabs = mysqli_num_rows($sqlGetCourceTabs);

if($getCountsqlGetCourceTabs == 0)
{
    echo '<hr class="hr-ct" /><b>No Courses Found!</b>';
}
else
{

    $cardIncrement = 1;
    while($row = mysqli_fetch_array($sqlGetCourceTabs))
    {
        $course_tab_id = $row['course_tab_id'];
        $course_tab_name = $row['course_tab_name'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        $passthisIncrement = $cardIncrement++;

        //getlistofcourseshere
        $getCoursesRelatedCourseTab = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$course_tab_id' AND isDeleted='0'");
        $cntofcourses = mysqli_num_rows($getCoursesRelatedCourseTab);

            echo 
            '
            <a href="#" class="btn btn-link text-center btn-link-ct" type="button" data-toggle="collapse" data-target="#Attack'.$course_tab_id.'" aria-expanded="true" aria-controls="Attack'.$course_tab_id.'">
                <div class="card mt-2 text-center main-card-ct">
                    <div class="card-header text-center my-auto main-card-head-ct" id="heading'.$passthisIncrement.'">
                        <h5 class="mb-0">
                            <b>'.$course_tab_name.'</b>
                        </h5>
                    </div>
            </a>
            <div id="Attack'.$course_tab_id.'" class="collapse pt-0" aria-labelledby="heading'.$passthisIncrement.'" data-parent="#accordionExample">
                <div class="card-body pt-0 text-left">
            ';
            
            if($cntofcourses == 0)
            {
                echo '<hr class="hr-ct" /><b>No Courses Found!</b>';
            }
            else
            {

                while($row = mysqli_fetch_array($getCoursesRelatedCourseTab))
                {
                    $course_tab_id_ref = $row['course_tab_id'];
                    $course_id = $row['course_id'];
                    $course_name = $row['course_name'];
                    $status = $row['status'];
                    $isDeleted = $row['isDeleted'];
                    $date = $row['date'];
                    $last_updated = $row['last_updated'];

                    echo '<a class="mb-3 mt-2" href="course-details?course_id='.$course_id.'"><b><i class="bi bi-arrow-right-circle" style="font-size:14px"></i> '.$course_name.'</a></b><br>';

                }
            }

        echo
        '  
                </div>
            </div>
                </div>
        
        ';

    }
}

?>