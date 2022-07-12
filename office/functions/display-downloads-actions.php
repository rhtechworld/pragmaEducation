<?php

//add new download
if(isset($_POST['addNewDownloads']))
{
    $downloadTitleInput = mysqli_real_escape_string($conn, $_POST['downloadTitleInput']);
    $downloadsLinkRef = mysqli_real_escape_string($conn, $_POST['downloadsLinkRef']);
    $downloadContentText = mysqli_real_escape_string($conn, $_POST['downloadContentText']);
    $downloadLiveStatus = mysqli_real_escape_string($conn, $_POST['downloadLiveStatus']);

    if($downloadsLinkRef == '' || $downloadsLinkRef == null || $downloadsLinkRef == '#')
    {
        $downloadsLinkRefPass = "#";
    }
    else
    {
        $downloadsLinkRefPass = $downloadsLinkRef;
    }

    $downloadNewId = "D".rand(1000000000,9999999999)."";
    $downloadNewIdDate = date('d-m-Y');
    //insert data
    $insertDatadownloadsInDb = mysqli_query($conn,"INSERT INTO downloads(dwn_id, dwn_title, dwn_desc, dwn_link, dwn_date, status, isDeleted, last_updated)
    VALUES('$downloadNewId','$downloadTitleInput','$downloadContentText','$downloadsLinkRefPass','$downloadNewIdDate','$downloadLiveStatus','0','$lastUpdated')");

    echo '<script>alert("Added Success, Redirecting to download List")</script>';
    header("Refresh:0; url=display-downloads");

}

//update download
if(isset($_POST['updateDownloads']))
{
    $downloadTitleInput = mysqli_real_escape_string($conn, $_POST['downloadTitleInput']);
    $downloadsLinkRef = mysqli_real_escape_string($conn, $_POST['downloadsLinkRef']);
    $downloadContentText = mysqli_real_escape_string($conn, $_POST['downloadContentText']);
    $downloadLiveStatus = mysqli_real_escape_string($conn, $_POST['downloadLiveStatus']);

    if($downloadsLinkRef == '' || $downloadsLinkRef == null || $downloadsLinkRef == '#')
    {
        $downloadsLinkRefPass = "#";
    }
    else
    {
        $downloadsLinkRefPass = $downloadsLinkRef;
    }

    //update data
    $updateDatadownloads = mysqli_query($conn,"UPDATE downloads SET dwn_title='$downloadTitleInput', dwn_desc='$downloadContentText', dwn_link='$downloadsLinkRef', status='$downloadLiveStatus' WHERE dwn_id='$dwn_id'");

    echo '<script>alert("Updated Success, Redirecting to downloads List")</script>';
    header("Refresh:0; url=display-downloads");
}

//delete download
if(isset($_POST['deleteDownloads']))
{
    //delete data
    $deleteDatadownloads = mysqli_query($conn,"UPDATE downloads SET isDeleted='1', last_updated='$lastUpdated' WHERE dwn_id='$dwn_id'");

    echo '<script>alert("Deleted Success, Redirecting to downloads List")</script>';
    header("Refresh:0; url=display-downloads");
}

?>