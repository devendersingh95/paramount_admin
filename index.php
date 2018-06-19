<?php session_start();
	include("db.php");
	if(isset($_SESSION['para_username']) && !empty($_SESSION['para_username']))
	{
		header("Location:profile.php");
	}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Paramount - Admin Login</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="assets/css/multipleimages.css"/>
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link rel="icon" type="image/png" href="images/admin.png" />
</head>
<body>
			<div class="container-fluid" id="base_div" style="background:rgba(0,0,0,0.1);">
				<div class="col-md-12" align="center" style="margin-top:20px;">
					<h3>
					<i style="font-size:100px;color:#E75926;" class="fa fa-paper-plane-o"></i><br>Paramount Admin
				</h3>
				<div class="login-page">

				<div class="form">
					<form action="index.php" method="post" id="login_form" >
					  <input type="text" id="username" name="username"  placeholder="username or email"/>
					  <input type="password" id="password" name="password" placeholder="password"/>
					  <input type="submit" id="login_submit" value="TAKE ME IN"/>
					</form>
					<br/>
						<div id="login_msg"></div>
				  </div>

				</div>
			  </div>

			</div>

	<script src="assets/js/jquery.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/work.js"></script>
</body>
</html>
