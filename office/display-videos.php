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
        <title>Display Videos | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
        <?php include('functions/display-video-actions.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Videos List</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Display Videos / &nbsp;<a href="#" data-toggle="modal" data-target="#addNewVideo"><b><i class="fa fa-plus"></i> Add New Video</b></a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Videos
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="CoursesList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>VideoId</th>
                                            <th>VideoLinkId (Preview)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    //get all courses
                                    $getToppersList = mysqli_query($conn,"SELECT * FROM videos WHERE isDeleted='0' ORDER BY id DESC");
                                    $getCOuntOfToppers = mysqli_num_rows($getToppersList);

                                    if($getCOuntOfToppers == 0)
                                    {
                                        //no data
                                    }
                                    else
                                    {
                                        $sl = 1;
                                        while($row = mysqli_fetch_array($getToppersList))
                                        {
                                            $vid_id = $row['vid_id'];
                                            $vid_link = $row['vid_link'];
                                            $vid_status = $row['vid_status'];
                                            $date = $row['date'];
                                            $last_updated = $row['last_updated'];
                                            $isDeleted = $row['isDeleted'];

                                            //status show
                                            if($vid_status == 0)
                                            {
                                                $showThisStatus = '<span class="badge badge-success">Active</span>';
                                            }
                                            else
                                            {
                                                $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                                            }

                                            echo '
                                            <tr>
                                                <td>'.$sl++.'</td>
                                                <td>#'.$vid_id.'</td>
                                                <td><b><a href="https://www.youtube.com/watch?v='.$vid_link.'" target="_blank"><i class="fa fa-eye" style="font-size:10px"></i> '.$vid_link.'</a></b></a></td>
                                                <td><a href="functions/display-video-delete?deleteVideoId='.$vid_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
                                            </tr>
                                            ';
                                        }
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Modal -->
                <div class="modal fade" id="addNewVideo" tabindex="-1" role="dialog" aria-labelledby="addNewVideo" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewVideo">Add New Video</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                        <div class="form-group">
                            <label for="inputVideoAdding">Youtube Video Id</label>
                            <input type="text" class="form-control" id="inputVideoAdding" name="inputVideoAdding" placeholder="Video Id (eg. mJPEf7vWb6Q)" required>
                            <small id="inputVideoAdding" class="form-text text-muted">Check Preview of video by clicking eye icon after submitted</small>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="addNewVideoNow" class="btn btn-primary">Add New Video</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
               <?php include('footer.php'); ?>
              
               
