<?php

$urlCourseTabIdOnGet = mysqli_real_escape_string($conn, $_GET['ct']);

    $gettingCourseTabOnGet = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$urlCourseTabIdOnGet' AND isDeleted='0' AND status='0'");
    $checkCOuntOnTabsOnGet = mysqli_num_rows($gettingCourseTabOnGet);

    if($checkCOuntOnTabsOnGet == 0)
    {
        echo '<script>alert("Somthing missing! Try again!")</script>';
        header('location:all-courses');
    }
    else
    {
        //get Courese tab on courese
        while($row = mysqli_fetch_array($gettingCourseTabOnGet))
        {
            $dbCoureseTabName = $row['course_tab_name'];
        }
    }

?>