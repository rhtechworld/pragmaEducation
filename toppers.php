<?php echo include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>IAS PREPARATION TIPS FROM PRAGMA TOPPERS | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
</head>

<div id="main">

    <div class="section-head col-sm-12 mb-0" style="margin-top:85px;">
        <h4 style="font-size:20px"><span>IAS PREPARATION TIPS FROM </span> PRAGMA TOPPERS</h4>
    </div>

   <!-- ======= Announcements Section ======= -->
   <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="border w-100 p-3">
            
              <?php include('functions/main-functions/getAllAnnouncements.php'); ?>
            
        </div>
        
      </div>
    </section><!-- End Announcements Section -->


</div>
<?php include('footer.php'); ?>