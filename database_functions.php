<?php
function getDatabaseConnection() {
	include('config/config.php');
	// connect to the database
	$db = new mysqli($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
	// Check connection
	if ($db->connect_error) {
	    echo '<div class="alert alert-danger"><strong>Something went wrong!</strong> Please try after some time or contact server-admin. </div>';
	    die();
	}
	return $db;
}

function getUserData($crn) {
	$db = getDatabaseConnection();
	$sql ='SELECT * FROM students WHERE collegeRollNumber=' . $crn;
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc();
		//getOutputTable($row);
	}else {
		return;
	}
	return $row;
}
?>
