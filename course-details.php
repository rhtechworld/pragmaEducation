<?php include('config.php'); ?>
<?php include('functions/main-functions/getCourceDetails.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $course_name; ?> | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>

    <main id="main">

        <div class="section-head col-sm-12 mb-0 text-center" style="margin-top:85px;">
            <h4 style="font-size:20px;"><span>Course</span> Details</h4>
        </div>

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details mt-4 p-1">
            <div class="container mt-0" data-aos="fade-up">

                <div class="row mt-0">
                    <div class="col-lg-8 my-auto">
                        <h3><?php echo $course_name; ?></h3>
                        <?php echo $course_desc; ?>
                    </div>
                    <div class="col-lg-4 my-auto">

                     <?php echo $OfferPricingDetails; ?>

                    </div>

                </div>

            </div>
        </section><!-- End Cource Details Section -->

        
        <!-- ======= Cource Details Tabs Section ======= -->
        <section id="cource-details-tabs" class="cource-details-tabs my-auto">
            <div class="container" data-aos="fade-up">
            <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#faqs">FAQ's</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#packageDetails">Package Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#contactSupport">Contact Support</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 mt-4 mt-lg-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="faqs">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 my-auto">
                                        <div class="accordion" id="accordionExample">
                                          <?php include('functions/main-functions/getCourceDetailsFaqs.php'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 my-auto">
                                        <img src="<?php echo $baseURL; ?>assets/new-img/faqs.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="packageDetails">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 my-auto">
                                        <h3>Package Details</h3>

                                        <table class="table text-left">
                                            <?php echo $navTabPricingDetails; ?>
                                        </table>

                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 my-auto">
                                        <img src="<?php echo $baseURL; ?>assets/new-img/packageDetails.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="contactSupport">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1 my-auto">
                                        <h3>Contact Support</h3>
                                        <b>Contact @ </b> <?php echo $mainContactNumberOne; ?><br>
                                        <b>Mail @ </b> <?php echo $mainContactEmail; ?>
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2 my-auto">
                                        <img src="<?php echo $baseURL; ?>assets/new-img/support.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Cource Details Tabs Section -->

    </main><!-- End #main -->

    <?php include('footer.php'); ?>