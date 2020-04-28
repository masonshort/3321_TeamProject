<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<?php include('../header.php') ?>
<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO ADMINISTRATOR HOME PAGE</a><span>
					Welcome to the Administrator Dashboard
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span>
				</h2>	
			</div>
		</div>
	</div>
</div>

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">INSERT STUDENT DETAIL</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    
				    Full Name:<input type="text" class="form-control" name="fullname" placeholder="Enter Full Name" required>
				  </div>
				  <div class="form-group">
				    Registered Courses: <input type="text" class="form-control" name="rcourses" placeholder="Enter Registered Courses" required>
				  </div>
				  <div class="form-group">
				    
				    Average GPA:<input type="text" class="form-control" name="gpa" placeholder="Enter Average GPA" required>
				  </div>
				  <div class="form-group">
				    
				    Exam Score:<input type="number" class="form-control" name="escore" placeholder="Enter Exam Score" required>
				  </div>

				   <div class="form-group">
				    
				    Image:<input type="file" class="form-control" name="simg" required>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success btn-lg">INSERT</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['id']) && !empty($_POST['fullname'])) {
		
			include ('../dbcon.php');
			$name=$_POST['fullname'];
			$rcourses=$_POST['rcourses'];
			$gpa=$_POST['gpa'];
			$escore=$_POST['escore'];
			include('ImageUpload.php');

			$sql = "INSERT INTO `student`(`name`, `rcourses`, `gpa`, `escore`,`image`) VALUES ($name','$rcourses','$gpa', '$escore','$imgName')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
				<?php
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Please insert atleast studentid and fullname");
				</script>
				<?php
		}


	}

 ?>








