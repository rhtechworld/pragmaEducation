<?php

//get all course tabs
$getAllCourseTabs = mysqli_query($conn,"SELECT * FROM course_tabs WHERE isDeleted='0' AND status='0' ORDER BY RAND() LIMIT 6");
$getCOuntOfTabs = mysqli_num_rows($getAllCourseTabs);

if($getCOuntOfTabs == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getAllCourseTabs))
    {
        $course_tab_id = $row['course_tab_id'];
        $course_tab_name = $row['course_tab_name'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $date = $row['date'];
        $last_updated = $row['last_updated'];

        //get Count of courses in Tab
        $getCountOfCoureseOnTab = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$course_tab_id' AND isDeleted='0' ORDER BY id DESC");
        $getCntOfCourses = mysqli_num_rows($getCountOfCoureseOnTab);

        echo '
                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                    <div class="card p-2 shadow" style="border:1px solid black">
                        <b class="mt-2 mb-2" style="font-size:18px">'.$course_tab_name.'</b>
                        <hr style="margin:0">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                <a href="check-list?ct='.$course_tab_id.'" class="btn btn-primary btn-sm">Check Course List</a>
                            </div>
                        </div>
                    </div>
                </div>
        ';
    }
}

?>