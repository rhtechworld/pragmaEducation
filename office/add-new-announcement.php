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
        <title>Add Announcement | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Add Announcement</h3>
                        <?php include('functions/announcement-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="announcements">Announcements</a>&nbsp; / Add New </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Enter Announcement Details</b>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="annStatus"><b>Announcement Status :</b> </label>
                                        <select class="form-control" id="annStatus" name="annStatus" required>
                                            <option value="">-- Select Status --</option>
                                            <option value="0" selected>Public</option>
                                            <option value="1">Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="annTitel"><b>Announcement Title :</b> </label>
                                        <input type="text" class="form-control" id="annTitel" name="annTitel"  placeholder="Enter Announcement Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="annBy"><b>Announcement By :</b> </label>
                                        <input type="text" class="form-control" id="annBy" name="annBy"  placeholder="Announcement By" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="annDesc"><b>Announcement Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="annDesc" rows="15" cols="80" required></textarea>
                                    </div>
                                    <button type="submit" name="addAnnDetails" class="btn btn-primary btn-block">Add Announcement</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
