<?php
require_once 'config.php';
$message="Enter your username and password to log in:";
// Define variables and initialize with empty values
$uname = $pw = "";
$uname_err = $pw_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$uname = $_POST['username'];
$pw = $_POST['password'];

$sql = "SELECT * FROM `login` WHERE `username`='$uname'";

if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
if ($row=mysqli_fetch_row($result))
    {

       if($row[0]==$uname && $row[1]==$pw)
        {
        session_start();
        $_SESSION['user'] = $uname;
        header("location: Home.php");
        }
        else
        {
          $message="Wrong username or password...!";
        }
    }
    else
    {
        $message="User Not Found!";
    }
  // Free result set
  mysqli_free_result($result);
}
else
{
            $message="Wrong username or password...!";
            echo "result" . mysqli_query($conn,$sql) ."<-";
}

$conn->close();
}
else
{
    $message="Try Submitting The Page....!";
}


?>


<!DOCTYPE html>
<html lang="en">

    <head>
      <style>
      body{
        background-image: url('assets/img/backgrounds/login_bg.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }
      </style>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nec Resource Allocator</title>

        <!-- CSS -->
       <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


    </head>


    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1 style="color:black"><strong>Nec Resource Allocator</strong></h1>
                            <h2 style="color:black"><strong>Course Head Login</strong></h2>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="index.php" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn" name="login">Log in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="//www.facebook.com/nttf">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="//www.twitter.com/nttf">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="//www.google.com/nttf">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript-->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <!--<script src="assets/js/jquery.backstretch.min.js"></script>-->
        <script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]-->
            <script src="assets/js/placeholder.js"></script>
        <!--[endif]-->

    </body>
</html>
