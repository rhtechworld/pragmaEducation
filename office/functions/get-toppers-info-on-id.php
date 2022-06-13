<?php
if(isset($_GET['action']) && isset($_GET['tpr_id']) && isset($_GET['actionTaken']))
{
    $actionOnUrl = mysqli_real_escape_string($conn, $_GET['action']);
    $topperIdOnUrl = mysqli_real_escape_string($conn, $_GET['tpr_id']);
    $actionTakenOnUrl = mysqli_real_escape_string($conn, $_GET['actionTaken']);

    if($actionOnUrl == 'addNew' && $actionTakenOnUrl == 'true')
    {
        //do nothing
        $pageTitile = "Add New Topper Info";
        $pageTitileHead = "<b>Add New</b> Topper Info";
        $broadCampOnUI = "Add New";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="addNewTopper">Add New</button>';
    }
    else if($actionOnUrl == 'editOne' && $actionTakenOnUrl == 'true')
    {
        //check topper id in db
        $checkTopperIdInDb = mysqli_query($conn,"SELECT * FROM toppers WHERE tpr_id='$topperIdOnUrl' AND isDeleted='0'");
        $checkCountOnTopperIdInDb = mysqli_num_rows($checkTopperIdInDb);

        if($checkCountOnTopperIdInDb == 0)
        {
            echo '<script>alert("Topper Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-toppers?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkTopperIdInDb))
            {
                $tpr_id = $row['tpr_id'];
                $tpr_title = $row['tpr_title'];
                $tpr_date = $row['tpr_date'];
                $tpr_desc = $row['tpr_desc'];
                $tpr_link = $row['tpr_link'];
                $Topper_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Edit Topper Info : ".$tpr_title."";
        $pageTitileHead = "<b>Edit</b> Topper Info : ".$tpr_title."";
        $broadCampOnUI = "Edit / ".$tpr_title."";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="updateTopper">Update Topper</button>';
    }
    else if($actionOnUrl == 'deleteOne' && $actionTakenOnUrl == 'true')
    {
        //check topper id in db
        $checkTopperIdInDb = mysqli_query($conn,"SELECT * FROM toppers WHERE tpr_id='$topperIdOnUrl' AND isDeleted='0'");
        $checkCountOnTopperIdInDb = mysqli_num_rows($checkTopperIdInDb);

        if($checkCountOnTopperIdInDb == 0)
        {
            echo '<script>alert("Topper Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-toppers?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Delete");
        }
        else
        {
            while($row = mysqli_fetch_array($checkTopperIdInDb))
            {
                $tpr_id = $row['tpr_id'];
                $tpr_title = $row['tpr_title'];
                $tpr_date = $row['tpr_date'];
                $tpr_desc = $row['tpr_desc'];
                $tpr_link = $row['tpr_link'];
                $Topper_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Delete Topper Info : ".$tpr_title."";
        $pageTitileHead = "<b>Delete</b> Topper Info : ".$tpr_title."";
        $broadCampOnUI = "Delete / ".$tpr_title."";
        $inputActionOnFocus = "readonly";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-danger btn-block" name="deleteTopper">Delete Topper</button>';
    }
    else
    {
        echo '<script>alert("Somthing is missing, try again later!")</script>';
        header("Refresh:0; url=display-toppers?takenAction=failed&msg=ParameterActionsWrong");
    }
    
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=display-toppers?takenAction=failed&msg=SomeParameterIsMissingOnUrl");
}
?>