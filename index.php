<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	if (isset($_GET['crn'])) {
		header('location: login/login.php?crn=' . $_GET['crn']);
	}
	else {
		header('location: login/login.php');
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login/login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="bootstrap/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="bootstrap/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
	<h2>User Data</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	<p align="center">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	<?php
		if (isset($_GET['crn'])) {
			include('database_functions.php');
			include('output_table.php');
			$user_data = getUserData($_GET['crn']);
			if ($user_data) {
				// echo '<pre>' . print_r($user_data, 1) . '</pre>';
				echo '<button class="btn btn-secondary" onClick="window.location.href=\'index.php\'"><b>&larr;</b> Home</button>';
				getOutputTable($user_data);
			}else {
				echo '<div class="alert alert-warning"><strong>Invalid Roll No!</strong> Either user data doesn\'t exists or you don\'t have enough permissions. </div>';
				include('crn_input_form.php');
			}
		}else {
			include('crn_input_form.php');
		}
	?>
    	<p><br><button class="btn btn-primary"><a href="index.php?logout='1'" style="color: red;">logout</a></button> </p>
    <?php endif ?>
</div>
</body>
</html>
