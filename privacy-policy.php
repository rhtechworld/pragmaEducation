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
    <title>Privacy Policy | <?php echo $ProjectName; ?></title>
    <meta name="title" content="Privacy Policy | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="Privacy Policy | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="Privacy Policy | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

  <?php include('header.php'); ?>

  <main id="main">

    <div class="text-center mb-0" style="margin-top:105px;">
        <div class="section-head col-sm-12 mb-0">
          <h4 style="font-size:20px"><span>Privacy<br> Policy</span></h4>
        </div>
    </div>
    <!-- ======= Announcements Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="mt-2 p-3">
            
        <h2><strong>Privacy Policy</strong></h2>

            <p>Welcome to Pragma Education!</p>

            <h3><strong>Your Privacy</strong></h3>

            <p>Please read Privacy Policy</p>

            <h3><strong>Reservation of Rights</strong></h3>

            <p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it’s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

            <h3><strong>Removal of links from our website</strong></h3>

            <p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

            <p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

            <h3><strong>Disclaimer</strong></h3>

            <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

            <ul>
                <li>limit or exclude our or your liability for death or personal injury;</li>
                <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
            </ul>

            <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>

            <p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
            
        </div>
        
      </div>
    </section><!-- End Announcements Section -->

  </main><!-- End #main -->

  <?php include('footer.php'); ?>