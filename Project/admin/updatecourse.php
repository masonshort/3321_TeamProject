<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>
<?php   include('../dbcon.php'); ?>


<?php include('../header.php');
$courseidparam= $_GET['courseid'];
?>
<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					<span><a href="admindash.php" class="btn btn-success" style="float: left;">BACK TO ADMINISTRATOR HOME PAGE</a><span>
					<span><a href="course.php" class="btn btn-success" style="float: center;">Return to Course</a><span>
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span><br>
					
				</h2>	
				<h2 class="text-center">
				Welcome to the Administrator Dashboard
				</h2>	
			</div>
		</div>
	</div>
</div>

<table class="table table-bordered table-striped table-responsive">
<h2 class="text-center">Update Course</h2>
	<tr class="text-center">
		<th>Course ID</th>
		<th>Course Name</th>
		<th>Current Subject</th>
        <th>Course Number</th>
        <th>Changes</th>
    </tr>

<?php
$sql0 = "SELECT * FROM course WHERE courseid = $courseidparam";

		$result0 = mysqli_query($conn,$sql0);
		if (mysqli_num_rows($result0)>0) {
			while ($DataRows0 = mysqli_fetch_assoc($result0)) {
                $CourseId = $DataRows0['courseid'];
                $CourseName = $DataRows0['coursename'];
                $CourseSubj = $DataRows0['coursesubj'];
                $CourseNum = $DataRows0['coursenum'];
            }
        }
        else {
                echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
?>
	
	<tr class="text-center">
		<td><?php echo $CourseId ?> </td>
        <td><?php echo $CourseName ?></td>
        <td><?php echo $CourseSubj?></td>
        <td><?php echo $CourseNum ?></td>
        <td>
        <form action="" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="subjfield" placeholder=" Enter new course subject" required>
                        </div> 
                        <div class="form-group">
							<input type="number" class="form-control" name="numfield" placeholder=" Enter new course number" required>
						</div> 
						<div class="form-group">
							<input type="submit" name="confirm" value="CONFIRM" class="btn btn-success btn-block text-center" > 
						</div> 
                    </form>
                    </td>
	</th>
    </tr>

<?php

	if (isset($_POST['confirm'])){
		if (!empty($_POST['subjfield']) && !empty($_POST['numfield']) && is_numeric($_POST['numfield']) && ctype_alpha($_POST['subjfield']) && strlen($_POST['subjfield']) <= 4)
		{
            $newSubj = strtoupper($_POST['subjfield']);
            $newNum = $_POST['numfield'];
			$qry = "UPDATE course SET coursesubj = '$newSubj', coursenum = '$newNum' WHERE courseid = $courseidparam";
			$run  = mysqli_query($conn, $qry);
			
			if ($run) {
			$_SESSION['SuccessMessage'] = "Data Updated Successfully";
		   Header("Location:course.php");
	
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