<?php

//add new topper
if(isset($_POST['addNewTopper']))
{
    $topperTitleInput = mysqli_real_escape_string($conn, $_POST['topperTitleInput']);
    $toppersLinkRef = mysqli_real_escape_string($conn, $_POST['toppersLinkRef']);
    $topperContentText = mysqli_real_escape_string($conn, $_POST['topperContentText']);
    $topperLiveStatus = mysqli_real_escape_string($conn, $_POST['topperLiveStatus']);

    if($toppersLinkRef == '' || $toppersLinkRef == null || $toppersLinkRef == '#')
    {
        $toppersLinkRefPass = "#";
    }
    else
    {
        $toppersLinkRefPass = $toppersLinkRef;
    }

    $topperNewId = "T".rand(1000000000,9999999999)."";
    $topperNewIdDate = date('d-m-Y');
    //insert data
    $insertDataToppersInDb = mysqli_query($conn,"INSERT INTO toppers(tpr_id, tpr_title, tpr_date, tpr_desc, tpr_link, status, isDeleted, last_updated)
    VALUES('$topperNewId','$topperTitleInput','$topperNewIdDate','$topperContentText','$toppersLinkRefPass','$topperLiveStatus','0','$lastUpdated')");

    echo '<script>alert("Added Success, Redirecting to Toppers List")</script>';
    header("Refresh:0; url=display-toppers");

}

//update topper
if(isset($_POST['updateTopper']))
{
    $topperTitleInput = mysqli_real_escape_string($conn, $_POST['topperTitleInput']);
    $toppersLinkRef = mysqli_real_escape_string($conn, $_POST['toppersLinkRef']);
    $topperContentText = mysqli_real_escape_string($conn, $_POST['topperContentText']);
    $topperLiveStatus = mysqli_real_escape_string($conn, $_POST['topperLiveStatus']);

    if($toppersLinkRef == '' || $toppersLinkRef == null || $toppersLinkRef == '#')
    {
        $toppersLinkRefPass = "#";
    }
    else
    {
        $toppersLinkRefPass = $toppersLinkRef;
    }

    //update data
    $updateDataToppers = mysqli_query($conn,"UPDATE toppers SET tpr_title='$topperTitleInput', tpr_desc='$topperContentText', tpr_link='$toppersLinkRef', status='$topperLiveStatus' WHERE tpr_id='$tpr_id'");

    echo '<script>alert("Updated Success, Redirecting to Toppers List")</script>';
    header("Refresh:0; url=display-toppers");
}

//delete topper
if(isset($_POST['deleteTopper']))
{
    //delete data
    $deleteDataToppers = mysqli_query($conn,"UPDATE toppers SET isDeleted='1', last_updated='$lastUpdated' WHERE tpr_id='$tpr_id'");

    echo '<script>alert("Deleted Success, Redirecting to Toppers List")</script>';
    header("Refresh:0; url=display-toppers");
}

?>