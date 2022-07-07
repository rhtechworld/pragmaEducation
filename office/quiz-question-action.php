<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php
if(isset($_GET['qtn_id']) && isset($_GET['action']))
{
    $qtn_id = mysqli_real_escape_string($conn, $_GET['qtn_id']);
    $qz_id = mysqli_real_escape_string($conn, $_GET['qz_id']);
    $action = mysqli_real_escape_string($conn, $_GET['action']);
    $qz_type = mysqli_real_escape_string($conn, $_GET['qz_type']);

        if($action == 'edit')
        {

                //find question id in db
                $findQuestionIdInnDbNow = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qtn_id='$qtn_id' AND isDeleted='0'");
                $getCountOnThisfindQuestionIdInnDbNow = mysqli_num_rows($findQuestionIdInnDbNow);

                if($getCountOnThisfindQuestionIdInnDbNow == 0)
                {
                    echo '<script>alert("Somthing Error...")</script>';
                    header('refresh:0;url=./');
                }
                else
                {
                    //get details
                    while($row = mysqli_fetch_array($findQuestionIdInnDbNow))
                    {
                        $qz_id = $row['qz_id'];
                        $qz_type = $row['qz_type'];
                        $qtn_no = $row['qtn_no'];
                        $qtn_id = $row['qtn_id'];
                        $choice_one = $row['choice_one'];
                        $choice_two = $row['choice_two'];
                        $choice_three = $row['choice_three'];
                        $choice_four = $row['choice_four'];
                        $qtn = $row['qtn'];
                        $qtn_ans = $row['qtn_ans'];
                        $status = $row['status'];
                        $isDeleted = $row['isDeleted'];
                        $date = $row['date'];
                    }

                }

            $showTitleThisNow = "<b>Edit</b>";
            $actionOnINputNow = '';
            $qtn_id_show = $qtn_id;

            $getCountOncheckQzIdNowQtn_show = $qtn_no;
            $takeActionButtonNow = '<button type="submit" name="updateQuestionNow" class="mt-2 btn btn-primary mb-2">Update & Save Question</button>';

        }
        else if($action == 'delete')
        {

            //find question id in db
            $findQuestionIdInnDbNow = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qtn_id='$qtn_id' AND isDeleted='0'");
            $getCountOnThisfindQuestionIdInnDbNow = mysqli_num_rows($findQuestionIdInnDbNow);

            if($getCountOnThisfindQuestionIdInnDbNow == 0)
            {
                echo '<script>alert("Somthing Error...")</script>';
                header('refresh:0;url=./');
            }
            else
            {
                //get details
                while($row = mysqli_fetch_array($findQuestionIdInnDbNow))
                {
                    $qz_id = $row['qz_id'];
                    $qz_type = $row['qz_type'];
                    $qtn_no = $row['qtn_no'];
                    $qtn_id = $row['qtn_id'];
                    $choice_one = $row['choice_one'];
                    $choice_two = $row['choice_two'];
                    $choice_three = $row['choice_three'];
                    $choice_four = $row['choice_four'];
                    $qtn = $row['qtn'];
                    $qtn_ans = $row['qtn_ans'];
                    $status = $row['status'];
                    $isDeleted = $row['isDeleted'];
                    $date = $row['date'];
                }

            }

            $showTitleThisNow = "<b>Delete</b>";
            $actionOnINputNow = 'readonly';
            $qtn_id_show = $qtn_id;

            $getCountOncheckQzIdNowQtn_show = $qtn_no;
            $takeActionButtonNow = '<button type="submit" name="deleteQuestionNow" class="mt-2 btn btn-danger mb-2">Delete Question</button>';
        }
        else if($action == 'add')
        {
            //check qzid in database
            $checkQzIdNowCountOnQuestions = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qz_id='$qz_id' AND isDeleted='0'");
            $getCountOncheckQzIdNowQtn = mysqli_num_rows($checkQzIdNowCountOnQuestions);

            $getCountOncheckQzIdNowQtn_show = $getCountOncheckQzIdNowQtn + 1;

            $showTitleThisNow = "<b>Add</b>";
            $actionOnINputNow = '';
            $qtn_id_show = 'New Question';
            $takeActionButtonNow = '<button type="submit" name="addNewQuestionNowViaAccess" class="mt-2 btn btn-primary mb-2">Add Question</button>';
        }
        else
        {
            echo '<script>alert("Somthing Error...")</script>';
            header('refresh:0;url=view-all-quiz-questions?qzid='.$qz_id.'&msg=ActionWrong');
        }
    
}
else
{
    echo '<script>alert("Somthing Error...")</script>';
    header('refresh:0;url=view-all-quiz-questions?qzid='.$qz_id.'');
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
        <title>Quiz Question | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Quiz Question <?php echo $showTitleThisNow; ?></h5>
                        <?php include('functions/all-quiz-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="view-all-quiz-questions?qzid=<?php echo $qz_id; ?>">Quiz Questions</a></li>
                            <li class="breadcrumb-item active">Quiz Question </li>
                            <li class="breadcrumb-item active"><?php echo $qtn_id_show; ?> </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="inputOfQuizType" value="<?php if(isset($qz_type)) { echo $qz_type; } else { echo ''; } ?>">
                                    <input type="hidden" name="inputOfQuizId" value="<?php if(isset($qz_id)) { echo $qz_id; } else { echo ''; } ?>">
                                    <input type="hidden" name="inputOfQtnId" value="<?php if(isset($qtn_id)) { echo $qtn_id; } else { echo ''; } ?>">
                                    <input type="hidden" name="inputOfQtnNo" value="<?php if(isset($getCountOncheckQzIdNowQtn_show)) { echo $getCountOncheckQzIdNowQtn_show; } else { echo ''; } ?>">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Question No : &nbsp; <b><?php echo $getCountOncheckQzIdNowQtn_show; ?></b></span>
                                    </div>
                                    <input type="text" class="form-control" id="qtnInput" name="qtnInput" value="<?php if(isset($qtn)) { echo $qtn; } else { echo ''; } ?>" placeholder="Enter Question..." required <?php echo $actionOnINputNow; ?>>
                                </div>
                                    <hr>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Option -  <b>A</b></span>
                                    </div>
                                    <input type="text" class="form-control" id="optionOneInput" name="optionOneInput" value="<?php if(isset($choice_one)) { echo $choice_one; } else { echo ''; } ?>" placeholder="Enter This Option Answer" required <?php echo $actionOnINputNow; ?>>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Option -  <b>B</b></span>
                                    </div>
                                    <input type="text" class="form-control" id="optionTwoInput" name="optionTwoInput" value="<?php if(isset($choice_two)) { echo $choice_two; } else { echo ''; } ?>" placeholder="Enter This Option Answer" required <?php echo $actionOnINputNow; ?>>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Option -  <b>C</b></span>
                                    </div>
                                    <input type="text" class="form-control" id="optionThreeInput" name="optionThreeInput" value="<?php if(isset($choice_three)) { echo $choice_three; } else { echo ''; } ?>" placeholder="Enter This Option Answer" required <?php echo $actionOnINputNow; ?>>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Option -  <b>D</b></span>
                                    </div>
                                    <input type="text" class="form-control" id="optionFourInput" name="optionFourInput" value="<?php if(isset($choice_four)) { echo $choice_four; } else { echo ''; } ?>" placeholder="Enter This Option Answer" required <?php echo $actionOnINputNow; ?>>
                                </div>
                                <hr>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Answer Is </span>
                                    </div>
                                    <select class="form-control" name="thisAnswerInput" id="thisAnswerIs" required <?php echo $actionOnINputNow; ?>>
                                        <option value="">-- Answer Is --</option>
                                        <option value="A" <?php if(isset($qtn_ans)) { if($qtn_ans == 'A') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>A</option>
                                        <option value="B" <?php if(isset($qtn_ans)) { if($qtn_ans == 'B') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>B</option>
                                        <option value="C" <?php if(isset($qtn_ans)) { if($qtn_ans == 'C') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>C</option>
                                        <option value="D" <?php if(isset($qtn_ans)) { if($qtn_ans == 'D') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>D</option>
                                    </select>
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">Question Status</span>
                                    </div>
                                    <select class="form-control" id="quizStatusInput" name="quizStatusInput" required <?php echo $actionOnINputNow; ?>>
                                    <option value="">-- Select Status --</option>
                                    <option value="0" <?php if(isset($status)) { if($status == '0') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>Active (Public)</option>
                                    <option value="1" <?php if(isset($status)) { if($status == '1') { echo 'selected'; } else { echo ''; } } else { echo ''; } ?>>InActive (Private)</option>
                                    </select>
                                </div>
                                <div class="row mt-auto text-center">
                                    <div class="col-lg-6 col-md-6 mt-auto text-center">
                                        <?php echo $takeActionButtonNow; ?>
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
               
