<?php

$course_id_url = mysqli_real_escape_string($conn,$course_id);

if(empty($course_id_url) && $course_id_url)
{
    header('location:./courses');
}
else
{

            //getfaqs related course
            $getfaqsrelated = mysqli_query($conn,"SELECT * FROM course_faqs WHERE course_id='$course_id_url' AND isDeleted='0'");
            $getCountOfCoursesInDB = mysqli_num_rows($getfaqsrelated);

            if($getCountOfCoursesInDB == 0)
            {
                $faqsShowForThis = "<b>No FAQ's....<br><br></b>";
            }
            else
            {
                $headerChange = 1;
                while($row = mysqli_fetch_array($getfaqsrelated))
                {
                    $faq_id = $row['faq_id'];
                    $faq_q = $row['faq_q'];
                    $faq_a = $row['faq_a'];
                    $status = $row['status'];
                    $date = $row['date'];
                    $isDeleted = $row['isDeleted'];
                    $last_updated = $row['last_updated'];

                    $passThisHeaderPlus = $headerChange++;

                    echo '
                    <div class="card">
                        <div class="card-header" id="heading'.$passThisHeaderPlus.'">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-link-ct" type="button"
                                    data-toggle="collapse" data-target="#Attack'.$faq_id.'"
                                    aria-expanded="true" aria-controls="Attack'.$faq_id.'">
                                    '.$faq_q.'
                                </button>
                            </h2>
                        </div>

                        <div id="Attack'.$faq_id.'" class="collapse" aria-labelledby="heading'.$passThisHeaderPlus.'"
                            data-parent="#accordionExample">
                            <div class="card-body">
                                '.$faq_a.'
                            </div>
                        </div>
                    </div>
                    ';
                }

            }

        
    
}
?>