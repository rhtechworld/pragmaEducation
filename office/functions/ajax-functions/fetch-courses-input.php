<?php

include('../../../config.php');

$TabId =  mysqli_real_escape_string($conn,$_GET['TabId']);

//check courses in db
$checkCoursesByTabInDB = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$TabId' AND isDeleted='0' ORDER BY id DESC");
$getCountOfDetails = mysqli_num_rows($checkCoursesByTabInDB);

if($getCountOfDetails == 0)
{
    echo '<b>No Courses Found on This Tab!</b>';
}
else
{
    echo '<label for="course"><b>Select Course:</b> </label>
    <select class="form-control" id="course" name="course" onchange="getSubjectTypeByCourse(this.value)" required>
    <option value="">-- Select Course --</option>';

    while($row = mysqli_fetch_array($checkCoursesByTabInDB))
    {
        $course_tab_id = $row['course_tab_id'];
        $course_id = $row['course_id'];
        $course_name = $row['course_name'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $date = $row['date'];
        $last_updated = $row['last_updated'];

        echo 
        '
            <option value="'.$course_id.'">'.$course_name.'</option>
        
        ';

    }

    echo '</select>';

}


?>