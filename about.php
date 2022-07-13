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
            <div class="text-center mb-5">
                <div class="row my-auto">
                    <div class="col-md-3 col-lg-3 my-auto shadow mb-2 rounded">
                        <img src="<?php echo $baseURL; ?>assets/new-img/Pragma-Education-Square.png" class="img-fluid">
                    </div>
                    <div class="col-md-9 col-lg-9 my-auto">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>Modern Design</b></h6>
                        <p>We use latest technology for the latest world because we know the demand of peoples.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>Creative Design</b></h6>
                        <p>We are always creative and and always lisen our costomers and we mix these two things and
                            make beast design.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>24 x 7 User Support</b></h6>
                        <p>If our customer has any problem and any query we are always happy to help then.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>Business Growth</b></h6>
                        <p>Everyone wants to live on top of the mountain, but all the happiness and growth occurs while
                            you're climbing it</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>Market Strategy</b></h6>
                        <p>Holding back technology to preserve broken business models is like allowing blacksmiths to
                            veto the internal combustion engine in order to protect their horseshoes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="item">
                        <h6><b>Affordable cost</b></h6>
                        <p>Love is a special word, and I use it only when I mean it. You say the word too much and it
                            becomes cheap.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php include('footer.php'); ?>