<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    if (isset($_GET['crn'])) {
        header('location: login/login.php?crn=' . $_GET['crn']);
    }else {
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
    <!--Fontawesome icons -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
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

<div class="container">
    <!-- logged in user information -->
    <?php if (isset($_SESSION['username'])) { ?>
        <div class="card border-success mt-4">
          <div class="card-header bg-secondary">
            <div class="row">
              <a class="btn btn-large btn-secondary" href="index.php"><h3><i class="fas fa-home"></i></h3></a>
              <h3 class="text-center col align-self-center">User Data</h3>
            </div>
          </div>
          <?php if (isset($_GET['crn'])) {
              include('database_functions.php');
              include('display_user_data.php');
              $user_data = getUserData($_GET['crn']);
              if ($user_data) {
                  // echo '<pre>' . print_r($user_data, 1) . '</pre>';
                  displayUserData($user_data);
              }else {
                  echo '<div class="alert alert-warning"><strong>Invalid Roll No!</strong> Either user data doesn\'t exists or you don\'t have enough permissions. </div>';
                  include('crn_input_form.php');
              }
          }else {
	      include('crn_input_form.php'); ?>
              <div class="card-footer text-right">
                <button class="btn btn-primary"><a href="index.php?logout=1" style="color: red;">logout</a></button>
              </div>
          <?php } ?>
        </div>
    <?php } ?>
</div>
</body>
</html>
