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
        <title>Search Student | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Search Student</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="students-list">Students</a> &nbsp;/ &nbsp;Search Student </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="searchStudent"><b>Student ID / Email / Mobile Number:</b> </label>
                                        <input type="text" class="form-control" id="searchStudent" name="searchStudent" placeholder="Enter Student ID / Email / Mobile Number" required>
                                        </select>
                                    </div>
                                    <button type="submit" name="searchStudentAction" class="btn btn-primary btn-block">Search Now</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <h5>Search Result</h5>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-bordered" id="StudentsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>StudentId</th>
                                            <th>StudentName</th>
                                            <th>StudentEmail</th>
                                            <th>StudentNumber</th>
                                            <th>Details</th>
                                            <th>Verification</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include('functions/search-students-list.php'); ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
