<!-- CourseTabDetailsModal -->
<div class="modal fade" id="aboutSoftware" tabindex="-1" role="dialog" aria-labelledby="aboutSoftware"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutSoftware"><i class="bi bi-info-circle"></i> About</h5>
            </div>
            <div class="modal-body">
            Version : <b>1.0.0</b> ( Initial Release )
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ======= Footer ======= -->
<footer id="footer" class="border-top border-bottom">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                <img src="<?php echo $baseURL; ?>assets/new-img/Pragma-Education-Web.png" width="170" height="60">
                    <p class="mt-2">
                        Madhapur <br>
                        Hyderabad, 500081<br>
                        India <br><br>
                        <strong>Phone:</strong> <a class="basecolor" href="tel:<?php echo $mainContactNumberOnLink; ?>"><?php echo $mainContactNumberOne; ?></a><br>
                        <strong>Email:</strong> <a class="basecolor" href="mailto:<?php echo $mainContactEmail; ?>"><?php echo $mainContactEmail; ?></a><br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>courses">Courses</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>why-us">Why choose us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>contact">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Top Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>toppers">Toppers</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>videos">Videos</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>downloads">Downloads</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>current-affairs">Current Affairs</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="<?php echo $baseURL; ?>faculties">Faculties</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Get Free Current Affairs Updates <b class="basecolor">Pragma</b></h4>
                    <p>Please Enter Your Email ID and Hit the Subscribe Button Below to Join others to Receive Free Updates</p>
                    <form action="" method="post">
                        <input type="email" placeholder="Enter Email Address" name="email"><input type="submit" value="Subscribe">
                    </form>
                    <hr>
                    OR, you can contact us at <a class="basecolor" href="mailto:<?php echo $mainContactEmail; ?>"><?php echo $mainContactEmail; ?></a>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Pragma Education</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <a href="#" data-toggle="modal" data-target="#aboutSoftware"><i class="bi bi-info-circle"></i> About</a> | Designed & Developed by <a href="https://ganeshbondla.in/" target="_blank">Ganesh Bondla</a>
            </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo $baseURL; ?>assets/vendor/purecounter/purecounter.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/aos/aos.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?php echo $baseURL; ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo $baseURL; ?>assets/js/main.js"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo $baseURL; ?>assets/js/custom.js"></script>

</body>

</html>
<?php ob_flush(); ?>