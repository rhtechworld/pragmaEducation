<?php

//getTotalStudentsOnDashboard
$findTotalStudentsFromDb = mysqli_query($conn,"SELECT * FROM students WHERE isDeleted='0'");
$getCuntOnfindTotalStudentsFromDb = mysqli_num_rows($findTotalStudentsFromDb);

//getTotalSalesTodayOnDashboard
$findTotalSalesTodayFromDb = mysqli_query($conn,"SELECT * FROM student_txns WHERE date='$todayDate' AND isDeleted='0'");
$getCntoffindTotalSalesTodayFromDb = mysqli_num_rows($findTotalSalesTodayFromDb);

//getTotalSalesOnDashboard
$findTotalSalesFromDb = mysqli_query($conn,"SELECT * FROM student_txns WHERE isDeleted='0'");
$getCntoffindTotalSalesFromDb = mysqli_num_rows($findTotalSalesFromDb);

//getTotalSalesAmountOnDashboard
$findTotalSalesAmountFromDb = mysqli_query($conn,"SELECT SUM(paid_amount) AS totalAmount FROM student_txns WHERE isDeleted='0'");
while($row = mysqli_fetch_array($findTotalSalesAmountFromDb))
{
    $thoTotalAmountShowInDashboard = $row['totalAmount'];
}

?>