<?php
function getOutputTable($user_data) {
	include('config/config.php');
?>
<div class "container">

<table class='.table'>
		<tr>
			<td colspan='2'>
			<img src=<?php echo $config['students_image_dir'] . $user_data['image'] ;?>>
			</td>
		</tr>
		<tr>
		<td>Name</td> <td><?php echo $user_data['fname']. " ".$user_data['lname'];?></td>
		</tr>
		<tr>
			<td>University Roll No.</td>
			<td><?php echo $user_data['uniRollNumber'];?></td>
		<tr>
			<td>College Roll No.</td>
			<td><?php echo $user_data['collegeRollNumber'] ;?></td>
		</tr>
			<tr>
			<td>Branch</td>
			<td><?php echo $user_data['branch'];?></td>
		</tr>
			<tr>
			<td>Day Scholer/Hostler</td>
			<td>
<?php
if($user_data['dayScholer']){ echo 'Day Scholer';}else{ echo 'Hostler';}
?>
	 </td>	
		<tr>
			<td>Mobile Number</td>
			<td><?php echo $user_data['mobileNo'];?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Email Id</td>
			<td><?php $user_data['email']; ?></td>
		<tr>
			<td>Address</td>
			<td><?php echo $user_data['address']; ?></td>
		</tr>
		
		</tr>
			<tr>
			<td>Admission Date</td>
			<td><?php echo $user_data['admissionDate'];?></td>
		</tr>
			<tr>
			<td> Purposed Leaving</td>
			<td><?php echo $user_data['leavingDate'];?></td>
		</tr>
			<tr>
			<td>URL </td>
			<td><?php echo $user_data['qrUrl'];?></td>
		</tr></table></div>
<?php }?>

