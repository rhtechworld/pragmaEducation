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
        <title>Add New Offer | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Add New Offer</h3>
                        <?php include('functions/course-details-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="discount-offers">Offers</a> &nbsp;/ Add New Offer</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-edit me-1"></i>
                                Enter Offer Details</b>
                            </div>
                            <?php include('functions/offers-list-actions.php'); ?>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="offerStatus"><b>Offer Status :</b> </label>
                                        <select class="form-control" id="offerStatus" name="offerStatus" required>
                                            <option value="">-- Select --</option>
                                            <option value="0" selected>Active</option>
                                            <option value="1">InActive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="offerOnCourse"><b>Offer On Course :</b> </label>
                                        <select class="form-control" id="offerOnCourse" name="offerOnCourse" required>
                                            <option value="">-- Select Course Offer Applies --</option>
                                            <?php
                                                //query to run show list drop down of course tabs
                                                $showDropDownCouses = mysqli_query($conn,"SELECT * FROM courses WHERE isDeleted='0' ORDER BY course_name");
                                                while($row = mysqli_fetch_array($showDropDownCouses))
                                                {
                                                    $running_course_id = $row['course_id'];
                                                    $running_course_name = $row['course_name'];
                                                    
                                                    echo '<option value="'.$running_course_id.'">'.$running_course_name.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="offerName"><b>Offer Name :</b> </label>
                                        <input type="text" class="form-control" id="offerName" name="offerName"  placeholder="Enter Offer Name (Eg. Early Bird Offer)" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="offerPercentage"><b>Offer At <small>( Enter in % )</small>:</b> </label>
                                        <input type="number" class="form-control" id="offerPercentage" name="offerPercentage"  placeholder="Enter Offer At (Eg. 10)" required>
                                    </div>
                                    <button type="submit" name="addOfferDetails" class="btn btn-primary btn-block">Add Offer Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
