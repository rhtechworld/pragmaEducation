<? ob_start(); ?>
<?php

//Project Name
$ProjectName = "Pragma Education";

//Base URL
$baseURL = "http://localhost:3045/RHtechWorld/pragmaEducation/";

//Defulat Time Zone
date_default_timezone_set('Asia/Kolkata');
$todayDate = date('d-m-Y'); // 04-05-2022
$timeNow = date('h:i:s'); // 12:16:00
$timeDiv = date('A'); // AM or PM

//database Config
$conn = mysqli_connect('localhost','root','','pragma_education');

?>