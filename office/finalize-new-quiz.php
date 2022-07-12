<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_SESSION['quizTypeNow']) && isset($_SESSION['qtnNoForNow']) && isset($_SESSION['quizIdNow']) && $_SESSION['inputqz_name'])
{
    $typeQuiz_now = mysqli_real_escape_string($conn, $_SESSION['quizTypeNow']);
    $typeQno_now = mysqli_real_escape_string($conn, $_SESSION['qtnNoForNow']);
    $qzid_now = mysqli_real_escape_string($conn, $_SESSION['quizIdNow']);
    $inputqz_name = mysqli_real_escape_string($conn, $_SESSION['inputqz_name']);

    //check count on questions from db
    $makeACheckOnQuestionNow = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qz_id='$qzid_now' AND isDeleted='0'");
    $getCountOnItmakeACheckOnQuestionNow = mysqli_num_rows($makeACheckOnQuestionNow);

    if($getCountOnItmakeACheckOnQuestionNow == 0)
    {
        //donothing
        $qutionAddedQount = 0;
    }
    else
    {
        $qutionAddedQount = $getCountOnItmakeACheckOnQuestionNow;
    }
}
else
{
    echo '<script>alert("Session Out, Create New Quiz Now...")</script>';
    header('refresh:0;url=add-new-quiz?msg=NoSession');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Finalize Quiz | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Finalize Quiz (<?php echo $inputqz_name; ?>) (<?php echo $typeQuiz_now; ?>)</h5>
                        <?php include('functions/all-quiz-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="add-new-quiz">Add New Quiz</a></li>
                            <li class="breadcrumb-item active">Finalize Quiz </li>
                            <li class="breadcrumb-item active"><?php echo $inputqz_name; ?> </li>
                            <li class="breadcrumb-item active"><?php echo $qzid_now; ?> </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="inputOfQuizType" value="<?php echo $typeQuiz_now; ?>">
                                    <input type="hidden" name="inputOfQuizId" value="<?php echo $qzid_now; ?>">
                                    <input type="hidden" name="inputOfQtnId" value="<?php echo $qtnid_now; ?>">
                                    <input type="hidden" name="inputOfQtnNo" value="<?php echo $qutionAddedQount+1; ?>">
                                    <input type="hidden" name="inputqz_name" value="<?php echo $inputqz_name; ?>">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Total Added Questions :</span>
                                    </div>
                                    <input type="text" class="form-control" id="qtnInput" name="qtnInput" value="<?php echo $qutionAddedQount; ?>" placeholder="Enter Question..." readonly required>
                                </div>
                                    <hr>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Pass Marks</span>
                                    </div>
                                    <input type="number" class="form-control" id="inputPassmarkOnQuiz" name="inputPassmarkOnQuiz" min="1" max="<?php echo $qutionAddedQount; ?>" placeholder="Enter Passmark Depends on questions added ( between 1 to <?php echo $qutionAddedQount; ?> )" required>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Quiz Status</span>
                                    </div>
                                    <select class="form-control" id="quizStatusInput" name="quizStatusInput" required>
                                    <option value="">-- Select Status --</option>
                                    <option value="0">Active (Public)</option>
                                    <option value="1">InActive (Private)</option>
                                    </select>
                                </div>
                                <hr>   
                                <div class="row mt-auto text-center">
                                    <div class="col-lg-6 col-md-6 mt-auto text-center">
                                        <button type="submit" name="finalizeTheQuizNow" class="mt-2 btn btn-primary mb-2">Finalize Now</button>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt-auto text-center">
                                        <small><i>No Edit option on saved/submited questions, if any edit required then edit from quiz list later.</i></small>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include('inc/modals.php'); ?>
               <?php include('footer.php'); ?>
               
