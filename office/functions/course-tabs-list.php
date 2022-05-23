<?php

//get all course tabs
$getAllCourseTabs = mysqli_query($conn,"SELECT * FROM course_tabs WHERE isDeleted='0' ORDER BY id DESC");
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
            <td>#'.$course_tab_id.'</td>
            <td><b>'.$course_tab_name.'</b></td>
            <td><b>'.$getCntOfCourses.'</b></td>
            <td>'.$showThisStatus.'</td>
            <td>'.$last_updated.'</td>
            <td><a href="#" class="js-edit-coursetab" id="E'.$course_tab_id.'" data-action-id="'.$course_tab_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="js-delete-coursetab" id="D'.$course_tab_id.'" data-action-id="'.$course_tab_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>