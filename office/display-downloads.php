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
        <title>Display Downloads | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Downloads Info List</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Display Downloads / &nbsp;<a href="display-downloads-actions?action=addNew&dwn_id=<?php echo rand(10000,99999); ?>&actionTaken=true"><b><i class="fa fa-plus"></i> Add New Downloads Info</b></a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List of Info Downloads
                            </div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="CoursesList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>DownloadId</th>
                                            <th>DownloadTitle</th>
                                            <th>Status</th>
                                            <th>LastUpdated</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include('functions/display-downloads-list.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('footer.php'); ?>
              
               
