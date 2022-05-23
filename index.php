<?php echo include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Learning Today,<br>Leading Tomorrow</h1>
            <a href="<?php echo $baseURL; ?>courses" class="btn-get-started">Browse Courses</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

    <!-- ======= Popular Courses Section ======= -->
    <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">

                <div class="text-center mt-5">
                    <h3><b>Our Popular Courses</b></h3>
                </div>

                <div class="row my-auto d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="accordion text-center" id="accordionExample">
                        <?php include('functions/main-functions/getCourseTabs.php'); ?>
                    </div>
                </div>

            </div>
        </section><!-- End Popular Courses Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 my-auto" data-aos="fade-left" data-aos-delay="100">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 my-auto pt-lg-0 order-2 order-lg-1 content">
                        <h5 class="text-center basecolor">Important Updates / Announcements</h5>
                        <hr>
                        <ul>
                            <?php include('functions/main-functions/getHomeAnnouncements.php'); ?>
                        </ul>
                        <div class="text-center">
                            <a href="<?php echo $baseURL; ?>all-announcements"
                                class="btn btn-sm btn-primary newButtonEffect">View All Updates / Announcements</a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Students</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Courses</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Events</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Trainers</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>