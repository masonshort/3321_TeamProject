<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>
<?php   include('../dbcon.php'); ?>


<?php include('../header.php');
$studentidparam= $_GET['studentid'];
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
$sql0 = "SELECT studentid, name FROM student WHERE studentid = $studentidparam";
		$result0 = mysqli_query($conn,$sql0);
		if (mysqli_num_rows($result0)>0) {
			while ($DataRows0 = mysqli_fetch_assoc($result0)) {
                $StudentId = $DataRows0['studentid'];
                $StudentName = $DataRows0['name'];

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
		<th>Student Name: <?php echo $StudentName ?>
	</th>
    </tr>

	<table class="table table-bordered table-striped table-responsive">
	<tr class="text-center">
        <th>New Name</th>
    </tr>
    <td>
					<form action="" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="name" placeholder=" Enter Name" required>
						</div> 
						<div class="form-group">
							<input type="submit" name="confirm" value="CONFIRM" class="btn btn-success btn-block text-center" > 
						</div> 
					</form>
					</td>

<?php

	if (isset($_POST['confirm'])){
		if (!empty($_POST['name']))
		{
			$newName = $_POST['name'];
			$qry = "UPDATE student SET name = '$newName' WHERE studentid = $studentidparam";
			$run  = mysqli_query($conn, $qry);
			
			if ($run) {
			$_SESSION['SuccessMessage'] = "Data Updated Successfully";
		   Header("Location:studentdetail.php");
	
	   }

	   else {
				echo "Invalid input";			 
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