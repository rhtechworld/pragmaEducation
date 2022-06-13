<?php

error_reporting(0);

if(isset($_POST['updateTaxSettings']))
{
    $taxnameInput = $_POST['taxnameInput'];
    $taxAtInput = $_POST['taxAtInput'];
    $liveTaxStatus = $_POST['liveTaxStatus'];

    if($liveTaxStatus == 1)
    {
        $passTaxStatusAs = 1;
    }
    else
    {
        $passTaxStatusAs = 0;
    }

    //updateTaxDetails
    $updateTaxDetails = mysqli_query($conn,"UPDATE tax_details SET tax_name='$taxnameInput', tax_at='$taxAtInput', status='$passTaxStatusAs', 	last_updated='$lastUpdated' WHERE tax_id='160714733045'");

    echo '<script>alert("Updated Success, Refreshing...")</script>';

    header('refresh:0');
}

?>