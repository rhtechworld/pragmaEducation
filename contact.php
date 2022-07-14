<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    
    <!-- Primary Meta Tags -->
    <title>Contact Us | <?php echo $ProjectName; ?></title>
    <meta name="title" content="Contact Us | <?php echo $ProjectName; ?>">
    <meta name="description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $actual_link; ?>">
    <meta property="og:title" content="Contact Us | <?php echo $ProjectName; ?>">
    <meta property="og:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="og:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $actual_link; ?>">
    <meta property="twitter:title" content="Contact Us | <?php echo $ProjectName; ?>">
    <meta property="twitter:description" content="Pragma Education aims at providing an affordable, accessible and accomplishment-oriented modules to the aspirants of various competitive examinations.">
    <meta property="twitter:image" content="<?php echo $baseURL; ?>assets/new-img/metImg.jpg">

    <link rel="canonical" href="<?php echo $actual_link; ?>" />

    <?php include('header.php'); ?>

    <main id="main">

        <div class="section-head col-sm-12 mb-0" style="margin-top:85px;">
            <h4 style="font-size:20px"><span>Contact</span> Us</h4>
        </div>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="row mt-2">

                    <div class="col-lg-8 mt-lg-0">

                        <form id="contactPragma">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                    placeholder="Mobile Number" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="alert alert-warning loading">Loading...</div>
                                <div class="alert alert-danger alert-sm error-message">Facing issue! Try after sometime</div>
                                <div class="alert alert-success alert-sm sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="button" onclick="submitFormPragma()" class="btn btn-primary newButtonEffect">Send Message</button></div>
                        </form>

                    </div>
                    <div class="col-lg-4 mt-3">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p><?php echo $mainContactLocation; ?></p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?php echo $mainContactEmail; ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p><?php echo $mainContactNumberOne; ?></p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
            
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <?php include('footer.php'); ?>

    <script src=
        "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>

    <script>

            $('.loading').hide();
            $('.sent-message').hide();
            $('.error-message').hide();

        function submitFormPragma()
        {

                var name = $('#name').val();
                var email = $('#email').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                var mobile = $('#mobile').val();

                var submit = true;
                console.log(submit);

                if(name == '' || name == null || name == undefined)
                {
                    alert('Name is Required!');
                    $('.error-message').text('Name is Required!');
                    $('.error-message').show();
                    submit = false;
                    console.log('Name is Required!');
                    console.log(submit);
                }
                else if(email == '' || email == null || email == undefined)
                {
                    alert('Email is Required!');
                    $('.error-message').text('Email is Required!');
                    $('.error-message').show();
                    submit = false;
                    console.log('Email is Required!');
                    console.log(submit);
                }
                else if(subject == '' || subject == null || subject == undefined)
                {
                    alert('Subject is Required!');
                    $('.error-message').text('Subject is Required!');
                    $('.error-message').show();
                    submit = false;
                    console.log('Subject is Required!');
                    console.log(submit);
                }
                else if(message == '' || message == null || message == undefined)
                {
                    alert('Message is Required!');
                    $('.error-message').text('Message is Required!');
                    $('.error-message').show();
                    submit = false;
                    console.log('Message is Required!');
                    console.log(submit);
                }
                else if(mobile == '' || mobile == null || mobile == undefined)
                {
                    alert('Mobile Number is Required!');
                    $('.error-message').text('Mobile Number is Required!');
                    $('.error-message').show();
                    submit = false;
                    console.log('Mobile Number is Required!');
                    console.log(submit);
                }
                else
                {
                    $('.error-message').hide();
                    submit = true;
                    console.log('Submitting...');
                    console.log(submit);
                }
                //$('.loading').show();

                if(submit)
                {

                    $.ajax({
                    url: 'forms/contact.php',
                    type: 'POST',
                    data: {name: name, email:email, subject:subject, message:message, mobile:mobile},
                    success: function(response){
                        if(response == '1')
                        {
                            $('.loading').hide();
                            $('.sent-message').text('Your message has been sent. Thank you!');
                            $('.sent-message').show();
                            $('.error-message').hide();
                            console.log('Your message has been sent. Thank you!');

                            $('#name').val('');
                            $('#email').val('');
                            $('#subject').val('');
                            $('#message').val('');
                            $('#mobile').val('');
                        }
                        else
                        {
                            $('.sent-message').hide();
                            $('.loading').hide();
                            $('.error-message').text('Facing issue! Try after sometime!');
                            $('.error-message').show();
                            console.log('Facing issue! Try after sometime!');
                        }
                    }
                    
                    });

                }

        }

    </script>