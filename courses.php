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
        </div>
        
      </div>
    </section><!-- End Announcements Section -->

  </main><!-- End #main -->

  <?php include('footer.php'); ?>