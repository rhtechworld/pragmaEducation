<?php

include('../../../config.php');

if(isset($_GET['subjectId']))
{
    $subjectId = mysqli_real_escape_string($conn,$_GET['subjectId']);

    $getSubjectDetails = mysqli_query($conn,"SELECT * FROM subject_chapters WHERE subject_id='$subjectId' AND isDeleted='0'");
        
    echo '<label for="subjectChapterInput"><b>Select Chapter:</b> </label>
    <select class="form-control" id="subjectChapterInput" name="subjectChapterInput" required>
    <option value="">-- Select Chapter --</option>';

    while($row = mysqli_fetch_array($getSubjectDetails))
    {

        echo 
        '
            <option value="'.$row['chapter_id'].'">'.$row['chapter_name'].'</option>
        
        ';

    }

    echo '</select>';
}
else
{
    echo "Something Went Wrong On Direct Access!, Contact Admin. :-)";
}

?>