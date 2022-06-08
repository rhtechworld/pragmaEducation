<?php

                    //get classesdepnds on subject
                    $getClassesDependsOnSubjectDb = mysqli_query($conn,"SELECT * FROM subject_topics WHERE course_id='$assigned_course_id' AND subject_id='$assigned_course_subject_id' AND isDeleted='0'");
                    $getClassesDependsOnSubjectDbCount = mysqli_num_rows($getClassesDependsOnSubjectDb);

                    if($getClassesDependsOnSubjectDbCount == 0)
                    {
                        echo '
                        <div class="alert alert-warning " role="alert">
                            <b>No Topics Found On This Subject!</b>
                        </div>
                        ';
                    }
                    else
                    {
                        while($row = mysqli_fetch_array($getClassesDependsOnSubjectDb))
                        {
                            echo '
                            <div class="col-md-4 col-lg-4 mb-2 text-center">
                                <div class="mb-2 p-3 border rounded shadow">
                                    <div class="mb-2"><b>'.$row['topic_name'].'</b></div>
                                    <div class="mb-3">Faculty : <b>'.$row['topic_by'].'</b></div>
                                    <a href="take-class?course_id='.$assigned_course_id.'&assign_id='.$assigned_assign_id.'&subject_id='.$subject_id_ForHead.'&subject_type='.$subject_type_ForHead.'&subject_paper='.$subject_paper_ForHead.'&topic_id='.$row['topic_id'].'&tid='.$row['id'].'&subjectVerify=true&verifyenrolled=true&accessCourse=true" class="btn btn-sm btn-primary mr-2">Take Class</a>
                                </div>
                            </div>
                            ';
                        }
                    }

                ?>