<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>
<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO DASHBOARD</a><span>
					Welcome to the Administrator Dashboard
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span>
				</h2>	
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3  jumbotron ">
			<div  style="text-align: center;">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data" >
				Choose Search Type: <select name="searchType" class="btn btn-info" style="margin-right: 30px;">					<option>Select</option>
									<option>Student ID</option>
									<option>Name</option>
									<option>Registered Courses</option>
									<option>GPA</option>
								</select><br><br>
								<div class="form-group">
                                  <input type="text" class="form-control" name="search" placeholder=" Enter Value" required>
                              </div>
				<input type="submit" name="confirm" value="CONFIRM" class="btn btn-success">
			</form>
			</div>
		</div>
	</div>
</div>
<?php
    echo  ErrorMessage();
    echo  SuccessMessage();
 ?>

<table class="table table-bordered table-striped table-responsive">
	<h2 class="text-center">Update Student's Information</h2>
	<tr class="text-center">
		<th>Student Id</th>
		<th>Exam Score</th>
		<th>Full Name</th>
		<th>Registered Courses</th>
		<th>Average GPA</th>
		<th>Profile Pic</th>
		<th>Update</th>
	</tr>
<?php 
	include('../dbcon.php');
	if (isset($_POST['confirm'])) {
		$searchType = $_POST['searchType'];
		$search = $_POST['search'];

		if ($searchType == 'Student ID'){
			$sql = "SELECT * FROM student WHERE studentid = " . $search;
		}

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$StudentId = $DataRows['studentid'];
				$Name = $DataRows['name'];
				$gpa = $DataRows['gpa'];
				$ProfilePic = $DataRows['image'];
				?>
				<tr class="text-center">
					<td><?php echo $StudentId;?></td>
					<td><?php echo $Name; ?></td>
					<td><?php echo $gpa; 

					
					?></td>
					<td>
						<img src="../databaseimg/<?php echo $ProfilePic;?>" alt="img"><br><br>
						<form action="UpdateImg.php" method="post" enctype="multipart/form-data">
							<input type="file" name="updateimg" style="float: left;" class="btn btn-info btn-sm">
							<input type="hidden" name="number" value="<?php echo $Number; ?>">
							<input type="submit" name="submitimg" value="UPDATE" class="btn btn-warning btn-sm" style="float: right;"><br>
						</form>
					</td>
					<td><a href="UpdateRecord.php?Update=".$DataRow['studentid'] class="btn btn-warning">UPDATE</a></td>
				</tr>
				<?php
				
			}
			
		} else {
			echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
		}
	}

 ?>
	

</table>
</div>
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2><?php echo @$_GET['updated']; ?></h2>
			</div>
		</div>
	</div>	



<?php include('../footer.php');?>