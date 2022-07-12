<?php
if(isset($_GET['action']) && isset($_GET['updId']) && isset($_GET['courseId']) && isset($_GET['actionTaken']))
{
    $actionOnUrl = mysqli_real_escape_string($conn, $_GET['action']);
    $courseIdOnUrl = mysqli_real_escape_string($conn, $_GET['courseId']);
    $updIdOnUrl = mysqli_real_escape_string($conn, $_GET['updId']);
    $actionTakenOnUrl = mysqli_real_escape_string($conn, $_GET['actionTaken']);

    //checkCourseStatus
    $checkCourseAvlble = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$courseIdOnUrl' AND isDeleted='0'");
    $checkCOuntONCourseAvlble = mysqli_num_rows($checkCourseAvlble);

    if($checkCOuntONCourseAvlble == 0)
    {
        echo '<script>alert("Wrong Course ID, try again later!")</script>';
        header("Refresh:0; url=course-updates-actions?takenAction=failed&msg=WrongCourseIdFoundOnGetUrl-Edit");
    }
    else
    {
        while($row  = mysqli_fetch_array($checkCourseAvlble))
            {
                $course_tab_id = $row['course_tab_id'];
                $course_id = $row['course_id'];
                $course_name = $row['course_name'];
            }
    }

    if($actionOnUrl == 'addNew' && $actionTakenOnUrl == 'true')
    {
        //do nothing
        $pageTitile = "Add New Course Update";
        $pageTitileHead = "<b>Add New</b> Course Update / <b>".$course_name."</b>";
        $broadCampOnUI = "&nbsp;<a href='view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View'><b>".$course_name."</b></a>&nbsp; / Add New Update";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="addNewCourseUpdateNow">Add New</button>';
    }
    else if($actionOnUrl == 'editOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkCourseUpdate = mysqli_query($conn,"SELECT * FROM course_updates WHERE update_id='$updIdOnUrl' AND isDeleted='0'");
        $checkCountOnCourseUpdate = mysqli_num_rows($checkCourseUpdate);

        if($checkCountOnCourseUpdate == 0)
        {
            echo '<script>alert("Update Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=course-updates-actions?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkCourseUpdate))
            {
                $update_id_OnUpdates = $row['update_id'];
                $course_id_OnUpdates = $row['course_id'];
                $up_title_OnUpdates = $row['up_title'];
                $up_desc_OnUpdates = $row['up_desc'];
                $up_date_OnUpdates = $row['up_date'];
                $main_status_OnUpdates = $row['status'];
                $isDeleted_OnUpdates = $row['isDeleted'];
                $last_updated_OnUpdates = $row['last_updated'];
            }
        }

        $pageTitile = "Edit Update Info : ".$up_title_OnUpdates."";
        $pageTitileHead = "<b>Edit</b> Course Update / <b>".$course_name."</b> / ".$up_title_OnUpdates."";
        $broadCampOnUI = "&nbsp;<b><a href='view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View'>".$course_name."</a></b>&nbsp;/ Edit / &nbsp;<b>".$up_title_OnUpdates."</b>";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="updateCourseUpdates">Update Course Update</button>';
    }
    else if($actionOnUrl == 'deleteOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkCourseUpdate = mysqli_query($conn,"SELECT * FROM course_updates WHERE update_id='$updIdOnUrl' AND isDeleted='0'");
        $checkCountOnCourseUpdate = mysqli_num_rows($checkCourseUpdate);

        if($checkCountOnCourseUpdate == 0)
        {
            echo '<script>alert("Update Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=course-updates-actions?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkCourseUpdate))
            {
                $update_id_OnUpdates = $row['update_id'];
                $course_id_OnUpdates = $row['course_id'];
                $up_title_OnUpdates = $row['up_title'];
                $up_desc_OnUpdates = $row['up_desc'];
                $up_date_OnUpdates = $row['up_date'];
                $main_status_OnUpdates = $row['status'];
                $isDeleted_OnUpdates = $row['isDeleted'];
                $last_updated_OnUpdates = $row['last_updated'];
            }
        }

        $pageTitile = "Delete Update Info : ".$up_title_OnUpdates."";
        $pageTitileHead = "<b>Delete</b> Course Update / <b>".$course_name."</b> / ".$up_title_OnUpdates."";
        $broadCampOnUI = "&nbsp;<b><a href='view-course-updates?courseTab=".$course_tab_id."&course=".$course_id."&action=View'>".$course_name."</a></b>&nbsp; / Delete / &nbsp;<b>".$up_title_OnUpdates."</b>";
        $inputActionOnFocus = "readonly";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-danger btn-block" name="deleteCourseUpdates">Delete Course Update</button>';
    }
    else
    {
        echo '<script>alert("Somthing is missing, try again later!")</script>';
        header("Refresh:0; url=course-updates-actions?takenAction=failed&msg=ParameterActionsWrong");
    }
    
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=course-updates-actions?takenAction=failed&msg=SomeParameterIsMissingOnUrl");
}
?>