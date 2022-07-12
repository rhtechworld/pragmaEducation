<?php

include('../../../config.php');

if(isset($_GET['courseId']))
{
    $courseId = mysqli_real_escape_string($conn,$_GET['courseId']);

    $getSubjectDetails = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$courseId' AND isDeleted='0'");
        
    echo '<label for="SubjectInputSelect"><b>Select Subject:</b> </label>
    <select class="form-control" id="SubjectInputSelect" name="SubjectInputSelect" onchange="getChaptersBasedOnSubject(this.value);" required>
    <option value="">-- Select Subject --</option>';

    while($row = mysqli_fetch_array($getSubjectDetails))
    {

        echo 
        '
            <option value="'.$row['subject_id'].'">'.$row['subject_name'].'</option>
        
        ';

    }

    echo '</select>';
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>