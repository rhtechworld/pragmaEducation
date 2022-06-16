<?php

if(isset($_GET['studentId']))
{
    $getUrlStudentId = mysqli_real_escape_string($conn, $_GET['studentId']);

    //check student id in db
    $checkStudentIdInDbNow = mysqli_query($conn,"SELECT * FROM students WHERE student_id='$getUrlStudentId' AND isDeleted='0'");
    $checkCountOnStudentIdInDbNow = mysqli_num_rows($checkStudentIdInDbNow);

    if($checkCountOnStudentIdInDbNow == 0)
    {
        echo '<script>alert("Student Not Found!, try again later!")</script>';
        header("Refresh:0; url=students-list?takenAction=failed&msg=StudentIdNotFound");
    }
    else
    {
        while($row = mysqli_fetch_array($checkStudentIdInDbNow))
        {
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_email = $row['student_email'];
            $student_number = $row['student_number'];
            $date = $row['date'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];
        }
    }
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=students-list?takenAction=failed&msg=IdMissingInUrl");
}

?>