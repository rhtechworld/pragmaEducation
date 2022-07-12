<?php

$assigned_course_id = mysqli_real_escape_string($conn, $_GET['course_id']);
$assigned_assign_id = mysqli_real_escape_string($conn, $_GET['assign_id']);

if(empty($assigned_course_id) && empty($assigned_assign_id))
{
    echo '<script>alert("Invalid Access, Try again!")</script>';
    header('location:./?courseAccess=failed');
}
else
{
    //check course enrollment
    $verifyCourseEnrollment = mysqli_query($conn,"SELECT * FROM course_assigned WHERE assign_id='$assigned_assign_id' AND course_id='$assigned_course_id' AND isDeleted='0'");
    $verifyCourseEnrollmentCount = mysqli_num_rows($verifyCourseEnrollment);

    if($verifyCourseEnrollmentCount == 0)
    {
        echo '<script>alert("Invalid Access, Try again!")</script>';
        header('location:./?courseAccess=failedInvalidAccess');
    }
    else
    {
        //do nothing
        while($row = mysqli_fetch_array($verifyCourseEnrollment))
        {
            $courseAssignedStatusCheck = $row['status'];

            if($courseAssignedStatusCheck == 0)
            {
                //do nothing
                $showInactiveNote = '';
                $CourseThingsAccessOnStatus = 0;
            }
            else
            {
                //show Note
                $showInactiveNote = '<div class="alert alert-danger text-center">
                                        <b>InActive!!!</b>, This course is in-active on access, contact support team for activation.
                                    </div>';
                $CourseThingsAccessOnStatus = 1;
            }
        }
        //getCourseDetailsHere
        $gettingCourseOnGet_CourseDashboard = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$assigned_course_id'");
        while($row = mysqli_fetch_array($gettingCourseOnGet_CourseDashboard))
        {

            $course_tab_id_CourseDashboard = $row['course_tab_id'];
            $course_id_CourseDashboard = $row['course_id'];
            $course_name_CourseDashboard = $row['course_name'];
            $status_CourseDashboard = $row['status'];
            $isDeleted_CourseDashboard = $row['isDeleted'];
            $date_CourseDashboard = $row['date'];
            $last_updated_CourseDashboard = $row['last_updated'];

        }

        $getCountOfPrimlisFromDataBase = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$assigned_course_id' AND subject_type='Prelims' AND isDeleted='0'");
        $countgetCountOfPrimlisFromDataBase = mysqli_num_rows($getCountOfPrimlisFromDataBase);

        $getCountOfMainsFromDataBase = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$assigned_course_id' AND subject_type='Mains' AND isDeleted='0'");
        $countgetCountOfMainsFromDataBase = mysqli_num_rows($getCountOfMainsFromDataBase);
    }
}

?>