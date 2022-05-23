<?php

//get all Students
$getAllStudents = mysqli_query($conn,"SELECT * FROM students WHERE isDeleted='0' ORDER BY id DESC");
$getCOuntOfStudents = mysqli_num_rows($getAllStudents);

if($getCOuntOfStudents == 0)
{
    //no data
}
else
{
    $sl = 1;
    while($row = mysqli_fetch_array($getAllStudents))
    {
        $student_id = $row['student_id'];
        $student_name = $row['student_name'];
        $student_email = $row['student_email'];
        $student_number = $row['student_number'];
        $date = $row['date'];
        $status = $row['status'];
        $isDeleted = $row['isDeleted'];
        $last_updated = $row['last_updated'];

        //get student_access on student
        $getStudentAccessOnStudent = mysqli_query($conn,"SELECT * FROM student_access WHERE student_id='$student_id'");
        $getCntOfStudentAccess = mysqli_num_rows($getStudentAccessOnStudent);

        if($getCntOfStudentAccess == 0)
        {
            //DO NOTHING
        }
        else
        {
            while($row = mysqli_fetch_array($getStudentAccessOnStudent))
            {
                $count_login_access = $row['count_login'];
                $last_login_access = $row['last_login'];
                $two_fa_access = $row['two_fa'];
                $otp_for_access = $row['otp_for_access'];
                $verify_state_access = $row['verify_state'];
                $status_access = $row['status'];
            }
        }

        //status show
        if($verify_state_access == 0)
        {
            $showVerifyStatus = '<span class="badge badge-danger">Not Verified</span>';
        }
        else
        {
            $showVerifyStatus = '<span class="badge badge-success">Verified</span>';
        }

        echo '
        <tr>
            <td>'.$sl++.'</td>
            <td>#'.$student_id.'</td>
            <td><b>'.$student_name.'</b></td>
            <td>'.$student_email.'</td>
            <td>'.$student_number.'</td>
            <td><a href="view-student-details?studentId='.$student_id.'" target="_blank"><b>All Details</b></a></td>
            <td>'.$showVerifyStatus.'</td>
            <td><a href="#" class="student-js-edit" id="E'.$student_id.'" data-action-id="'.$student_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="student-js-delete" id="D'.$student_id.'" data-action-id="'.$student_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
        </tr>
        ';
    }
}

?>