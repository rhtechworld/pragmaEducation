
<?php echo include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include('header.php'); ?>
</head>
<main id="main">
  
<div class="container login" data-aos="fade-up">

<div class="row mt-5">
<div class="col-lg-6">
  <img src="assets/img/login.png" class="img-fluid">
</div>
<div class="col-lg-6 mt-5 mt-lg-0">
<form>

  <div class="form-group mb-4 mt-5">
    <label for="exampleFormControlInput1">Mobile</label>
    <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Enter Mobile Number">
  </div>
  <div class="form-group mb-4">
    <label for="exampleFormControlInput1">Password</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password">
  </div>
  <div class="form-check mb-4">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Remember Me
  </label>
</div>

<div class="mb-4 logintoregister">
   Not Sign In yet ? <a href="<?php echo $baseURL; ?>register"> Click here to sign up</a>
</div>
<div class="text-center"><button type="submit">Login</button></div>
  </form>
</div>
</div>
 
 
 


</main>
  

<?php include('footer.php'); ?>