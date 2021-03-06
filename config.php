<?php ob_start(); ?>
<?php

//Project Name
$ProjectName = "Pragma Education";

//Base URL
$baseURL = "http://localhost:3045/RHtechWorld/pragmaEducation/";

//Defulat Time Zone
date_default_timezone_set('Asia/Kolkata'); //indian time
$todayDate = date('d-m-Y'); // 04-05-2022
$timeNow = date('h:i:s'); // 12:16:00
$timeDiv = date('A'); // AM or PM
$lastUpdated = date('d-m-Y h:i A');
//database Config
$conn = mysqli_connect('localhost','root','','pragma_education');

//project setups
$mainContactNumberOne = "+91 7896747985";
$mainContactNumberTwo = "+91 9491002123";
$mainContactNumberOnLink = "917896747985";

$mainContactEmail = "pragmaeducation2022@gmail.com";

$mainContactLocation = "Reg. Uppal, Hyderabad, Telangana";

$mainContactLocationMap = '
<div class="mt-5" data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.1956442064734!2d78.38336721435402!3d17.450347605580557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb91e85be1271b%3A0xec350935717396ea!2sPragma%20Edge%20Software%20Services%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1651246469567!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
';

//EMail configuration
$emailSendFrom = "functions@pragmaeducation.com";
$emailSendFromName = "Pragma Education";

header("Content-Type: text/html; charset=UTF-8");

?>