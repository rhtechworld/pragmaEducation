<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Video ID Process | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4"><g style="font-size:16px">Find Process Video ID:</g></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="all-course-videos">Course Videos</a> &nbsp;/ &nbsp;Find Process </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <b>STEP 1 :</b>
                                    <p>Click on video in google drive</p>
                                    <img src="assets/img/process-step-one.png" style="width:800px;height:350px">
                                    <hr class="mt-2" style="width:80%">
                                    <b>STEP 2 :</b>
                                    <p>Click on three dots and select open in new window</p>
                                    <img src="assets/img/process-step-two.png" style="width:900px;height:450px">
                                    <hr class="mt-2" style="width:80%">
                                    <b>STEP 3 :</b>
                                    <p>find video ID in URL (copy the correct id from url , check the screenshot)<br>NOTE : After adding video ID check the preview by clicking Preview below input.</p>
                                    
                                    <img src="assets/img/process-step-three.png" style="width:900px;height:450px">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
