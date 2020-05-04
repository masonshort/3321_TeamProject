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
	<h2 class="text-center">List Of All Grades</h2>
	<tr class="text-center">
        <th>Grade ID</th>
		<th>Student ID</th>
		<th>Full Name</th>
        <th>Course Name</th>
        <th>Grade</th>

	</tr>
<?php 
	include('../dbcon.php');
        $sql = "SELECT g.*, s.studentid, s.name, c.coursename FROM studentgrade g JOIN student s ON g.studentid = s.studentid JOIN course c ON g.courseid = c.courseid";
        
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) 
            
            {
				$StudentId = $DataRows['studentid'];
				$StudentName = $DataRows['name'];
                $Grade = $DataRows['grade'];
                $GradeId = $DataRows['gradeid'];
                $CourseName = $DataRows['coursename'];

				?>
				<tr class="text-center">
					<td><?php echo $GradeId;?></td>
					<td><?php echo $StudentId; ?></td>
                    <td><?php echo $StudentName; ?><br></td>
                    <td><?php echo $CourseName; ?><br></td>
                    <td><?php echo $Grade; ?><br>
                    <a href="viewstudentgrade.php?studentid=<?php echo $StudentId;?>" class="btn btn-success" style="float: center;">View Grades For This Student </a> <br><br>
                    <a href="updatestudentgrade.php?studentid=<?php echo $StudentId;?>&gradeid=<?php echo $GradeId;?>" class="btn btn-primary" style="float: center;">Update This Current Grade </a><br><br>
                    <a href="deletestudentgrade.php?studentid=<?php echo $StudentId;?>&gradeid=<?php echo $GradeId;?>" class="btn btn-danger" style="float: center;">Delete This Current Grade</a>
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