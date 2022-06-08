<?php


                            //check courses enrolled
                            $checkCourseEnrolledIndb = mysqli_query($conn,"SELECT * FROM course_assigned WHERE student_email='$student_email_session' AND student_id='$student_id_session' AND isDeleted='0'");
                            $checkCourseEnrolledIndbCount = mysqli_num_rows($checkCourseEnrolledIndb);

                            if($checkCourseEnrolledIndbCount == 0)
                            {
                                //do nothing
                            }
                            else
                            {
                                echo '<div class="sb-sidenav-menu-heading">Enrolled Courses</div>';
                                while($row = mysqli_fetch_array($checkCourseEnrolledIndb))
                                {
                                    $assign_id_forMenu = $row['assign_id'];
                                    $student_id_forMenu = $row['student_id'];
                                    $student_email_forMenu = $row['student_email'];
                                    $course_tab_id_forMenu = $row['course_tab_id'];
                                    $course_id_forMenu = $row['course_id'];
                                    $video_id_forMenu = $row['video_id'];
                                    $date_forMenu = $row['date'];
                                    $status_forMenu = $row['status'];
                                    $isDeleted_forMenu = $row['isDeleted'];
                                    $last_updated_forMenu = $row['last_updated'];

                                    //getCourseDetailsHere
                                    $gettingCourseOnGet_forMenu = mysqli_query($conn,"SELECT * FROM courses WHERE course_id='$course_id_forMenu'");
                                    while($row = mysqli_fetch_array($gettingCourseOnGet_forMenu))
                                    {
                            
                                        $course_tab_id_course_OnMenu = $row['course_tab_id'];
                                        $course_id_course_OnMenu = $row['course_id'];
                                        $course_name_course_OnMenu = $row['course_name'];
                                        $status_course_OnMenu = $row['status'];
                                        $isDeleted_course_OnMenu = $row['isDeleted'];
                                        $date_course_OnMenu = $row['date'];
                                        $last_updated_course_OnMenu = $row['last_updated'];
                            
                                        //get Courese tab on courese
                                        $getCOureseTabOnCourse_courseTab_OnMenu = mysqli_query($conn,"SELECT * FROM course_tabs WHERE course_tab_id='$course_tab_id_course_OnMenu'");
                                        while($row = mysqli_fetch_array($getCOureseTabOnCourse_courseTab_OnMenu))
                                        {
                                            $course_tab_id_courseTab_OnMenu = $row['course_tab_id'];
                                            $course_tab_name_courseTab_OnMenu = $row['course_tab_name'];
                                            $status_courseTab_OnMenu = $row['status'];
                                            $isDeleted_courseTab_OnMenu = $row['isDeleted'];
                                            $date_courseTab_OnMenu = $row['date'];
                                            $last_updated_courseTab_OnMenu = $row['last_updated'];
                                        }
                            
                                        //course details
                                        $checkCourseDetailsInDB_courseDetails_OnMenu = mysqli_query($conn,"SELECT * FROM course_details WHERE course_id='$course_id_forMenu'");
                                        while($row = mysqli_fetch_array($checkCourseDetailsInDB_courseDetails_OnMenu))
                                        {
                                            $course_id_courseDetails_OnMenu = $row['course_id'];
                                            $course_name_courseDetails_OnMenu = $row['course_name'];
                                            $course_desc_courseDetails_OnMenu = $row['course_desc'];
                                            $course_price_courseDetails_OnMenu = $row['course_price'];
                                            $view_schedule_link_courseDetails_OnMenu = $row['view_schedule_link'];
                                            $date_courseDetails_OnMenu = $row['date'];
                                            $last_updated_courseDetails_OnMenu = $row['last_updated'];
                                            $status_courseDetails_OnMenu = $row['status'];
                                            $isDeleted_courseDetails_OnMenu = $row['isDeleted'];
                                        }
                                    }


                                    echo '
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#sidenavAccordionCourse'.$course_id_course_OnMenu.'" aria-expanded="false" aria-controls="sidenavAccordionCourse'.$course_id_course_OnMenu.'">
                                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                            '.$course_name_courseDetails_OnMenu.'
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="sidenavAccordionCourse'.$course_id_course_OnMenu.'" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionCourse'.$course_id_course_OnMenu.'">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="course-dashboard?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-dashboard pr-2"></i> Dashboard</a>
                                            <a class="nav-link" href="course-prelims?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-star pr-2"></i> Prelims</a>
                                            <a class="nav-link" href="course-mains?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-star pr-2"></i> Mains</a>
                                            <a class="nav-link" href="course-updates?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-bell pr-2"></i> Updates</a>
                                            <a class="nav-link" href="course-payment?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-credit-card pr-2"></i> Payment History</a>
                                            <a class="nav-link" href="course-faqs?course_id='.$course_id_courseDetails_OnMenu.'&assign_id='.$assign_id_forMenu.'&verifyenrolled=true&accessCourse=true"><i style="font-size:12px;" class="fas fa-question pr-2"></i> FAQs</a>
                                        </nav>
                                    </div>
                                    
                                    ';
                                }
                            }

                            ?>