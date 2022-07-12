<?php
if(isset($_GET['action']) && isset($_GET['ca_id']) && isset($_GET['actionTaken']))
{
    $actionOnUrl = mysqli_real_escape_string($conn, $_GET['action']);
    $CaIdOnUrl = mysqli_real_escape_string($conn, $_GET['ca_id']);
    $actionTakenOnUrl = mysqli_real_escape_string($conn, $_GET['actionTaken']);

    if($actionOnUrl == 'addNew' && $actionTakenOnUrl == 'true')
    {
        //do nothing
        $pageTitile = "Add New Current Affairs Info";
        $pageTitileHead = "<b>Add New</b> Current Affairs Info";
        $broadCampOnUI = "Add New";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="addNewCurrentAffairs">Add New</button>';
    }
    else if($actionOnUrl == 'editOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkCaIdInDb = mysqli_query($conn,"SELECT * FROM current_affairs WHERE ca_id='$CaIdOnUrl' AND isDeleted='0'");
        $checkCountOnCaIdInDb = mysqli_num_rows($checkCaIdInDb);

        if($checkCountOnCaIdInDb == 0)
        {
            echo '<script>alert("Current Affair Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-current-affairs?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkCaIdInDb))
            {
                $ca_id = $row['ca_id'];
                $ca_title = $row['ca_title'];
                $ca_desc = $row['ca_desc'];
                $ca_link = $row['ca_link'];
                $ca_date = $row['ca_date'];
                $ca_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Edit Current Affairs Info : ".$ca_title."";
        $pageTitileHead = "<b>Edit</b> Current Affairs Info : ".$ca_title."";
        $broadCampOnUI = "Edit / ".$ca_title."";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="updateCurrentAffairs">Update Current Affair</button>';
    }
    else if($actionOnUrl == 'deleteOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkCaIdInDb = mysqli_query($conn,"SELECT * FROM current_affairs WHERE ca_id='$CaIdOnUrl' AND isDeleted='0'");
        $checkCountOnCaIdInDb = mysqli_num_rows($checkCaIdInDb);

        if($checkCountOnCaIdInDb == 0)
        {
            echo '<script>alert("Current Affair Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-current-affairs?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkCaIdInDb))
            {
                $ca_id = $row['ca_id'];
                $ca_title = $row['ca_title'];
                $ca_desc = $row['ca_desc'];
                $ca_link = $row['ca_link'];
                $ca_date = $row['ca_date'];
                $ca_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Delete Current Affairs Info : ".$ca_title."";
        $pageTitileHead = "<b>Delete</b> Current Affairs Info : ".$ca_title."";
        $broadCampOnUI = "Delete / ".$ca_title."";
        $inputActionOnFocus = "readonly";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-danger btn-block" name="deleteCurrentAffairs">Delete Current Affair</button>';
    }
    else
    {
        echo '<script>alert("Somthing is missing, try again later!")</script>';
        header("Refresh:0; url=display-current-ffairs?takenAction=failed&msg=ParameterActionsWrong");
    }
    
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=display-current-affairs?takenAction=failed&msg=SomeParameterIsMissingOnUrl");
}
?>