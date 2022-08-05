<?php include('../config.php'); ?>
<?php include('functions/verify-session.php'); ?>
<?php

if(isset($_GET['ts_id']))
{
    $ts_id = mysqli_real_escape_string($conn, $_GET['ts_id']);
    $sc_id = mysqli_real_escape_string($conn, $_GET['sc_id']);

    //check tsid in database
    $checkQzIdNow = mysqli_query($conn,"SELECT * FROM test_series_manage WHERE ts_id='$ts_id' AND isDeleted='0'");
    $getCountOncheckQzIdNow = mysqli_num_rows($checkQzIdNow);

    if($getCountOncheckQzIdNow == 0)
    {
        echo '<script>alert("Facing issues, Refreshing...")</script>';
        header('refresh:0;url=./');
    }
    else
    {
        while($row = mysqli_fetch_array($checkQzIdNow))
        {
            $ts_id = $row['ts_id'];
            $course_id = $row['course_id'];
            $ts_name = $row['ts_name'];
            $ts_price = $row['ts_price'];
            $ts_type = $row['ts_type'];
            $ts_desc = $row['ts_desc'];
            $pass_mark = $row['pass_mark'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];

            //check course details in db
            $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id'");
            while($row = mysqli_fetch_array($checkCourseDetailsInDB))
            {
                $course_id = $row['course_id'];
                $course_name = $row['course_name'];
            }
        }
    }


    //check scid in database
    $checkQzIdNow_sc = mysqli_query($conn,"SELECT * FROM test_series_schedule WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0'");
    $getCountOncheckQzIdNow_sc = mysqli_num_rows($checkQzIdNow_sc);

    if($getCountOncheckQzIdNow_sc == 0)
    {
        echo '<script>alert("Facing issues, Refreshing...")</script>';
        header('refresh:0;url=./');
    }
    else
    {
        while($row = mysqli_fetch_array($checkQzIdNow_sc))
        {
            $sc_id = $row['sc_id'];
            $ts_id = $row['ts_id'];
            $sc_test_name = $row['sc_test_name'];
            $sc_test_type = $row['sc_test_type'];
            $sc_test_date = $row['sc_test_date'];
            $sc_pass_mark = $row['sc_pass_mark'];
            $status = $row['status'];
            $isDeleted = $row['isDeleted'];
            $last_updated = $row['last_updated'];
        }
    }
}
else
{
    echo '<script>alert("Facing issues, Refreshing...")</script>';
    header('refresh:0;url=./'); 
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
        <title>Test Series  Questions List | <?php echo $ProjectName; ?></title>
        <?php include('header.php'); ?>
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">Questions List ( <?php echo $ts_name; ?> )</h5>
                        <?php include('functions/test-series-questions-actions.php'); ?>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-list">Test Series List</a></li>
                            <li class="breadcrumb-item active"><a href="test-series-schedule?ts_id=<?php echo $ts_id; ?>">Schedule : <b><?php echo $ts_name; ?></b></a></li>
                            <li class="breadcrumb-item active"><b><?php echo $sc_test_name; ?> : <?php echo date('d-m-Y',strtotime($sc_test_date)); ?></b> </li>
                            <li class="breadcrumb-item active"><a href="test-series-question-action?qtn_id=<?php echo rand(10000,99999); ?>&ts_id=<?php echo $ts_id; ?>&sc_id=<?php echo $sc_id; ?>&qz_type=<?php echo $ts_type; ?>&action=add"><b>Add New Question</b></a></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="text-center mb-3">
                                            <?php
                                                
                                                //getQuizThingsFromLIst DB
                                                $getQuizThingsFromHereNow = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0' ORDER BY qtn_no ASC");
                                                $getCntOnThisThingsNowNow = mysqli_num_rows($getQuizThingsFromHereNow);

                                            ?>
                                            <b>Total Questions : <u><g style="font-size:18px"><?php echo $getCntOnThisThingsNowNow; ?></g></u></b>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="text-center mb-3">
                                            <b>Pass Marks : <u><g style="font-size:18px"><?php echo $sc_pass_mark; ?></g></u>&nbsp;&nbsp; - &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#editModalForQuiz"><i class="fa fa-edit"></i></a></b>
                                        </div>
                                    </div>
                                </div>
                                
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="StudentsList" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>QuestionId</th>
                                            <th>QuestionIs</th>
                                            <th>AnswerIs</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            //getQuizThingsFromLIst DB
                                            $getQuizThingsFromHere = mysqli_query($conn,"SELECT * FROM test_series_qtns WHERE ts_id='$ts_id' AND sc_id='$sc_id' AND isDeleted='0' ORDER BY qtn_no ASC");
                                            $getCntOnThisThingsNow = mysqli_num_rows($getQuizThingsFromHere);

                                            if($getCntOnThisThingsNow == 0)
                                            {
                                                echo '
                                                <div class="alert alert-warning text-center">
                                                    No Questions Found!
                                                </div>
                                                ';
                                            }
                                            else
                                            {
                                                $sl = 1;
                                                while($row = mysqli_fetch_array($getQuizThingsFromHere))
                                                {
                                                    $ts_id = $row['ts_id'];
                                                    $ts_type = $row['ts_type'];
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
                                                    <td>'.$qtn_id.'</td>
                                                    <td>'.$qtn.'</td>
                                                    <td>'.$qtn_ans.'</td>
                                                    <td>'.$showThisStatus.'</td>
                                                    <td><a href="test-series-question-action?qtn_id='.$qtn_id.'&ts_id='.$ts_id.'&sc_id='.$sc_id.'&ts_type='.$ts_type.'&action=edit"  id="E'.$qtn_id.'" data-action-id="'.$qtn_id.'"><i class="fa fa-edit"></i></a> <a href="test-series-question-action?qtn_id='.$qtn_id.'&ts_id='.$ts_id.'&sc_id='.$sc_id.'&ts_type='.$ts_type.'&action=delete" id="D'.$qtn_id.'" data-action-id="'.$qtn_id.'"><i class="pl-3 fa fa-trash"></i></a></td>
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
                            <h5 class="modal-title" id="editModalForQuiz">Edit Pass Mark</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" onclick="closeModal('editModalForQuiz');">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                        <input type="hidden" name="inputOfQtnId" id="inputOfQtnId" value="<?php echo $ts_id; ?>">
                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="passMarkNumberNow">Pass Marks</span>
                                        </div>
                                        <input type="number" class="form-control" id="passMarkNumberNow" name="passMarkNumberNow" min="1" max="<?php echo $getCntOnThisThingsNowNow; ?>" placeholder="Pass Marks ( 1 - <?php echo $getCntOnThisThingsNowNow; ?> )">
                                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal('editModalForQuiz');" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatePassmarknowOnThisAction" class="btn btn-primary">Update Pass Marks</button>
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
               
               
