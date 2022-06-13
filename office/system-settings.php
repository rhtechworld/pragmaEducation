<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php include('functions/get-tax-details.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <title>System Settings - Pragma</title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Settings</h5>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item active"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item">Settings</li>
                        </ol>
                        <?php include('functions/tax-details-actions.php'); ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-money-bill me-1"></i>
                                Tax Settings
                            </div>
                            <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="taxnameInput"><b>Tax Name</b></label>
                                    <input type="text" class="form-control" id="taxnameInput" name="taxnameInput" value="<?php if(isset($tax_name)) echo $tax_name; ?>" placeholder="Tax Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="taxAtInput"><b>Tax At (in %)</b></label>
                                    <input type="number" class="form-control" id="taxAtInput" name="taxAtInput" value="<?php if(isset($tax_at)) echo $tax_at; ?>" placeholder="Tax Percentage (eg : 18)" required>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="liveTaxStatus" value="1" id="liveTaxStatus" <?php echo $tax_status_input; ?>>
                                    <label class="custom-control-label" for="liveTaxStatus"><b>Tax Status</b> ( Enable / Disable )</label>
                                </div>
                                <button type="submit" name="updateTaxSettings" class="mt-3 btn btn-primary btn-sm btn-block">Update Tax Settings</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include('footer.php'); ?>