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
        <title>Add New Quiz | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Add New Quiz</h5>
                        <?php include('functions/all-quiz-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Quiz </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="POST">
                                <div class="form-group">
                                            <label for="inputqz_name">Quiz Name</label>
                                            <input type="text" class="form-control" id="inputqz_name" name="inputqz_name" placeholder="Enter Quiz Name">
                                        </div>
                                    <div class="form-group">
                                        <label for="quiz_type"><b>Select Quiz Type:</b> </label>
                                        <select class="form-control" id="quiz_type" name="quiz_type" onchange="setControlesDependsOnQuizType(this.value)" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="guest">Guest Quiz (Normal)</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12">
                                        <button type="submit" name="createNewQuizType" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Create New Quiz</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
