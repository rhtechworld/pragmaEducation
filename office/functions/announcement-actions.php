<?php

//Add Ann Details
if(isset($_POST['addAnnDetails']))
{
    $annStatus = mysqli_real_escape_string($conn,$_POST['annStatus']);
    $annTitle = mysqli_real_escape_string($conn,$_POST['annTitel']);
    $annBy = mysqli_real_escape_string($conn,$_POST['annBy']);
    $annDesc = mysqli_real_escape_string($conn,$_POST['annDesc']);

    //check ID Before Add
    $checkMainBeforeAdd = mysqli_query($conn,"SELECT * FROM announcements WHERE ann_title='$annTitle' AND isDeleted='0'");
    $getcntOnCheck = mysqli_num_rows($checkMainBeforeAdd);

    if($getcntOnCheck == 0)
    {
        $newAnnId = "A".rand(100000,999999)."";

        //insert new Ann
        $insertIntoDb = mysqli_query($conn,"INSERT INTO announcements(ann_id, ann_title, ann_date, ann_by, ann_desc, status, isDeleted, date, last_updated)
        VALUES('$newAnnId','$annTitle','$lastUpdated','$annBy','$annDesc','$annStatus','0','$lastUpdated','$lastUpdated')");

        echo '<script>alert("Added Success, Redirecting to Announcements")</script>';

        header("Refresh:0; url=announcements");

    }
    else
    {
        echo '<script>alert("Announcement Already Exisist With Title, Try With New Title, Refreshing...")</script>';

        header('refresh:0');
    }
}

//update Ann Details
if(isset($_POST['updateAnnDetails']))
{
    $annStatus = mysqli_real_escape_string($conn,$_POST['annStatus']);
    $annTitle = mysqli_real_escape_string($conn,$_POST['annTitel']);
    $annBy = mysqli_real_escape_string($conn,$_POST['annBy']);
    $annDesc = mysqli_real_escape_string($conn,$_POST['annDesc']);

    //check ID Before Update
    $checkMainBeforeUpdate = mysqli_query($conn,"SELECT * FROM announcements WHERE ann_id='$ann_id'");
    $getcntOnCheck = mysqli_num_rows($checkMainBeforeUpdate);

    if($getcntOnCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
         //update details
        $updateAnnDetails = mysqli_query($conn,"UPDATE announcements SET ann_title='$annTitle', ann_by='$annBy', ann_desc='$annDesc', status='$annStatus', last_updated='$lastUpdated' WHERE ann_id='$ann_id'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }

}

//delete Ann Details
if(isset($_POST['deleteAnn']))
{
    $AnnDeleteId = mysqli_real_escape_string($conn,$_POST['AnnDeleteId']);
    $deleteAnnTitle = mysqli_real_escape_string($conn,$_POST['deleteAnnTitle']);

    //check ID Before Update
    $checkMainBeforeUpdate = mysqli_query($conn,"SELECT * FROM announcements WHERE ann_id='$AnnDeleteId'");
    $getcntOnCheck = mysqli_num_rows($checkMainBeforeUpdate);

    if($getcntOnCheck == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //delete isDeleted
        $updateDeleted = mysqli_query($conn,"UPDATE announcements SET isDeleted='1', last_updated='$lastUpdated' WHERE ann_id='$AnnDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }

}
?>