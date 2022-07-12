<?php

                //get Subjects as per the papers
                $getSubjectsOnUpdates = mysqli_query($conn,"SELECT * FROM course_updates WHERE course_id='$course_id_CourseDashboard' AND status='0' AND isDeleted='0' ORDER BY id DESC");
                $getCountSubjectsOnUpdates = mysqli_num_rows($getSubjectsOnUpdates);

                if($getCountSubjectsOnUpdates == 0)
                {
                    echo '
                        <div class="alert alert-warning " role="alert">
                            <b>No Updates Found On This Course!</b>
                        </div>
                        ';
                }
                else
                {
                    while($row = mysqli_fetch_array($getSubjectsOnUpdates))
                    {
                        $update_id_OnUpdates = $row['update_id'];
                        $course_id_OnUpdates = $row['course_id'];
                        $up_title_OnUpdates = $row['up_title'];
                        $up_desc_OnUpdates = $row['up_desc'];
                        $up_date_OnUpdates = $row['up_date'];
                        $status_OnUpdates = $row['status'];
                        $isDeleted_OnUpdates = $row['isDeleted'];
                        $last_updated_OnUpdates = $row['last_updated'];

                        echo '
                        <div class="col-md-12 col-lg-12">
                        <div class="card mb-3 rounded" style="border:1px solid #E31E26">
                            <div class="card-header" id="headingOne'.$update_id_OnUpdates.'">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$update_id_OnUpdates.'" aria-expanded="true" aria-controls="collapse'.$update_id_OnUpdates.'">
                                ( <g style="font-size:12px">'.$last_updated_OnUpdates.'</g> ) <b>'.$up_title_OnUpdates.'</b> 
                                </button>
                            </h2>
                            </div>
                            <div id="collapse'.$update_id_OnUpdates.'" class="collapse" aria-labelledby="headingOne'.$update_id_OnUpdates.'" data-parent="#accordionCoursePrelims">
                            <div class="card-body">
                            '.$up_desc_OnUpdates.'
                            </div>
                            </div>
                        </div>
                        </div>
                        ';
                    }
                }
            ?>