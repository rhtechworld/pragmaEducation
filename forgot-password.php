
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
  
<div class="forgot-pwd d-flex justify-content-center align-items-center container mt-5 ">

<form>
<h3 class="text-center mt-5">Reset password</h3>
<div class="form-group mt-5 mb-3">
					<label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your password.</label>
					<input type="email" class="form-control form-control-sm" placeholder="Enter your email address">
				</div>
                <div class="text-center"><button type="submit">Send password reset email</button></div>
</form>

</div>

</main>
  

<?php include('footer.php'); ?>