<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>
<?php   include('../dbcon.php'); ?>


<?php include('../header.php');
$studentidparam= $_GET['studentid'];
$gradeidparam= $_GET['gradeid'];
?>
<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO ADMINISTRATOR HOME PAGE</a><span>
					<span><a href="studentdetail.php" class="btn btn-success" style="float: center;">Return to Student Details</a><span>
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span><br>
					
				</h2>	
				<h2 class="text-center">
				Welcome to the Administrator Dashboard
				</h2>	
			</div>
		</div>
	</div>
</div>


<?php
$sql0 = "SELECT a.studentid, a.name, b.grade FROM student a JOIN studentgrade b ON a.studentid = b.studentid WHERE a.studentid = " . $studentidparam;
$sql0.= " AND b.gradeid = ";
$sql0.= $gradeidparam;

		$result0 = mysqli_query($conn,$sql0);
		if (mysqli_num_rows($result0)>0) {
			while ($DataRows0 = mysqli_fetch_assoc($result0)) {
                $StudentId = $DataRows0['studentid'];
                $StudentName = $DataRows0['name'];
                $Grade = $DataRows0['grade'];
            }
        }
        else {
                echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
?>

<table class="table table-bordered table-striped table-responsive">
	<h2 class="text-center">Update Grade</h2>
	<tr class="text-center">
		<th>Student ID: <?php echo $StudentId ?><br>
		<a href="viewstudentgrade.php?studentid=<?php echo $studentidparam;?>" class="btn btn-success" style="float: left;">Return</th>
		<th>Student Name: <?php echo $StudentName ?>
	</th>
    </tr>

	<table class="table table-bordered table-striped table-responsive">
	<tr class="text-center">
		<th>Course Label</th>
		<th>Course Name</th>
		<th>Current Grade</th>
		<th>New Grade</th>
    </tr>

<?php 



	$sql = "SELECT a.loginid, a.studentid, a.name, b.gradeid, b.grade, c.coursename, c.coursesubj, c.coursenum FROM student a JOIN studentgrade b ON a.studentid = b.studentid JOIN course c ON b.courseid = c.courseid WHERE a.studentid = " . $studentidparam;
	$sql .= " AND b.gradeid = ";
	$sql .= $gradeidparam;

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$GradeId = $DataRows['gradeid'];
				$Grade = $DataRows['grade'];
				$CourseSubj = $DataRows['coursesubj'];
				$CourseNum = $DataRows['coursenum'];
				$CourseName = $DataRows['coursename'];
?>
				<tr class="text-center">
					<td><?php echo $CourseSubj . " " . $CourseNum; ?></td>
					<td><?php echo $CourseName ?></td>
					<td><?php echo $Grade?></td>
					<td>
					<form action="" method="post">
						<div class="form-group">
							<input type="number" class="form-control" name="grade" placeholder=" Enter grade" required>
						</div> 
						<div class="form-group">
							<input type="submit" name="confirm" value="CONFIRM" class="btn btn-success btn-block text-center" > 
						</div> 
					</form>
					</td>
				</tr>		
<?php
			}
		} else {
			echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
		}
 ?>
<?php

	if (isset($_POST['confirm'])){
		if (!empty($_POST['grade']) && is_numeric($_POST['grade']) && $_POST['grade'] <= 100 && $_POST['grade'] >= 0)
		{
			$newGrade = $_POST['grade'];
			$qry = "UPDATE studentgrade SET grade = '$newGrade' WHERE studentid = $studentidparam AND gradeid = $gradeidparam";
			$run  = mysqli_query($conn, $qry);
			
			if ($run) {
			$_SESSION['SuccessMessage'] = "Data Updated Successfully";
			$redirectString = "viewstudentgrade.php?studentid=$studentidparam";
		   Header("Location:".$redirectString);
	
	   }

	   else {
				echo "Invalid Range: Not Updated";			 
		 }
	}
	else 
	{
		echo "Failed to Query";
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