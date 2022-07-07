<?php

                //get Subjects as per the papers
                $getSubjectsOnFAQs = mysqli_query($conn,"SELECT * FROM course_faqs WHERE course_id='$course_id_CourseDashboard' AND isDeleted='0' AND status='0' ORDER BY id DESC");
                $getCountSubjectsOnFAQs = mysqli_num_rows($getSubjectsOnFAQs);

                if($getCountSubjectsOnFAQs == 0)
                {
                    echo '
                        <div class="alert alert-warning " role="alert">
                            <b>No FAQs Found On This Course!</b>
                        </div>
                        ';
                }
                else
                {
                    while($row = mysqli_fetch_array($getSubjectsOnFAQs))
                    {
                        $faq_id_onFaqs = $row['faq_id'];
                        $faq_q_onFaqs = $row['faq_q'];
                        $faq_a_onFaqs = $row['faq_a'];
                        $status_onFaqs = $row['status'];
                        $date_onFaqs = $row['date'];
                        $isDeleted_onFaqs = $row['isDeleted'];
                        $last_updated_onFaqs = $row['last_updated'];

                        echo '
                        <div class="col-md-12 col-lg-12">
                        <div class="card mb-3 rounded" style="border:1px solid black">
                            <div class="card-header" id="headingOne'.$faq_id_onFaqs.'">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$faq_id_onFaqs.'" aria-expanded="true" aria-controls="collapse'.$faq_id_onFaqs.'">
                                <b>'.$faq_q_onFaqs.'</b>
                                </button>
                            </h2>
                            </div>
                            <div id="collapse'.$faq_id_onFaqs.'" class="collapse" aria-labelledby="headingOne'.$faq_id_onFaqs.'" data-parent="#accordionCoursePrelims">
                            <div class="card-body">
                            '.$faq_a_onFaqs.'
                            </div>
                            </div>
                        </div>
                        </div>
                        ';
                    }
                }
            ?>