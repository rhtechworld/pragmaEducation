<?php


    $urlCourseTabId = mysqli_real_escape_string($conn, $_GET['ct']);

    $gettingCourseTab = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$urlCourseTabId' AND isDeleted='0' AND status='0'");
    $checkCOuntOnTabs = mysqli_num_rows($gettingCourseTab);

    if($checkCOuntOnTabs == 0)
    {
        echo '<script>alert("Somthing went wrong! Try again!")</script>';
        header('location:all-courses');
    }
    else
    {
        //getcoursesby course id
        $getCoursesByListId = mysqli_query($conn,"SELECT * FROM courses WHERE course_tab_id='$urlCourseTabId' AND isDeleted='0' AND status='0'");
        $getCOuntOfCourses = mysqli_num_rows($getCoursesByListId);

        if($getCOuntOfCourses == 0)
                {
                    echo '<div class="alert alert-warning text-center">
                            No Courses Found On CheckList!
                            </div>';
                }
                else
                {
                    while($row = mysqli_fetch_array($getCoursesByListId))
                    {
                        $course_tab_id = $row['course_tab_id'];
                        $course_id = $row['course_id'];
                        $course_name = $row['course_name'];
                        $status = $row['status'];
                        $isDeleted = $row['isDeleted'];
                        $date = $row['date'];
                        $last_updated = $row['last_updated'];


                        //get Courese tab on courese
                        $getCOureseTabOnCourse = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id'");
                        while($row = mysqli_fetch_array($getCOureseTabOnCourse))
                        {
                            $dbCoureseTabName = $row['course_tab_name'];
                        }

                        //course details
                        $checkCourseDetailsInDB = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id'");
                        while($row = mysqli_fetch_array($checkCourseDetailsInDB))
                        {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                            $course_desc = $row['course_desc'];
                            $course_price = $row['course_price'];
                            $view_schedule_link = $row['view_schedule_link'];
                            $date = $row['date'];
                            $last_updated = $row['last_updated'];
                            $status = $row['status'];
                            $isDeleted = $row['isDeleted'];
                        }


                        //check enrolled or not
                        $checkCourseEnrolledment = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_id='$student_id_session' AND course_id='$course_id' AND isDeleted='0' AND status='0'");
                        $getCountOnAssignedMent = mysqli_num_rows($checkCourseEnrolledment);

                        if($getCountOnAssignedMent == 0)
                        {
                            $giveAccessToEnrollCourse = '<a href="enroll-course?cid='.$course_id.'" class="btn btn-primary btn-sm">Enroll Now</a>';
                        }
                        else
                        {
                            while($row = mysqli_fetch_array($checkCourseEnrolledment))
                            {
                                $assign_id = $row['assign_id'];
                            }

                            $giveAccessToEnrollCourse = '
                            <a class="btn btn-success btn-sm" name="actionAccessCourse" href="course-dashboard?course_id='.$course_id.'&assign_id='.$assign_id.'&verifyenrolled=true&accessCourse=true">Access Course</a>
                            ';
                        }

                        echo '
                            <div class="mb-2 col-md-4 col-lg-4 p-2 text-center">
                                <div class="card p-2 shadow" style="border:1px solid black">
                                    <b class="mt-2 mb-2" style="font-size:19px">'.$course_name.'</b>
                                    <hr style="margin:0">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 text-center mt-2 mb-1 my-auto">
                                        <b>₹ '.number_format($course_price,2).'</b>
                                        </div>
                                        <div class="col-md-6 col-lg-6 text-center mt-2 mb-1">
                                            '.$giveAccessToEnrollCourse.'
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                    
        
                    }
                }

    }


?>