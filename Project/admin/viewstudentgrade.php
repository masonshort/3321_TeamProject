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
					<span><a href="userdash.php" class="btn btn-success" style="float: left;">BACK TO ADMINISTRATOR HOME PAGE</a><span>
					Welcome to the Administrator Dashboard
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span>
				</h2>	
			</div>
		</div>
	</div>
</div>
<?php
$sql0 = "SELECT studentid, name FROM student WHERE studentid = " . $studentidparam;

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
	<h2 class="text-center">Student Grades</h2>
	<tr class="text-center">
		<th><?php $StudentId ?></th>
        <th><?php $StudentName ?></th>
    </tr>

<table class="table table-bordered table-striped table-responsive">
	<tr class="text-center">
		<th>Course</th>
        <th>Exam Grades</th>
    </tr>
<?php 

    $sql = "SELECT a.loginid, a.studentid, a.name, b.grade, c.coursename, c.coursesubj, c.coursenum FROM student a JOIN studentgrade b ON a.studentid = b.studentid JOIN course c ON b.courseid = c.courseid WHERE a.studentid = " . $studentidparam;
    $sql .= " ORDER BY c.coursename";

		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
			while ($DataRows = mysqli_fetch_assoc($result)) {
				$Grade = $DataRows['grade'];
				$CourseSubj = $DataRows['coursesubj'];
				$CourseNum = $DataRows['coursenum'];
				?>
				<tr class="text-center">
					<td><?php echo $CourseSubj . " " . $CourseNum; ?></td>
					<td><?php echo $Grade; ?></td>

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