<?php include('../config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - Pragma Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    html,
    body {
        height: 100%;
    }

    .global-container {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f5f5f5;
    }

    form {
        padding-top: 10px;
        font-size: 14px;
        margin-top: 30px;
    }

    .card-title {
        font-weight: 300;
    }

    .btn {
        font-size: 14px;
        margin-top: 20px;
    }


    .login-form {
        width: 330px;
        margin: 20px;
    }

    .sign-up {
        text-align: center;
        padding: 20px 0 0;
    }

    .alert {
        margin-bottom: -30px;
        font-size: 13px;
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Log in - Pragma</h3>
                <div class="card-text">
                <?php

                    if(isset($_POST['login']))
                    {
                        $username = mysqli_real_escape_string($conn,$_POST['username']);
                        $password = mysqli_real_escape_string($conn,$_POST['password']);

                        if(!empty($username) && !empty($password))
                        {
                            $firstLayerEncription = md5($password);
                            $secondLayerEncription = sha1($firstLayerEncription);

                            //chech username and password
                            $checkUserandPassword = mysqli_query($conn,"SELECT * FROM office_admins WHERE username='$username' AND password='$secondLayerEncription'");
                            $getCOuntOfThisData = mysqli_num_rows($checkUserandPassword);

                            if($getCOuntOfThisData == 0)
                            {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Username and Password!</div>';
                            }
                            else
                            {
                                while($row = mysqli_fetch_array($checkUserandPassword))
                                {
                                    $usernameFromDb = $row['username'];
                                    $passwordFromDb = $row['password'];

                                    //validate both
                                    if($usernameFromDb == $username && $passwordFromDb == $secondLayerEncription)
                                    {
                                        session_start();
                                        $_SESSION['admin_username'] = $usernameFromDb;

                                        header('location:./');
                                    }
                                    else
                                    {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Invalid Username and Password!</div>';
                                    }
                                }
                            }
                        }
                        else
                        {
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username and password is required!</div>';
                        }
                    }

                ?>
                    <form action="" method="POST">
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="username" class="form-control form-control-sm"
                                id="exampleInputEmail1" placeholder="Username" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <a href="#" style="float:right;font-size:12px;">Forgot password?</a>
                            <input type="password" name="password" class="form-control form-control-sm"
                                placeholder="Password" id="exampleInputPassword1" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>