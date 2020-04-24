<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo UserAreaAccess(); ?>

<?php include('../header.php') ?>
<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO STUDENT DASHBOARD</a><span>
					Welcome to the Student Dashboard
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span>
				</h2>	
			</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-striped table-responsive">
	<h2 class="text-center">Your Student Profile</h2>
	<tr class="text-center">
		<th>Student Id</th>
		<th>Full Name</th>
		<th>Registered Courses</th>
		<th>Average GPA</th>
		<th>Profile Picture</th>
	</tr>
<?php 
	include('../dbcon.php');
        $sql = "SELECT * FROM student WHERE loginid = " . $_SESSION['loginid'];

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$Number = $DataRows['number'];
				$IdNo = $DataRows['idno'];
				$Name = $DataRows['name'];
				$Rcourses = $DataRows['rcourses'];
				$Agpa = $DataRows['agpa'];
				$ProfilePic = $DataRows['image'];
				?>
				<tr class="text-center">
					<td><?php echo $IdNo;?></td>
					<td><?php echo $Name; ?></td>
					<td><?php echo $Rcourses; ?></td>
					<td><?php echo $Agpa; ?></td>
					<td>
						<img src="../databaseimg/<?php echo $ProfilePic;?>" alt="img"><br><br>
						<form action="UpdateImg.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="number" value="<?php echo $Number; ?>">
						</form>
					</td>
				</tr>
				<?php
				
			}
			
		} else {
			echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
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