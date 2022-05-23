<?php

//add offer
if(isset($_POST['addOfferDetails']))
{
    $offerStatus = mysqli_real_escape_string($conn, $_POST['offerStatus']);
    $offerOnCourse = mysqli_real_escape_string($conn, $_POST['offerOnCourse']);
    $offerName = mysqli_real_escape_string($conn, $_POST['offerName']);
    $offerPercentage = mysqli_real_escape_string($conn, $_POST['offerPercentage']);

    //check offer there before
    $checkOfferInDbBeforeInsert = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE course_id='$offerOnCourse' AND isDeleted='0'");
    $getContOnCheck = mysqli_num_rows($checkOfferInDbBeforeInsert);

    if($getContOnCheck == 0)
    {
        $ofrID = rand(100000,999999);

        $offerIdToSave = "D".$ofrID."";
        //insert new offer
        $insertNewOffer = mysqli_query($conn,"INSERT INTO course_early_bird_offers(course_id, offer_id, offer_name, offer_at, status, date, isDeleted, last_updated)
        VALUES('$offerOnCourse','$offerIdToSave','$offerName','$offerPercentage','$offerStatus','$todayDate','0','$lastUpdated')");

        echo '<script>alert("Added Success, Redirecting to Offers")</script>';

        header("Refresh:0; url=discount-offers");
    }
    else
    {
        echo '<script>alert("Offer Already Recorded For The Course, Try Again! Or Delete Exisiting One And Add New... Refreshing...")</script>';
        header('refresh:0');
    }
}

//update offer
if(isset($_POST['updateOffer']))
{
    $offerEditId = mysqli_real_escape_string($conn, $_POST['offerEditId']);
    $offerEditName = mysqli_real_escape_string($conn,$_POST['offerEditName']);
    $offerEditAt = mysqli_real_escape_string($conn,$_POST['offerEditAt']);
    $offerStatus = mysqli_real_escape_string($conn,$_POST['offerStatus']);

    //check offer id db
    $checkOfferIdInDb = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE offer_id='$offerEditId'");
    $getCntOfOffers = mysqli_num_rows($checkOfferIdInDb);

    if($getCntOfOffers == 0)
    {
        // Do Nothoing
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update
        $updateDataInDB = mysqli_query($conn,"UPDATE course_early_bird_offers SET offer_name='$offerEditName', offer_at='$offerEditAt', status='$offerStatus', last_updated='$lastUpdated' WHERE offer_id='$offerEditId'");

        echo '<script>alert("Updated Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

//delete offer
if(isset($_POST['deleteOffer']))
{
    $offerDeleteId = mysqli_real_escape_string($conn,$_POST['offerDeleteId']);
    $offerDeleteName = mysqli_real_escape_string($conn,$_POST['offerDeleteName']);
    $offerDeleteAt = mysqli_real_escape_string($conn,$_POST['offerDeleteAt']);

    //check offer id db
    $checkOfferIdInDb = mysqli_query($conn,"SELECT * FROM course_early_bird_offers WHERE offer_id='$offerDeleteId'");
    $getCntOfOffers = mysqli_num_rows($checkOfferIdInDb);

    if($getCntOfOffers == 0)
    {
        // Do Nothoing
        echo '<script>alert("Somthing went wrong! Try again!, Refreshing...")</script>';

        header('refresh:0');
    }
    else
    {
        //update
        $updateDataInDB = mysqli_query($conn,"UPDATE course_early_bird_offers SET isDeleted='1', last_updated='$lastUpdated' WHERE offer_id='$offerDeleteId'");

        echo '<script>alert("Deleted Success, Refreshing...")</script>';

        header('refresh:0');
    }
}

?>