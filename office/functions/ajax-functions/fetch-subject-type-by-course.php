<?php

include('../../../config.php');

$crsId =  mysqli_real_escape_string($conn,$_GET['crsId']);

//check courses in db
$checkSubjectTypesByCourseInDB = mysqli_query($conn,"SELECT * FROM subjects WHERE course_id='$crsId' AND isDeleted='0' GROUP BY subject_type");
$checkSubjectTypesgetCountOfDetails = mysqli_num_rows($checkSubjectTypesByCourseInDB);

if($checkSubjectTypesgetCountOfDetails == 0)
{
    echo '<label for="courseSubjectType"><b>Select Subject Type:</b> </label>
    <select class="form-control" id="courseSubjectType" name="courseSubjectType" required>
    <option value="">-- Select Subject Type --</option>
    <option value="Prelims">Prelims</option>
    <option value="Mains">Mains</option>';
    echo '</select>';

    echo '
    <label class="mt-2" for="courseSubjectPaper"><b>Select Paper :</b> </label>
    <select class="form-control" id="courseSubjectPaper" name="courseSubjectPaper" required>
    <option value="">-- Select Paper --</option>
    <option value="1">Paper - 1</option>
    <option value="2">Paper - 2</option>
    <option value="3">Paper - 3</option>
    <option value="4">Paper - 4</option>
    <option value="5">Paper - 5</option>
    <option value="6">Paper - 6</option>
    <option value="7">Paper - 7</option>
    <option value="8">Paper - 8</option>
    <option value="9">Paper - 9</option>
    <option value="0">No Paper</option>';
    echo '</select>';
}
else
{
    echo '<label for="courseSubjectType"><b>Select Subject Type:</b> </label>
    <select class="form-control" id="courseSubjectType" name="courseSubjectType" required>
    <option value="">-- Select Subject Type --</option>
    <option value="Prelims">Prelims</option>
    <option value="Mains">Mains</option>';
    echo '</select>';

    echo '
    <label class="mt-2" for="courseSubjectPaper"><b>Select Paper :</b> </label>
    <select class="form-control" id="courseSubjectPaper" name="courseSubjectPaper" required>
    <option value="">-- Select Paper --</option>
    <option value="1">Paper - 1</option>
    <option value="2">Paper - 2</option>
    <option value="3">Paper - 3</option>
    <option value="4">Paper - 4</option>
    <option value="5">Paper - 5</option>
    <option value="6">Paper - 6</option>
    <option value="7">Paper - 7</option>
    <option value="8">Paper - 8</option>
    <option value="9">Paper - 9</option>
    <option value="0">No Paper</option>';
    echo '</select>';

}


?>