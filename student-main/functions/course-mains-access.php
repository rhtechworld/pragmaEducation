<?php

                //get Subjects as per the papers
                $getSubjectsOnMains = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_type='Mains' AND course_id='$course_id_CourseDashboard' AND isDeleted='0' AND status='0' GROUP BY subject_paper");
                $getCountSubjectsOnMains = mysqli_num_rows($getSubjectsOnMains);

                if($getCountSubjectsOnMains == 0)
                {
                    //no subjects
                }
                else
                {
                    while($row = mysqli_fetch_array($getSubjectsOnMains))
                    {
                        $subject_id = $row['subject_id'];
                        $course_id = $row['course_id'];
                        $subject_type = $row['subject_type'];
                        $subject_paper = $row['subject_paper'];
                        $subject_name = $row['subject_name'];
                        $subject_desc = $row['subject_desc'];
                        $date = $row['date'];
                        $status = $row['status'];
                        $isDeleted = $row['isDeleted'];
                        $last_updated = $row['last_updated'];

                        echo '
                        <div class="col-md-6 col-lg-6">
                        <div class="card mb-3 rounded" style="border:1px solid black">
                            <div class="card-header" id="headingOne'.$subject_paper.'">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$subject_paper.'" aria-expanded="true" aria-controls="collapse'.$subject_paper.'">
                                <b>Paper - '.$subject_paper.'</b> : '.$subject_type.' -> Subjects ( '.$course_name_CourseDashboard.' )
                                </button>
                            </h2>
                            </div>
                            <div id="collapse'.$subject_paper.'" class="collapse" aria-labelledby="headingOne'.$subject_paper.'" data-parent="#accordionCoursePrelims">
                            <div class="card-body">
                            ';

                        //getsubjects as per the paper
                        $getSubjectsAsPerPapers = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_type='Mains' AND course_id='$course_id_CourseDashboard' AND subject_paper='$subject_paper' AND isDeleted='0'");
                        $checkCountSubjectsAsPerPapers = mysqli_num_rows($getSubjectsAsPerPapers);

                        if($checkCountSubjectsAsPerPapers == 0)
                        {
                            //no subjects on paper
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($getSubjectsAsPerPapers))
                            {
                                echo "<i style='font-size:12px' class='fa fa-arrow-right'></i> <i><a href='subject-topics?course_id=".$course_id."&assign_id=".$assigned_assign_id."&subject_id=".$subject_id."&subject_type=".$subject_type."&subject_paper=".$subject_paper."&subjectVerify=true&verifyenrolled=true&accessCourse=true'>".$row['subject_name']."</a></i><hr>";
                            }
                        }

                            echo'
                            </div>
                            </div>
                        </div>
                        </div>
                        ';
                    }
                }
            ?>