<?php

//add new download
if(isset($_POST['addNewCurrentAffairs']))
{
    $CaTitleInput = mysqli_real_escape_string($conn, $_POST['CaTitleInput']);
    $CaLinkRef = mysqli_real_escape_string($conn, $_POST['CaLinkRef']);
    $CaContentText = mysqli_real_escape_string($conn, $_POST['CaContentText']);
    $CaLiveStatus = mysqli_real_escape_string($conn, $_POST['CaLiveStatus']);

    if($CaLinkRef == '' || $CaLinkRef == null || $CaLinkRef == '#')
    {
        $CaLinkRefPass = "#";
    }
    else
    {
        $CaLinkRefPass = $CaLinkRef;
    }

    $caNewId = "CA".rand(100000000,999999999)."";
    $caNewIdDate = date('d-m-Y');
    //insert data
    $insertDataCaInDb = mysqli_query($conn,"INSERT INTO current_affairs(ca_id, ca_title, ca_desc, ca_link, ca_date, status, isDeleted, last_updated)
    VALUES('$caNewId','$CaTitleInput','$CaContentText','$CaLinkRefPass','$caNewIdDate','$CaLiveStatus','0','$lastUpdated')");

    echo '<script>alert("Added Success, Redirecting to Current Affairs List")</script>';
    header("Refresh:0; url=display-current-affairs");

}

//update download
if(isset($_POST['updateCurrentAffairs']))
{
    $CaTitleInput = mysqli_real_escape_string($conn, $_POST['CaTitleInput']);
    $CaLinkRef = mysqli_real_escape_string($conn, $_POST['CaLinkRef']);
    $CaContentText = mysqli_real_escape_string($conn, $_POST['CaContentText']);
    $CaLiveStatus = mysqli_real_escape_string($conn, $_POST['CaLiveStatus']);

    if($CaLinkRef == '' || $CaLinkRef == null || $CaLinkRef == '#')
    {
        $CaLinkRefPass = "#";
    }
    else
    {
        $CaLinkRefPass = $CaLinkRef;
    }

    //update data
    $updateDataCa = mysqli_query($conn,"UPDATE current_affairs SET ca_title='$CaTitleInput', ca_desc='$CaContentText', ca_link='$CaLinkRefPass', status='$CaLiveStatus', last_updated='$lastUpdated' WHERE ca_id='$ca_id'");

    echo '<script>alert("Updated Success, Redirecting to Current Affairs List")</script>';
    header("Refresh:0; url=display-current-affairs");
}

//delete download
if(isset($_POST['deleteCurrentAffairs']))
{
    //delete data
    $deleteDataCa = mysqli_query($conn,"UPDATE current_affairs SET isDeleted='1', last_updated='$lastUpdated' WHERE ca_id='$ca_id'");

    echo '<script>alert("Deleted Success, Redirecting to Current Affairs List")</script>';
    header("Refresh:0; url=display-current-affairs");
}

?>