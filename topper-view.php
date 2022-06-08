<?php include('config.php'); ?>
<?php include('functions/main-functions/getTopperView.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $tpr_title; ?> | <?php echo $ProjectName; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include('header.php'); ?>

  <main id="main">
    <!-- ======= Announcements Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="text-left basecolor" style="margin-top:105px;">
           <h5><?php echo $tpr_title; ?></h5>
           <p style="font-size:13px;color:#B1B1B1"><?php echo $last_updated; ?></p>
        </div>

        <div class="w-100 p-3 mt-3">  
            <?php echo $tpr_desc; ?>
            <?php 
            if($tpr_link != '' || $tpr_link == null) 
            { 
                echo '<br><br><b><a href="'.$tpr_link.'" target="_blank" style="color:#E61F26">CLICK HERE TO DOWNLOAD</a></b>'; 
            }
            else
            {
                echo '';
            } 
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 col-lg-6 text-center p-2">
                    <?php echo $showThisAsRefOne; ?>
            </div>
            <div class="col-md-6 col-lg-6 text-center p-2">
                    <?php echo $showThisAsRefTwo; ?>
            </div>
        </div>
      </div>
    </section><!-- End Announcements Section -->

  </main><!-- End #main -->

  <?php include('footer.php'); ?>