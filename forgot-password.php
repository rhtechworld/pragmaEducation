<?php include('config.php'); ?>
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
  
<div class="container fp mt-5" data-aos="fade-up">
<div class="login-form d-block mx-auto">    
    <form action="/examples/actions/confirmation.php" method="post">
		<div class="avatar"><i class="bx bxs-lock-alt"></i></div>
    	<h4 class="modal-title">Reset Password</h4>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter Your Email" required="required">
        </div>
        
        
        <input type="submit" class="btn  btn-block btn-lg d-block mx-auto" value="Send password">              
    </form>			
   
</div>
 
 
 


</main>
  

<?php include('footer.php'); ?>