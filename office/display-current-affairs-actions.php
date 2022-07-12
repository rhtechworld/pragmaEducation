<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-current-affairs-info-on-id.php'); ?>
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
                            <li class="breadcrumb-item active"><a href="display-current-affairs">Display Current Affair</a> &nbsp;/  <?php echo $broadCampOnUI; ?></li>
                        </ol>
                        <?php include('functions/display-current-affairs-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="CaTitleInput"><b>Current Affair Title :</b></label>
                                        <input type="text" class="form-control" id="CaTitleInput" name="CaTitleInput" value="<?php if(isset($ca_title)) { echo $ca_title; } else { echo ''; } ?>" placeholder="Download Title" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="CaLinkRef"><b>Current Affair Link : ( If Any Link Refernace )</b></label>
                                        <input type="text" class="form-control" id="CaLinkRef" name="CaLinkRef" value="<?php if(isset($ca_link)) { echo $ca_link; } else { echo '#'; } ?>" placeholder="Any ref. Link" required <?php echo $inputActionOnFocus; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="CaContentText"><b>Current Affair Content :</b> </label>
                                        <textarea class="form-control" id="editor" name="CaContentText" rows="15" cols="80" required <?php echo $inputActionOnFocus; ?>><?php if(isset($ca_desc)) { echo $ca_desc; } else { echo ''; } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="CaLiveStatus"><b>Current Affair Status :</b></label>
                                        <select class="form-control" id="CaLiveStatus" name="CaLiveStatus" required <?php echo $inputActionOnFocus; ?>>
                                            <option value=''>-- Select Status--</option> 
                                            <option value='0' <?php if(isset($ca_status)) { if($ca_status == 0) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Public (Active)</option>
                                            <option value="1" <?php if(isset($ca_status)) { if($ca_status == 1) { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Private (InActive)</option>
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
               
