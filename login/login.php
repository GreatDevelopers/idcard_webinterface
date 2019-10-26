<?php include('../server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
<?php
if (isset($_GET['crn'])) {
	echo '<form method="post" action="login.php?crn=' . $_GET["crn"] . '">';
}else {
	echo '<form method="post" action="login.php">';
}
?>
  <form method="post" action="login.php">
  <form method="post" action="login.php">
  	<?php include('../errors/error.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>
