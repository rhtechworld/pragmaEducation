<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register | <?php echo $ProjectName; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <?php include('header.php'); ?>
</head>
<main id="main">

    <div class="container mt-5" data-aos="fade-up">
        <div class="d-block mx-auto">
            <div class="row mb-5" style="margin-top:85px;">
                <div class="col-md-6 col-lg-6 my-auto">
                    <img src="<?php echo $baseURL; ?>assets/new-img/signup.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 col-lg-6 my-auto border rounded p-4 shadow">
                    <div class="section-head col-sm-12 mb-0 text-center">
                        <h4 style="font-size:20px;"><span>Pragma</span> Register</h4>
                    </div>
                    <?php include('functions/student-functions/register.php'); ?>
                    <form action="" method="POST">
                    <div class="form-group mb-3">
                            <input type="text" class="form-control" id="RegisterName" name="name"
                                 placeholder="Enter Full Name*" required>
                                 <div id="nameError" style="color:red">
                                   <small>Name is Required*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="Registerusername" name="username"
                                 placeholder="Enter Email Address*" required>
                                 <div id="emailError" style="color:red">
                                   <small>Email is Required*</small>
                                 </div>
                                 <div id="emailErrorValid" style="color:red">
                                   <small>Enter a Valid Email Address*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" class="form-control" id="RegisterusernameTwo" name="usernameTwo"
                                 placeholder="Confirm Email Address*" required>
                                 <div id="confirmemailErrorRequired" style="color:red">
                                   <small>Confirm Email required*</small>
                                 </div>
                                 <div id="confirmemailError" style="color:red">
                                   <small>Email mismatched*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="Registernumber" name="number"
                                 placeholder="Enter Mobile Number*" required>
                                 <div id="mobileError" style="color:red">
                                   <small>Mobile Number Required*</small>
                                 </div>
                                 <div id="mobileValidError" style="color:red">
                                   <small>Enter a valid Mobile Number*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" id="RegisternumberTwo" name="numberTwo"
                                 placeholder="Confirm Mobile Number*" required>
                                 <div id="confirmmobileErrorRequired" style="color:red">
                                   <small>Confirm Mobile Number Required*</small>
                                 </div>
                                 <div id="confirmmobileError" style="color:red">
                                   <small>Mobile Number Mismatched*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" id="Registerpassword" name="password"
                                placeholder="Create Password*" required>
                                <div id="passwordError" style="color:red">
                                   <small>Password Required*</small>
                                 </div>
                                 <div id="validpasswordError" style="color:red">
                                   <small>Enter a valid password of min 8 char*</small>
                                 </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" class="form-control" id="RegisterpasswordTwo" name="passwordTwo"
                                placeholder="Confirm Password*" required>
                                <div id="confirmpasswordErrorRequired" style="color:red">
                                   <small>Confirm Password Required*</small>
                                 </div>
                                <div id="confirmpasswordError" style="color:red">
                                   <small>Password Mismatched*</small>
                                 </div>
                        </div>
                        <button type="submit" id="proceedRegisterButton" name="proceedRegsiter" class="btn btn-block btn-primary w-100 newButtonEffect">Register Me</button>
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-lg-12 text-center mt-1 mb-1">
                            <small>Already registered? <a href="<?php echo $baseURL; ?>login" class="basecolor">Login here</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<?php include('footer.php'); ?>