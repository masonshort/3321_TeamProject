<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

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

<table class="table table-bordered table-striped table-responsive">
	<h2 class="text-center">List of Courses</h2>
	<tr class="text-center">
		<th>Course ID</th>
		<th>Course Name</th>
		<th>Course Subject</th>
		<th>Course Number</th>
		<th>Actions</th>
	</tr>
<?php 
	include('../dbcon.php');
		$sql = "SELECT * FROM course ORDER BY courseid";
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$CourseId = $DataRows['courseid'];
				$CourseName = $DataRows['coursename'];
				$CourseSubj = $DataRows['coursesubj'];
				$CourseNum = $DataRows['coursenum'];
				?>
				<tr class="text-center">
					<td><?php echo $CourseId;?></td>
					<td><?php echo $CourseName; ?></td>
                    <td><?php echo $CourseSubj; ?></td>
					<td><?php echo $CourseNum; ?></td>
					<td><span><a href="updatecourse.php?courseid=<?php echo $CourseId;?>" class="btn btn-success">Update</a><span>
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