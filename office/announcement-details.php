<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/announcement-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Announcement Details | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Announcement Details</h3>
                        <?php include('functions/announcement-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="announcements">Announcements</a>&nbsp; / Details </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-info-circle me-1"></i>
                                Announcements Details : <u><b><?php echo $ann_title; ?></u></b>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="annStatus"><b>Announcement Status :</b> </label>
                                        <select class="form-control" id="annStatus" name="annStatus" readonly>
                                            <option value="<?php echo $status; ?>"><?php echo $statusNameShow; ?></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="annTitel"><b>Announcement Title :</b> </label>
                                        <input type="text" class="form-control" id="annTitel" name="annTitel" value="<?php if(isset($ann_title)) echo $ann_title; ?>" placeholder="Enter Announcement Title" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="annBy"><b>Announcement By :</b> </label>
                                        <input type="text" class="form-control" id="annBy" name="annBy" value="<?php if(isset($ann_by)) echo $ann_by; ?>" placeholder="Announcement By" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="annDesc"><b>Announcement Description :</b> </label>
                                        <textarea class="form-control" id="editor" name="annDesc" rows="15" cols="80" readonly><?php if(isset($ann_desc)) echo $ann_desc; ?></textarea>
                                    </div>
                                </form>
                                <div class="text-right">
                                    <a class="btn btn-primary btn-sm" href="edit-announcement-details?annId=<?php echo $ann_id; ?>">Edit Announcement Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
