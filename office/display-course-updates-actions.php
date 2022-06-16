<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-course-updates-on-id.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $pageTitile; ?> | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-3"><g style="font-size:17px"><?php echo $pageTitileHead; ?></b></h5>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="course-updates-actions">Course Updates</a> &nbsp;/  <?php echo $broadCampOnUI; ?></li>
                        </ol>
                        <?php include('functions/display-course-updates-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="updateTitleInput"><b>Update Title :</b></label>
                                        <input type="text" class="form-control" id="updateTitleInput" name="updateTitleInput" value="<?php if(isset($up_title_OnUpdates)) { echo $up_title_OnUpdates; } else { echo ''; } ?>" placeholder="Update Title" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="updateContactContent"><b>Update Content :</b> </label>
                                        <textarea class="form-control" id="editor" name="updateContactContent" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($up_desc_OnUpdates)) { echo $up_desc_OnUpdates; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="courseUpdateStatus"><b>Update Status :</b></label>
                                        <select class="form-control" id="courseUpdateStatus" name="courseUpdateStatus" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select Status--</option> 
                                            <option value='0' <?php if(isset($main_status_OnUpdates)) { if($main_status_OnUpdates == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($main_status_OnUpdates)) { if($main_status_OnUpdates == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
                                        </select>
                                    </div>
                                    <?php echo $actionButtonToTakeAction; ?>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
