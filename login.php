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
    <title>Login | <?php echo $ProjectName; ?></title>
    <meta name="title" content="Login | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="Login | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="Login | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

    <?php include('header.php'); ?>
</head>
<main id="main">

    <div class="container mt-5" data-aos="fade-up">
        <div class="d-block mx-auto">
            <div class="row">
                <div class="col-md-6 col-lg-6 my-auto">
                    <img src="<?php echo $baseURL; ?>assets/new-img/login.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-lg-6 my-auto border rounded p-4 shadow">
                    <div class="section-head col-sm-12 mb-0 text-center">
                        <h4 style="font-size:20px;"><span>Pragma</span> Login</h4>
                    </div>
                    <?php include('functions/student-functions/login.php'); ?>
                    <form action="" method="POST">
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="username" name="username"
                                aria-describedby="emailHelp" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Password">
                        </div>
                        <button type="submit" name="proceedForLogin" class="btn btn-block btn-primary w-100 newButtonEffect">Get Me In</button>
                    </form>
                    <div class="row mt-3">
                        <div class="col-md-6 col-lg-6 text-center mt-1 mb-1">
                            <small>Not registered? <a href="<?php echo $baseURL; ?>register" class="basecolor">Register
                                    Now</a></small>
                        </div>
                        <div class="col-md-6 col-lg-6 text-center mt-1 mb-1">
                            <small><a href="forgot-password" class="basecolor">Forgot Password?</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<?php include('footer.php'); ?>