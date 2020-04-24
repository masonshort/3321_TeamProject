<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php 

	include('../dbcon.php');
	$update_record= $_GET['Update'];
	$sql = "select * from student where number = '$update_record'";
	$result = mysqli_query($conn,$sql);

	while ($data_row = mysqli_fetch_assoc($result)) {
		$update_number = $data_row['number']; 
		$Id = $data_row['idno'];
		$Name = $data_row['name'];
		$Rcourses = $data_row['rcourses'];
		$Agpa = $data_row['agpa'];
		$Escore = $data_row['escore'];

	}

 ?>

<?php include('../header.php') ?>

<?php include('admin.header.php') ?>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">UPDATE STUDENT DETAIL</h2>
			<form action="UpdateRecord.php?update_number=<?php echo $update_number;?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				      Student Id:<input type="text" class="form-control" name="id" value="<?php echo 
				      $Id;?>" required>
				  </div>
				  <div class="form-group">
				    
				    Full Name:<input type="text" class="form-control" name="fullname" value="<?php echo 
				    $Name;?>" placeholder="full name" required>
				  </div>
				  <div class="form-group">
				      Registered Courses: <input type="text" class="form-control" name="rcourses" value="<?php echo $Rcourses;?>"  required>
				  </div>
				  <div class="form-group">
				    
				    Average GPA:<input type="text" class="form-control" name="agpa" value="<?php echo $Agpa;?>" required>
				  </div>
				  <div class="form-group">
				    
				    Exam Score:<input type="number" class="form-control" name="escore" value="<?php echo $Escore;?>" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success btn-lg">UPDATE</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>


<?php 
//This php code block is for editing the data that we got after clicking on update button
	if (isset($_POST['submit'])) {
		if (!empty($_POST['id']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$number = $_GET['update_number'];
			$id=$_POST['id'];
			$name=$_POST['fullname'];
			$rcourses=$_POST['rcourses'];
			$agpa=$_POST['agpa'];
			$escore=$_POST['escore'];

			$sql = "UPDATE student SET idno = '$id', name = '$name', rcourses='$rcourses', agpa = '$agpa', escore = '$escore' WHERE number = '$number'";

			$Execute = mysqli_query($conn,$sql);

			if ($Execute) {
				 $_SESSION['SuccessMessage'] = " Data Updated Successfully";
                Redirect_to("updatestudent.php");

			}


		}

	}

 ?>
