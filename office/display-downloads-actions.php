<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-downloads-info-on-id.php'); ?>
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
                            <li class="breadcrumb-item active"><a href="display-downloads">Display Downloads</a> &nbsp;/  <?php echo $broadCampOnUI; ?></li>
                        </ol>
                        <?php include('functions/display-downloads-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="downloadTitleInput"><b>Download Title :</b></label>
                                        <input type="text" class="form-control" id="downloadTitleInput" name="downloadTitleInput" value="<?php if(isset($dwn_title)) { echo $dwn_title; } else { echo ''; } ?>" placeholder="Download Title" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="downloadsLinkRef"><b>Download Link : ( If Any Link Refernace )</b></label>
                                        <input type="text" class="form-control" id="downloadsLinkRef" name="downloadsLinkRef" value="<?php if(isset($dwn_link)) { echo $dwn_link; } else { echo '#'; } ?>" placeholder="Any ref. Link" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="downloadContentText"><b>Download Content :</b> </label>
                                        <textarea class="form-control" id="editor" name="downloadContentText" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($dwn_desc)) { echo $dwn_desc; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="downloadLiveStatus"><b>Download Status :</b></label>
                                        <select class="form-control" id="downloadLiveStatus" name="downloadLiveStatus" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select Status--</option> 
                                            <option value='0' <?php if(isset($download_status)) { if($download_status == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($download_status)) { if($download_status == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
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
               
