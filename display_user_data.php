<?php
function displayUserData($user_data) {
        include('config/config.php');
?>
<div class="card-body row">
  <div class="col-md-8">
    <h5 class="text-primary">Demographic Information</h5>
    <div class="row">
      <label class="col-4 text-right font-weight-bold font-weight-bold">Student Name :</label>
      <div class="col-8">
        <h5><?php echo ucfirst(strtolower($user_data['fname'])) . " " . ucfirst(strtolower($user_data['lname']));?></h5>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Father Name:</label>
      <div class="col-8">
        <div><?php echo $user_data['fatherName'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Gender :</label>
      <div class="col-8">
        <div><?php echo ucfirst(strtolower($user_data['gender']));?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Date of Birth :</label>
      <div class="col-8">
        <div><?php echo $user_data['dob'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Email :</label>
      <div class="col-8">
        <div><?php echo $user_data['email'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Phone :</label>
      <div class="col-8">
        <div><?php echo $user_data['mobileNo'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Address:</label>
      <div class="col-8">
                <div><?php echo $user_data['address'];?></div>
      </div>
    </div>
    <br><h5 class="text-primary">College Information</h5>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">College Roll No :</label>
      <div class="col-8">
        <div><?php echo $user_data['collegeRollNumber'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">University Roll No :</label>
      <div class="col-8">
        <div><?php echo $user_data['uniRollNumber'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Branch :</label>
      <div class="col-8">
        <div><?php echo $user_data['branch'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Hostler / Day Scholer:</label>
      <div class="col-8">
        <div><?php if($user_data['dayScholar']){echo 'Day Scholar';}else{echo 'Hostler';};?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Admission Date :</label>
      <div class="col-8">
        <div><?php echo $user_data['admissionDate'];?></div>
      </div>
    </div>
    <div class="row">
      <label class="col-4 text-right font-weight-bold">Purposed Leaving :</label>
      <div class="col-8">
        <div><?php echo $user_data['leavingDate'];?></div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="text-center">
      <img src = <?php echo $config['students_image_dir'] . $user_data['image'] ;?> width=200 class="pic">
      <br>Student's Photo
      <br>
      <div class="mt-5">
        <?php if ($user_data['allowed']) {echo '<h3 class="text-success">Allow</h3>';}else {echo '<h3 class="text-danger">Disallow</h3>';}?>
      </div>
    </div>
  </div>
</div>
<div class="card-footer">
  <div class="row">
    <label class="col-0 text-right font-weight-bold">URL :</label>
    <div class="col-6">
      <a href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>"><?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?></a>
    </div>
    <div class="col text-right">
      <button class="btn btn-primary"><a href="index.php?logout='1'" style="color: red;">logout</a></button>
    </div>
  </div>
</div>
<?php }?>
