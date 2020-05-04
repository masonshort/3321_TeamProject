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
			<h2 class="text-center">Add Course</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    
				    Course Name:<input type="text" class="form-control" name="coursename" placeholder="Enter Course Name" required>
				  </div>
                  <div class="form-group">
				    
				    Course Subject:<input type="text" class="form-control" name="coursesubj" placeholder="Enter Course Subject" required>
				  </div>
				  <div class="form-group">
				    Course Number: <input type="number" class="form-control" name="coursenum" placeholder="Enter Course Number" required>
				  </div>


				  <button type="submit" name="submit" class="btn btn-success btn-lg">INSERT</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['coursename']) && !empty($_POST['coursesubj']) && !empty($_POST['coursenum']) && is_numeric($_POST['coursenum'])) {
		
			include ('../dbcon.php');
			$CourseName=$_POST['coursename'];
            $CourseSubj=$_POST['coursesubj'];
            $CourseNum=$_POST['coursenum'];

			$sql = "INSERT INTO course(coursename, coursesubj, coursenum) VALUES ('$CourseName', '$CourseSubj', '$CourseNum')";

			$run = mysqli_query($conn,$sql);

			if ($run == true) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
				<?php
                Header("Location:course.php");
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Invalid data entered");
				</script>
				<?php
		}


	}

 ?>








