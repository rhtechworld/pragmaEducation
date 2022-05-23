<?php

//get all courses
$getAllCourses = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0' ORDER BY id DESC");
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
        $getCOureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id' AND isDeleted='0'");
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

        //status show
        if($status == 0)
        {
            $showThisStatus = '<span class="badge badge-success">Active</span>';
        }
        else
        {
            $showThisStatus = '<span class="badge badge-danger">InActive</span>';
        }

        echo '
        <tr>
            <td>'.$sl++.'</td>
            <td>#'.$course_id.'</td>
            <td><b>'.$course_name.'</b></td>
            <td>'.$dbCoureseTabName.'</td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="course-details?courseId='.$course_id.'" id="E'.$course_id.'" data-action-id="'.$course_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="course-list-delete" id="D'.$course_id.'" data-action-id="'.$course_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>