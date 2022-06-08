<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Courses | <?php echo $ProjectName; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include('header.php'); ?>

  <main id="main">

    <div class="text-center mb-0" style="margin-top:85px;">
        <div class="section-head col-sm-12 mb-0">
          <h4 style="font-size:20px"><span>All Our </span>Courses</h4>
        </div>
    </div>
    <!-- ======= Announcements Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-3 col-lg-3 my-auto">
              <img src="<?php echo $baseURL; ?>assets/new-img/courses.png" class="img-fluid">
          </div>
          <div class="col-md-9 col-lg-9 my-auto">
              <div class="accordion text-center" id="accordionExample">
                  <?php include('functions/main-functions/getCourseTabs.php'); ?>
              </div> 
          </div>
        </div>
        
      </div>
    </section><!-- End Announcements Section -->

  </main><!-- End #main -->

  <?php include('footer.php'); ?>