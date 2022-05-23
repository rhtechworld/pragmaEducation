<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/all-course-videos-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View Course Videos | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4"><g style="font-size:14px">Course Videos On:</g><br> <?php echo $dbCoureseTabName; ?> : <b><?php echo $course_name; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="all-course-videos">Course Videos</a> &nbsp;/ &nbsp;<b><?php echo $course_name; ?></b> &nbsp;/ &nbsp;<a class="video-js-add" id="<?php echo $course_id; ?>" data-action-id="<?php echo $course_tab_id; ?>" href="#"><b><i class="fa fa-plus"></i> Add New Video</a></b> </li>
                        </ol>
                        <?php include('functions/all-course-videos-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                        if($getCntOnVideos == 0)
                                        {
                                            echo '
                                            <div class="alert alert-primary text-primary">
                                                No Videos Found On This Course!
                                            </div>
                                            ';
                                        }
                                        else
                                        {
                                            while($row = mysqli_fetch_array($getvideosQuery))
                                            {
                                                $course_tab_id = $row['course_tab_id'];
                                                $course_id = $row['course_id'];
                                                $video_uid = $row['video_uid'];
                                                $video_title = $row['video_title'];
                                                $video_id = $row['video_id'];
                                                $date = $row['date'];
                                                $status = $row['status'];
                                                $isDeleted = $row['isDeleted'];
                                                $last_updated = $row['last_updated'];

                                                //status show
                                                if($status == 0)
                                                {
                                                    $showStatus = '<span class="badge badge-success"><i class="fa fa-eye"></i> Public</span>';
                                                }
                                                else
                                                {
                                                    $showStatus = '<span class="badge badge-danger"><i class="fa fa-lock"></i> Private</span>';
                                                }

                                                echo'
                                                <div class="mb-2 col-md-4 col-lg-4 p-2">
                                                    <div class="card p-2 shadow" style="border:1px solid black">
                                                        <video style="width:100%;border-radius:10px"
                                                            id="my-video"
                                                            class="video-js"
                                                            controls
                                                            preload="auto"
                                                            height="150"
                                                            poster="MY_VIDEO_POSTER.jpg"
                                                            data-setup="{}"
                                                            >
                                                            <source src="https://drive.google.com/uc?id='.$video_id.'&export=download" type="video/mp4" />
                                                        </video>
                                                        <b class="mt-2 mb-2">'.$video_title.'</b>
                                                        <hr style="margin:0">
                                                        <div class="row">
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              '.$showStatus.'
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                              <a href="#" class="video-js-edit" id="E'.$video_uid.'" data-action-id="'.$video_uid.'"><i class="fa fa-edit"></i> Edit</a>
                                                            </div>
                                                            <div class="col-md-4 col-lg-4 text-center mt-2 mb-1">
                                                            <a href="#" class="video-js-delete" id="D'.$video_uid.'" data-action-id="'.$video_uid.'"><i class="fa fa-trash"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                            }
                                        }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
