<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-toppers-info-on-id.php'); ?>
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
                            <li class="breadcrumb-item active"><a href="display-toppers">Display Toppers</a> &nbsp;/  <?php echo $broadCampOnUI; ?></li>
                        </ol>
                        <?php include('functions/display-toppers-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="topperTitleInput"><b>Topper Title :</b></label>
                                        <input type="text" class="form-control" id="topperTitleInput" name="topperTitleInput" value="<?php if(isset($tpr_title)) { echo $tpr_title; } else { echo ''; } ?>" placeholder="Topper Title" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="toppersLinkRef"><b>Topper Link : ( If Any Link Refernace )</b></label>
                                        <input type="text" class="form-control" id="toppersLinkRef" name="toppersLinkRef" value="<?php if(isset($tpr_link)) { echo $tpr_link; } else { echo '#'; } ?>" placeholder="Any ref. Link" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="topperContentText"><b>Topper Content :</b> </label>
                                        <textarea class="form-control" id="editor" name="topperContentText" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($tpr_desc)) { echo $tpr_desc; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="topperLiveStatus"><b>Topper Status :</b></label>
                                        <select class="form-control" id="topperLiveStatus" name="topperLiveStatus" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select Status--</option> 
                                            <option value='0' <?php if(isset($Topper_status)) { if($Topper_status == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($Topper_status)) { if($Topper_status == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
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
               
