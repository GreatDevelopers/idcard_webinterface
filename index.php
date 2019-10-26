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
	//header('location: login/login.php');
	//header('location: index.php?crn=1715083');
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
	<h2>Home Page</h2>
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
	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	<?php
		getUserData($_GET['crn']);
	?>
	<?php if (isset($_GET['crn'])) {
		echo 'CRN: ' . $_GET['crn'];
	}
	?>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
</body>
</html>

<?php
function getUserData($crn) {
	include('config/config.php');
	// connect to the database
	$db = new mysqli($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
	// Check connection
	if ($db->connect_error) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$sql ='SELECT * FROM students WHERE collegeRollNumber=' . $crn;
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc();
		getOutputTable($row);
	}else {
		echo "0 results";
	}
}

function getOutputTable($data)
{?>
<div class "container">

<table class='.table'>
		<tr>
			<td colspan='2'>
			<img src=<?php echo $data['image'] ;?>>
			</td>
		</tr>
		<tr>
		<td>Name</td> <td><?php echo $data['fname']. " ".$data['lname'];?></td>
		</tr>
		<tr>
			<td>University Roll No.</td>
			<td><?php echo $data['uniRollNumber'];?></td>
		<tr>
			<td>College Roll No.</td>
			<td><?php echo $data['collegeRollNumber'] ;?></td>
		</tr>
			<tr>
			<td>Branch</td>
			<td><?php echo $data['branch'];?></td>
		</tr>
			<tr>
			<td>Day Scholer/Hostler</td>
			<td>
<?php
if($data['dayScholer']){ echo 'Day Scholer';}else{ echo 'Hostler';}
?>
	 </td>	
		<tr>
			<td>Mobile Number</td>
			<td><?php echo $data['mobileNo'];?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Email Id</td>
			<td><?php $data['email']; ?></td>
		<tr>
			<td>Address</td>
			<td><?php echo $data['address']; ?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Admission Date</td>
			<td><?php echo $data['admissionDate'];?></td>
		</tr>
			<tr>
			<td> Purposed Leaving</td>
			<td><?php echo $data['leavingDate'];?></td>
		</tr>
			<tr>
			<td>URL </td>
			<td><?php echo $data['qrUrl'];?></td>
		</tr></table></div>

<?php }?>
