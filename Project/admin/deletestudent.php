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
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO STUDENT DASHBOARD</a><span>
					Welcome to the Student Dashboard
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
				Choose Exam Score: <select name="escore" class="btn btn-info" style="margin-right: 30px;">					<option>Select</option>
									<option>60</option>
									<option>70</option>
									<option>80</option>
									<option>90</option>
									<option>100</option>
								</select>
				<input type="submit" name="search" value="SEARCH" class="btn btn-success">
			</form>
			</div>
		</div>
	</div>


<table class="table table-striped table-bordered table-responsive text-center">
	<h2 class="text-center">Student's Information</h2>
	<tr>
	
		<th class="text-center">Student Id</th>
		<th class="text-center">Full Name</th>
		<th class="text-center">Registered Courses</th>
		<th class="text-center">Average GPA</th>
		<th class="text-center">Profile Pic</th>
		<th class="text-center">Delete</th>
		
	</tr>
<?php 
	include('../dbcon.php');
	if (isset($_POST['search'])) {

		$escore = $_POST['escore'];

		$sql = "SELECT * FROM `student` WHERE `escore` = '$escore'";

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
                $Number = $DataRows['number'];
				$StudentId = $DataRows['studentid'];
				$Name = $DataRows['name'];
				$Rcourses = $DataRows['rcourses'];
				$Agpa = $DataRows['agpa'];
				$ProfilePic = $DataRows['image'];
				?>
				<tr>
					<td><?php echo $StudentId;?></td>
					<td><?php echo $Name; ?></td>
					<td><?php echo $Rcourses; ?></td>
					<td><?php echo $Agpa; ?></td>
					<td><img src="../databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
					<td><a href="deleterecord.php?Delete=<?php echo $Number; ?>&Picture=<?php echo $ProfilePic;?>" class="btn btn-danger">Delete</a></td>
				</tr>
				<?php
				
			}
			
		} else {
			echo "<tr><td colspan ='6' class='text-center'>No Record Found</td></tr>";
		}
	}

 ?>
    
    
</table>
</div>

<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h2><?php echo @$_GET['deleted']; ?></h2>
			</div>
		</div>
	</div>	



<?php include('../footer.php') ?>