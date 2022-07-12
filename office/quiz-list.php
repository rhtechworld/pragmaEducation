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
        <title>Quiz List | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Quiz List</h3>
                        <?php include('functions/all-quiz-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active">Quiz List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="StudentsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>LastUpdated</th>
                                            <th>QuizId</th>
                                            <th>QuizName</th>
                                            <th>QuizType</th>
                                            <th>ViewQuestions</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            //getQuizThingsFromLIst DB
                                            $getQuizThingsFromHere = mysqli_query($conn,"SELECT * FROM quiz_controls WHERE qz_type='guest' AND isDeleted='0' ORDER BY id DESC");
                                            $getCntOnThisThingsNow = mysqli_num_rows($getQuizThingsFromHere);

                                            if($getCntOnThisThingsNow == 0)
                                            {
                                                echo '
                                                <div class="alert alert-warning text-center">
                                                    No Quiz Found!
                                                </div>
                                                ';
                                            }
                                            else
                                            {
                                                $sl = 1;
                                                while($row = mysqli_fetch_array($getQuizThingsFromHere))
                                                {
                                                    $qz_name = $row['qz_name'];
                                                    $qz_type = $row['qz_type'];
                                                    $qz_id = $row['qz_id'];
                                                    $pass_mark = $row['pass_mark'];
                                                    $status = $row['status'];
                                                    $isDeleted = $row['isDeleted'];
                                                    $last_updated = $row['last_updated'];


                                                    //check count on questions from db 
                                                    $makeACheckOnQuestionNow = mysqli_query($conn,"SELECT * FROM quiz_manage WHERE qz_id='$qz_id' AND isDeleted='0'");
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

                                                    //status show
                                                    if($status == 0)
                                                    {
                                                        $showThisStatus = '<span class="badge badge-success">Active</span>';
                                                    }
                                                    else
                                                    {
                                                        $showThisStatus = '<span class="badge badge-danger">InActive</span>';
                                                    }

                                                    echo '
                                                    <tr>
                                                    <td>'.$sl++.'</td>
                                                    <td>'.$last_updated.'</td>
                                                    <td>'.$qz_id.'</td>
                                                    <td>'.$qz_name.'</td>
                                                    <td>'.$qz_type.'</td>
                                                    <td><a href="view-all-quiz-questions?qzid='.$qz_id.'">View All Questions ( '.$qutionAddedQount.' )</a></td>
                                                    <td>'.$showThisStatus.'</td>
                                                    <td><a href="#" class="quiz-js-edit" id="E'.$qz_id.'" data-action-id="'.$qz_id.'"><i class="fa fa-edit"></i></a> <a href="#" class="quiz-js-delete" id="D'.$qz_id.'" data-action-id="'.$qz_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
                                                    </tr>';
                                                }
                                            }

                                        ?>
                                    </tbody> 
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Modal Edit Quiz -->
 <div class="modal fade" id="editModalForQuiz" tabindex="-1" role="dialog" aria-labelledby="editModalForQuiz" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalForQuiz">Edit Status <b id="quizNameKaId"></b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="closeModal('editModalForQuiz');">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                        <input type="hidden" name="quizKaId" id="quizKaId">
                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">Quiz Status</span>
                                        </div>
                                        <select class="form-control" id="quizKastatus" name="quizKastatus" required>
                                        <option value="">-- Select Status --</option>
                                        <option value="0">Active (Public)</option>
                                        <option value="1">InActive (Private)</option>
                                        </select>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal('editModalForQuiz');" data-dismiss="modal">Close</button>
                            <button type="submit" name="makeChangesOnQuizControl" class="btn btn-primary">Save changes</button>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModalForQuiz" tabindex="-1" role="dialog" aria-labelledby="deleteModalForQuiz" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalForQuiz">Delete Quiz <b id="delete_quizNameKaId"></b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="closeModal('deleteModalForQuiz');">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                            <input type="hidden" name="delete_quizKaId" id="delete_quizKaId">
                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">Quiz Status</span>
                                        </div>
                                        <select class="form-control" id="delete_quizKastatus" name="delete_quizKastatus" required readonly>
                                        <option value="">-- Select Status --</option>
                                        <option value="0">Active (Public)</option>
                                        <option value="1">InActive (Private)</option>
                                        </select>
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal('deleteModalForQuiz');" data-dismiss="modal">Close</button>
                            <button type="submit" name="deleteTheQuizControl" class="btn btn-danger">Delete Quiz</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
               <?php include('footer.php'); ?>
               <script>
                function closeModal(modalId) {
                    $("#"+modalId).modal("hide"); 
                }
                </script>
               
               
