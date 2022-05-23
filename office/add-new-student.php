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
        <title>Add New Student | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Add New Student</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="students-list">Students</a> &nbsp;/ Add New Students </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-info-circle me-1"></i>
                                Enter Student Details</b>
                            </div>
                            <?php include('functions/students-list-actions.php'); ?>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="studentName"><b>Student Name :</b> </label>
                                        <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Enter Student Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="studentEmail"><b>Student Email :</b> </label>
                                        <input type="email" class="form-control" id="studentEmail" name="studentEmail" placeholder="Enter Student Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="studentMobile"><b>Student Mobile :</b> </label>
                                        <input type="number" class="form-control" id="studentMobile" name="studentMobile" placeholder="Enter Student Mobile Number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="studentPassword"><b>Student Login Password :</b> </label>
                                        <input type="text" class="form-control" id="studentPassword" name="studentPassword" placeholder="Enter Student Password" required>
                                    </div>
                                    <div class="form-group mt-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="studentTwoFactor" value="1" name="studentTwoFactor">
                                            <label class="custom-control-label" for="studentTwoFactor"><b>Two-Factor Authentication</b></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="student-edit-status"><b>Account Verification</b></label>
                                        <select class="form-control" id="student-edit-status" name="studentVerification" required>
                                            <option value=''>-- Select --</option>
                                            <option value='0'>NotVerified</option>
                                            <option value="1">Verified</option>
                                        </select>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" name="addNewStudent" class="btn btn-primary btn-block">Add Student</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
