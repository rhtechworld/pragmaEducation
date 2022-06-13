<?php
if(isset($_GET['action']) && isset($_GET['dwn_id']) && isset($_GET['actionTaken']))
{
    $actionOnUrl = mysqli_real_escape_string($conn, $_GET['action']);
    $DownloadsIdOnUrl = mysqli_real_escape_string($conn, $_GET['dwn_id']);
    $actionTakenOnUrl = mysqli_real_escape_string($conn, $_GET['actionTaken']);

    if($actionOnUrl == 'addNew' && $actionTakenOnUrl == 'true')
    {
        //do nothing
        $pageTitile = "Add New Downloads Info";
        $pageTitileHead = "<b>Add New</b> Downloads Info";
        $broadCampOnUI = "Add New";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="addNewDownloads">Add New</button>';
    }
    else if($actionOnUrl == 'editOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkDownloadsIdInDb = mysqli_query($conn,"SELECT * FROM downloads WHERE dwn_id='$DownloadsIdOnUrl' AND isDeleted='0'");
        $checkCountOnDownloadsIdInDb = mysqli_num_rows($checkDownloadsIdInDb);

        if($checkCountOnDownloadsIdInDb == 0)
        {
            echo '<script>alert("Downloads Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-downloads?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Edit");
        }
        else
        {
            while($row = mysqli_fetch_array($checkDownloadsIdInDb))
            {
                $dwn_id = $row['dwn_id'];
                $dwn_title = $row['dwn_title'];
                $dwn_desc = $row['dwn_desc'];
                $dwn_link = $row['dwn_link'];
                $dwn_date = $row['dwn_date'];
                $download_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Edit Downloads Info : ".$dwn_title."";
        $pageTitileHead = "<b>Edit</b> Downloads Info : ".$dwn_title."";
        $broadCampOnUI = "Edit / ".$dwn_title."";
        $inputActionOnFocus = "";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-primary btn-block" name="updateDownloads">Update Downloads</button>';
    }
    else if($actionOnUrl == 'deleteOne' && $actionTakenOnUrl == 'true')
    {
        //check Downloads id in db
        $checkDownloadsIdInDb = mysqli_query($conn,"SELECT * FROM downloads WHERE dwn_id='$DownloadsIdOnUrl' AND isDeleted='0'");
        $checkCountOnDownloadsIdInDb = mysqli_num_rows($checkDownloadsIdInDb);

        if($checkCountOnDownloadsIdInDb == 0)
        {
            echo '<script>alert("Downloads Id Not For Action, try again later!")</script>';
            header("Refresh:0; url=display-downloads?takenAction=failed&msg=IdIsWrongOrNotThereInDbConsideredOnGetUrl-Delete");
        }
        else
        {
            while($row = mysqli_fetch_array($checkDownloadsIdInDb))
            {
                $dwn_id = $row['dwn_id'];
                $dwn_title = $row['dwn_title'];
                $dwn_desc = $row['dwn_desc'];
                $dwn_link = $row['dwn_link'];
                $dwn_date = $row['dwn_date'];
                $download_status = $row['status'];
                $isDeleted = $row['isDeleted'];
                $last_updated = $row['last_updated'];
            }
        }

        $pageTitile = "Delete Downloads Info : ".$dwn_title."";
        $pageTitileHead = "<b>Delete</b> Downloads Info : ".$dwn_title."";
        $broadCampOnUI = "Delete / ".$dwn_title."";
        $inputActionOnFocus = "readonly";
        $actionButtonToTakeAction = '<button type="submit" class="mt-2 btn btn-danger btn-block" name="deleteDownloads">Delete Downloads</button>';
    }
    else
    {
        echo '<script>alert("Somthing is missing, try again later!")</script>';
        header("Refresh:0; url=display-downloads?takenAction=failed&msg=ParameterActionsWrong");
    }
    
}
else
{
    echo '<script>alert("Somthing is missing, try again later!")</script>';
    header("Refresh:0; url=display-downloads?takenAction=failed&msg=SomeParameterIsMissingOnUrl");
}
?>