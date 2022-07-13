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
    <title>About Us | <?php echo $ProjectName; ?></title>
    <meta name="title" content="About Us | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="About Us | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="About Us | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

    <?php include('header.php'); ?>
</head>

<div id="main">

    <div class="section-head col-sm-12 mb-0" style="margin-top:85px;">
        <h4 style="font-size:20px"><span>About</span> Us</h4>
    </div>

    <div class="feat bg-gray pb-5" id="why-us">
        <div class="container">
        <div class="row mt-2">
                    <div class="col-lg-6 col-md-6">
                        <div class="section-head col-sm-12 mb-0 text-left">
                            <h4 style="font-size:20px;"><span>About</span> Us</h4>
                        </div>
                        <p>PRAGMA EDUCATION is a birthchild of ideas from persons who themselves had faced lot of challenges in their examination preparation journey in life. However, one unique thing about us is that we believe in quote- “If you are in a mess, you get yourself out of that mess by helping others get out of theirs”.</p>
                        <p>Hence, we believe that only by helping others succeed would we succeed; and it is an eternal process that offers scope for vast treasures of knowledge and experiences on the way. Pragma Education is precisely here to provide a direction to the efforts of millions of aspirants like us.</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="section-head col-sm-12 mb-0 text-left">
                            <h4 style="font-size:20px;"><span>Our</span> Moto</h4>
                        </div>
                        <p>OUR MOTO: Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.</p>
                        <p>A mid-term to long-term guidance shall be provided to all the students that enrol with us just to ensure that your journey is as beautiful as ours. 
Address the issues faced by consumer market and creating an utilizable value to the modules. In short, we really want to help the aspirants in their journeys.
Provide the students with a perspective and confidence to continue their journey nevertheless without us.</p>
                    </div>
                </div>
        </div>
    </div>


</div>
<?php include('footer.php'); ?>