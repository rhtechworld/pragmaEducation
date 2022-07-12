<?php include('config.php'); ?>
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
        <section id="aboutus" class="aboutus">
            <div class="container" data-aos="fade-up">
                <div class="row">
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
                        <p>OUR MOTTO: Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.</p>
                        <p>A mid-term to long-term guidance shall be provided to all the students that enrol with us just to ensure that your journey is as beautiful as ours. 
Address the issues faced by consumer market and creating an utilizable value to the modules. In short, we really want to help the aspirants in their journeys.
Provide the students with a perspective and confidence to continue their journey nevertheless without us.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ======= Popular Courses Section ======= -->
        <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">

                <div class="text-center mt-5">
                    <h3><b>Our Popular Courses</b></h3>
                </div>

                <div class="row my-auto mt-3 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <?php 

                    $getListOfCoursesList = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0' AND status='0' ORDER BY id DESC");
                    $getCountOnLstOfDataCoursesList = mysqli_num_rows($getListOfCoursesList);

                    $slNo = 1;
                    while($row = mysqli_fetch_array($getListOfCoursesList))
                    {
                        $course_tab_id_ref = $row['course_tab_id'];
                        $course_id = $row['course_id'];
                        $course_name = $row['course_name'];
                        $status = $row['status'];
                        $isDeleted = $row['isDeleted'];
                        $date = $row['date'];
                        $last_updated = $row['last_updated'];

                        //status show
                        if($status == 0)
                        {
                            $showThisStatus = '<span class="badge badge-success">Active</span>';
                        }
                        else
                        {
                            $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                        }


                        echo '
                                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                    <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                        <b class="mt-2 mb-2" style="font-size:18px">'.$course_name.'</b>
                                        <hr style="margin:0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                                <a href="course-details?course_id='.$course_id.'" class="btn btn-primary btn-sm newButtonEffect">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                    }

                ?>
            
                </div>

            </div>
        </section>
        <!-- End Popular Courses Section -->

        <!-- ======= Popular Courses Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="text-center mt-5">
                    <h3><b>Our Test Series's</b></h3>
                </div>

                <div class="row my-auto mt-3 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <?php 

                    $getListOfTestSeries = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE isDeleted='0' ORDER BY id DESC");
                    $getCountOnLstOfData = mysqli_num_rows($getListOfTestSeries);

                    $slNo = 1;
                    while($row = mysqli_fetch_array($getListOfTestSeries))
                    {
                        $ts_id = $row['ts_id'];
                        $course_id = $row['course_id'];
                        $ts_name = $row['ts_name'];
                        $ts_price = $row['ts_price'];
                        $ts_type = $row['ts_type'];
                        $ts_desc = $row['ts_desc'];
                        $pass_mark = $row['pass_mark'];
                        $status = $row['status'];
                        $isDeleted = $row['isDeleted'];
                        $last_updated = $row['last_updated'];

                        //check course details in db
                        $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id'");
                        while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                        {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                        }

                        //count of schedule now
                        $getTheCountOfScheduleNowHere = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id' AND isDeleted='0'");
                        $thisIsCountOfListOfAllScedules = mysqli_num_rows($getTheCountOfScheduleNowHere);

                        //status show
                        if($status == 0)
                        {
                            $showThisStatus = '<span class="badge badge-success">Active</span>';
                        }
                        else
                        {
                            $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                        }


                        echo '
                                <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                    <div class="card p-2 shadow" style="border:1px solid #E31E26">
                                        <b class="mt-2 mb-2" style="font-size:18px">'.$ts_name.'<br> ( '.$course_name.' )</b>
                                        <hr style="margin:0">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 text-center mt-2 mb-1">
                                            <a href="test-series-enroll-now?tsId='.$ts_id.'" class="btn btn-primary btn-sm newButtonEffect">Enroll Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        ';
                    }

                ?>
            
                </div>
                </div>

            </div>
        </section>
        <!-- End Popular Courses Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
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