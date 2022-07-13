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
    <title>Faculties | <?php echo $ProjectName; ?></title>
    <meta name="title" content="Faculties | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="Faculties | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="Faculties | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

    <?php include('header.php'); ?>
</head>

<div id="main">

    <div class="section-head col-sm-12 mb-0" style="margin-top:105px;">
        <h4 style="font-size:20px"><span>Pragma</span> Faculties</h4>
    </div>

    <div class="feat bg-gray pb-5" id="why-us">
        <div class="container">
            <div class="text-center mb-5">
                <div class="row my-auto mb-4">
                    <div class="col-md-12 col-lg-12 p-4 border rounded">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 mb-2">
                                <img src="photos/bharath.jpeg" class="rounded shadow" height="100">
                            </div>
                            <div class="col-md-8 col-lg-8 mb-2">
                                <h4 class="basecolor"><b>Bharat Bhushan Rallapalli</b></h4>
                                <p><b>Managing Director</b></p>
                                <p>Bharat Bhushan Rallapalli is the Founding Managing Director of Pragma Education. He is a graduate in Mechanical Engineering and holds a Masters in Political Science and International Relations. He had worked as Computer Aided Engineering (CAE) trainee in Hyundai Motor India Engineering, Hyderabad. Subsequently, he had served under Union of Govt. of India in Intelligence Bureau (MHA) for 07 years. He is a certified public speaker who also mentor students for competitive examinations and is also a motivational speaker. Bharat Bhushan is a faculty who teaches for UPSC Civil Services Exam in International Relations, Internal Security and Indian Economy. Bharat Bhushan had appeared for many competitive examinations viz., UPSC-CSE, RBI Gr B Manager, Group-1 Services, CAPF Exam, among others. He is a biker by passion with avid exploring experience on two wheels to his credit especially in unexplored regions of Arunachal Pradesh, India. Bharat Bhushan envisions to place Pragma Education as a prominent platform in providing guidance to aspirants of various competitive examinations in the country.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-auto d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 p-4 border rounded">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3 col-lg-3 mb-2 p-3 text-center">
                                <img src="photos/nb.png" class="rounded shadow" height="230" width="230">
                                <h5 class="mt-2"><b>Narasimha Bhoopati</b></h5>
                                <p><b>Honorary Faculty</b> | <a href="#" data-toggle="modal" data-target="#NarasimhaBhoopati" style="color:#E61F26;font-size:13px">View Details</a></p>
                            </div>
                            <div class="col-md-3 col-lg-3 p-3 text-center">
                                <img src="photos/vk.png" class="rounded shadow" height="230" width="230">
                                <h5 class="mt-2"><b>Dr. Vijay Kumar C</b></h5>
                                <p><b>Faculty</b> | <a href="#" data-toggle="modal" data-target="#DrVijayKumar" style="color:#E61F26;font-size:13px">View Details</a></p>
                            </div>
                            <div class="col-md-3 col-lg-3 p-3 text-center">
                                <img src="photos/dm.jpeg" class="rounded shadow" height="230" width="230">
                                <h5 class="mt-2"><b>Dr. Mounika Dasari</b></h5>
                                <p><b>Faculty</b> | <a href="#" data-toggle="modal" data-target="#DrMounikaDasari" style="color:#E61F26;font-size:13px">View Details</a></p>
                            </div>
                            <div class="col-md-3 col-lg-3 p-3 text-center">
                                <img src="photos/prb.jpeg" class="rounded shadow" height="230" width="230">
                                <h5 class="mt-2"><b>Narreddy Prabhanjan Reddy</b></h5>
                                <p><b>Faculty</b> | <a href="#" data-toggle="modal" data-target="#NarreddyPrabhanjanReddy" style="color:#E61F26;font-size:13px">View Details</a></p>
                            </div>
                            <div class="col-md-3 col-lg-3 p-3 text-center">
                                <img src="photos/devt.jpeg" class="rounded shadow" height="230" width="230">
                                <h5 class="mt-2"><b>Devishankar Tumbali</b></h5>
                                <p><b>Faculty</b> | <a href="#" data-toggle="modal" data-target="#DevishankarTumbali" style="color:#E61F26;font-size:13px">View Details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php include('inc/faculties-modals.php'); ?>
<?php include('footer.php'); ?>