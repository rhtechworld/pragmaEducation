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

                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Recent Announcements</h4>
                    <?php include('../functions/main-functions/getHomeAnnouncements.php'); ?>
                </div>

                <div class="col-lg-4 col-md-4 footer-links">
                    <h4>Recent Current Affairs</h4>
                    <?php include('functions/getAllCurrentAffiresinFooter.php'); ?>
                </div>

                <div class="col-lg-4 col-md-4 footer-newsletter">
                    <h4>Get Free Current Affairs Updates <b class="basecolor">Pragma</b></h4>
                    <p>Please Enter Your Email ID and Hit the Subscribe Button Below to Join others to Receive Free Updates</p>
                    <form>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="subscribeNowAction" placeholder="Enter Email Address" name="email" required><input type="button" class="btn" style="color:#E31E26;text-weight:bold" name="subscribeNow" onclick="callSubscribeNow()" value="Subscribe">   
                    </form><g class="text-center"><small class="text-center" id="subscribeInt"></small></g>
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


        <script>
    function callSubscribeNow()
    {
        var subEmail = document.getElementById('subscribeNowAction').value;

        if(subEmail == '' || subEmail == null)
        {
            document.getElementById('subscribeInt').innerHTML = "<center><b style='color:red'>Email is Required!</b></center>";
        }
        else
        {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var resultOnCheck = this.responseText;
                        if(resultOnCheck == 0)
                        {
                            console.log('Email Error');
                            document.getElementById('subscribeInt').innerHTML = "<center><b style='color:red'>Server issue, try again later!</b></center>";
                        }
                        else if(resultOnCheck == 1)
                        {
                            console.log('Subscribe Success');
                            document.getElementById('subscribeInt').innerHTML = "<center><b style='color:green'>Subscribe Success, Thanks</b></center>";
                        }
                        else
                        {
                            document.getElementById('subscribeInt').innerHTML = "<center><b style='color:green'>Already Subscribed, Thanks</b></center>";
                        }
                }
            };
            xmlhttp.open("GET", '../functions/subscribe-mail.php?email='+subEmail, true);
            xmlhttp.send();
        }
    }
</script>

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

        <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
        
        <script>
            var currentSession = '<?php echo $_SESSION['session_key']; ?>';
            function makeAcheckOnLoginNow()
            {
                $.ajax({
                    url : 'functions/login-session-verify.php',
                    type : 'POST',
                    data : {
                        'currentSession' : currentSession
                    },
                    dataType:'json',
                    success : function(data) {              
                        var resultOnCheck = data;
                        if(resultOnCheck == 0)
                        {
                            console.log('single login valid.');
                            // alert('single login valid');
                        }
                        else
                        {
                            //redirect to logout
                            console.log('Single login NOT valid.');
                           // alert('single login NOT valid');
                            window.location.href = "../login?singleLogin=false";
                        }
                    },
                    error : function(request,error)
                    {
                        //redirect to logout
                        console.log('Bad Request, Single login NOT valid.'+error);
                        window.location.href = "../login?singleLogin=false";
                       // alert('Bad Request, Single login NOT valid');
                    }
                });
            }

            // setInterval(makeAcheckOnLoginNow, 600000);
             setInterval(makeAcheckOnLoginNow, 50000);
            
        </script>

        <script src="js/custom.js"></script>

        <script>
            document.onkeydown = function(e) {
            if(event.keyCode == 123) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                return false;
            }
            if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                return false;
            }
            }
        </script>

        <script>

            $(document).ready(function() {
            //Preloader
            preloaderFadeOutTime = 800;
            function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
            }
            hidePreloader();
            });

        </script>

        <script src="js/custom.js"></script>

        <script>
            CKEDITOR.replace( 'editor', {
                removeButtons: 'Source,About',
            } );
        </script>
        <script>
            var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
            var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

            function inWords (num) {
                if ((num = num.toString()).length > 9) return 'overflow';
                n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                if (!n) return; var str = '';
                str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
                str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
                str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
                str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
                str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
                return str;
            }

            document.getElementById('course-price').onkeyup = function () {
                document.getElementById('course-price-words').innerHTML = inWords(document.getElementById('course-price').value);
            };
        </script>

</body>

</html>
<?php ob_flush(); ?>