<? ob_start(); ?>
<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
    
    <main id="main">

        <div class="section-head col-sm-12 mb-1" style="margin-top:105px;">
            <h4 style="font-size:20px"><span>View/Edit  </span> Profile </h4>
        </div>

        <div class="container mb-4">

            <?php include('functions/update-student-profile.php'); ?>
            <div class="row mb-4">
                <div class="col-md-6 col-lg-6">
                <form action="" method="POST">
                    <div class="form-group mb-3">
                        <label for="fullName">Full Name : </label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name" value="<?php echo $student_name_session; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address" value="<?php echo $student_email_session; ?>" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mobileNumber">Mobile Number</label>
                        <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" value="<?php echo $student_number_session; ?>" placeholder="Mobile Number" required>
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input" id="twofacheck" name="twofacheck" value="1" <?php echo $updateProfileCHeck ?>>
                        <label class="custom-control-label" for="twofacheck">Two Factor Authentication (2FA)</label>
                    </div>
                    <button type="submit" name="updateMyProfile" class="btn btn-primary btn-sm btn-block">Update Profile</button>
                </form>
                </div>
                <div class="col-md-6 col-lg-6">
                <form action="" method="POST">
                    <h5>Change Password</h5>
                    <div class="form-group mt-4 mb-3">
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter Old Password" required>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <input type="password" class="form-control" id="newPassword" pattern=".{8,}" title="Eight or more characters" name="newPassword" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <input type="password" class="form-control" id="newPasswordOne" pattern=".{8,}" title="Eight or more characters" name="newPasswordOne" onkeyup="checkUpdatePasswords(this.value)" placeholder="Confirm New Password" required>
                        <g id="updateChangePasswordHint"></g>
                    </div>
                    <button type="submit" name="updateChangePassword" id="updateChangePassword" class="btn btn-primary">Change Password</button>
                </form>
                </div>
            </div>

        </div>

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script>
    $('.collapse').collapse()
    </script>
<? ob_flush(); ?>