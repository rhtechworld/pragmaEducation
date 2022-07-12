<?php

//get Tax Details
$getTaxDetailsHereFromDb = mysqli_query($conn,"SELECT * FROM tax_details WHERE tax_id='160714733045'");
while($row = mysqli_fetch_array($getTaxDetailsHereFromDb))
{
    $tax_name = $row['tax_name'];
    $tax_at = $row['tax_at'];
    $tax_status = $row['status'];

    if($tax_status == 1)
    {
        $tax_status_input = "checked";
    }
    else
    {
        $tax_status_input = "";
    }
}

?>