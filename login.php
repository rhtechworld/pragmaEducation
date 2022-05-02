
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
  
<div class="container login mt-5" data-aos="fade-up">
<div class="login-form d-block mx-auto">    
    <form action="/examples/actions/confirmation.php" method="post">
		<div class="avatar"><i class="bx bxs-user-circle"></i></div>
    	<h4 class="modal-title">Login to Your Account</h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="<?php echo $baseURL; ?>forgot-password" class="forgot-link">Forgot Password?</a>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg d-block mx-auto" value="Login">              
    </form>			
    <div class="text-center small">Don't have an account? <a href="<?php echo $baseURL; ?>register">Sign up</a></div>
</div>
 
 
 


</main>
  

<?php include('footer.php'); ?>