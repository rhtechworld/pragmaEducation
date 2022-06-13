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
        //do nothing
    }
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=students-list?takenAction=failed&msg=IdMissingInUrl");
}

?>