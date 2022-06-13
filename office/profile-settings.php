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
    <title>Profile | <?php echo $ProjectName; ?></title>
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h5 class="mt-4">View/Edit Profile</h5>
            <hr>
            <?php include('functions/profile-details-actions.php'); ?>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                <form action="" method="POST">
                    <h5>Edit Info</h5>
                    <div class="form-group mt-2">
                        <label for="fullName">Full Name : </label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter Full Name" value="<?php if(isset($admin_name_onSession)) echo $admin_name_onSession; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address"  value="<?php if(isset($username_onSession)) echo $username_onSession; ?>"  readonly>
                    </div>
                    <button type="submit" name="updateMyProfile" class="btn btn-primary btn-sm btn-block">Update Profile</button>
                </form>
                </div>
                <div class="col-md-6 col-lg-6">
                <form action="" method="POST">
                    <h5>Change Password</h5>
                    <div class="form-group mt-4">
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter Old Password" required>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control" id="newPassword" pattern=".{8,}" title="Eight or more characters" name="newPassword" placeholder="Enter New Password" required>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" class="form-control" id="newPasswordOne" pattern=".{8,}" title="Eight or more characters" name="newPasswordOne" onkeyup="checkUpdatePasswords(this.value)" placeholder="Confirm New Password" required>
                        <g id="updateChangePasswordHint"></g>
                    </div>
                    <button type="submit" name="updateChangePassword" id="updateChangePassword" class="btn btn-primary">Change Password</button>
                </form>
                </div>
            </div>
        </div>
    </main>
    <script>
        function checkUpdatePasswords(pw2)
        {
            pw1 = document.getElementById('newPassword').value;
            document.getElementById('updateChangePassword').disabled = true;

            if(pw1 == pw2)
            {
                document.getElementById('updateChangePassword').disabled = false;
                document.getElementById('updateChangePasswordHint').innerHTML = "";
            }
            else
            {
                document.getElementById('updateChangePassword').disabled = true;
                document.getElementById('updateChangePasswordHint').innerHTML = "<div><small style='color:red'>Passwords mismatched</small></div>";
            }
        }
    </script>
    <?php include('footer.php');