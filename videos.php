<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
        <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    
    <!-- Primary Meta Tags -->
    <title>Pragma VIDEOS of Toppers and Motivational Sessions | <?php echo $ProjectName; ?></title>
    <meta name="title" content="Pragma VIDEOS of Toppers and Motivational Sessions | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="Pragma VIDEOS of Toppers and Motivational Sessions | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="Pragma VIDEOS of Toppers and Motivational Sessions | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

    <?php include('header.php'); ?>
</head>

<div id="main">

    <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
        <h4 style="font-size:20px"><span>Pragma VIDEOS of Toppers and </span> Motivational Sessions</h4>
    </div>

    <div class="feat bg-gray pb-5" id="why-us">
        <div class="container">
            <!-- <div class="row mb-5">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/K4TOrB7at0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="row mt-2">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/K4TOrB7at0Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div> -->
            <div class="alert">
                    <?php

                        $checkVideosInDb = mysqli_query($conn,"SELECT * FROM videos WHERE vid_status='0' AND isDeleted='0'");
                        $checkCountOnVideos = mysqli_num_rows($checkVideosInDb);

                        if($checkCountOnVideos == 0)
                        {
                            echo 'No Videos!';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($checkVideosInDb))
                            {
                                $vid_id = $row['vid_id'];
                                $vid_link = $row['vid_link'];
                                $vid_status = $row['vid_status'];
                                $date = $row['date'];
                                $last_updated = $row['last_updated'];
                                $isDeleted = $row['isDeleted'];

                                echo '
                                <div class="row mb-2">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/'.$vid_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                ';
                            }
                        }
                    ?>
            </div>
        </div>
    </div>


</div>
<?php include('footer.php'); ?>