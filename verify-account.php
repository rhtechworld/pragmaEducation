<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Verify Account | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
</head>
<main id="main">

    <div class="container mt-5" data-aos="fade-up">
        <div class="d-block mx-auto">
            <div class="row mb-5" style="margin-top:85px;">
                <div class="col-md-6 col-lg-6 my-auto border rounded p-4 shadow">
                    <div class="section-head col-sm-12 mb-0 text-center">
                        <h4 style="font-size:20px;"><span>Verify</span> Account</h4>
                    </div>
                    <?php include('functions/student-functions/verify-account.php'); ?>
                    <form action="" method="POST">
                    <div class="form-group mb-3">
                            <input type="text" class="form-control" id="otphere" name="otphere"
                                 placeholder="Enter 6 digit OTP" required>
                        </div>
                        
                        <button type="submit" id="proceedRegisterButton" name="proceedVerification" class="btn btn-block btn-primary w-100 newButtonEffect">Verify Me</button>
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 text-center mt-1 mb-1">
                            <small>Facing issue with mobile OTP? <a href="<?php echo $baseURL; ?>login" class="basecolor">Try Email Verification</a></small>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 my-auto">
                    <img src="<?php echo $baseURL; ?>assets/new-img/two-factor.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

</main>


<?php include('footer.php'); ?>