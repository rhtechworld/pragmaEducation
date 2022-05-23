<!-- CourseTabDetailsModal -->
<div class="modal fade" id="courseTabModal" tabindex="-1" role="dialog" aria-labelledby="courseTabModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Pragma Edu.</h3>
                    <p>
                        Madhapur <br>
                        Hyderabad, 500081<br>
                        India <br><br>
                        <strong>Phone:</strong> +91 1234567891<br>
                        <strong>Email:</strong> test@test.com<br>
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Courses</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Why choose us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Top Courses</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Course 1</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Course 2</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Course 3</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Course 4</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Course 5</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex py-4">

        <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
                &copy; Copyright <strong><span>Pragma Edu.</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">Ganesh</a>
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