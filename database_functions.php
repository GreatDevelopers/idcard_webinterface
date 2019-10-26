<?php
function getDatabaseConnection() {
	include('config/database.php');
	// connect to the database
	$db = new mysqli($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);
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
