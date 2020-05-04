<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php
$studentidparam = $_GET['studentid'];
include('../dbcon.php');
?>

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

<div class="container jumbotron">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h2 class="text-center">Insert Student Grade</h2>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    Student Id: <?php echo $StudentId ?> <br><br>
				    Full Name: <?php echo $StudentName ?>
				  </div>
				  <div class="form-group">
                CourseId: <select name = "courseidselect"> <br>
            <?php
                $courseQry = "SELECT c.courseid FROM course c JOIN studentcourse s ON c.courseid = s.courseid WHERE studentid = $StudentId";
                $result = mysqli_query($conn,$courseQry);
		        if (mysqli_num_rows($result)>0) {
			        while ($DataRows = mysqli_fetch_assoc($result)) {
				        $CourseId = $DataRows['courseid'];
                        echo "<option value='$CourseId'>$CourseId</option>";
                        $CourseChosen = $_GET['courseidselect'];
                    }
                }
                ?>
                </select>
                </div>
	   				  <div class="form-group">
				  Exam Score:<input type="number" class="form-control" name="grade" placeholder="Enter Exam Score" required>
				  </div>
				  <button type="submit" name="submit" class="btn btn-success btn-lg">INSERT</button>
			</form>
		</div>
	</div>
</div>

<?php include('../footer.php') ?>

<?php 

	if (isset($_POST['submit'])) {
		if (!empty($_POST['grade']) && is_numeric($_POST['grade']) && $_POST['grade'] <= 100 && $_POST['grade'] >= 0) {
		
			include ('../dbcon.php');
			$Grade=$_POST['grade'];

			$sql = "INSERT INTO studentgrade (studentid, courseid, grade) VALUES ($Student, $CourseChosen, $Grade)";

			$run = mysqli_query($conn,$sql);

			if ($run) {
				
				?>
				<script>
					alert("Data Inserted Successfully");
				</script>
                <?php
                			$redirectString = "viewstudentgrade.php?studentid=$studentidparam";
                            Header("Location:".$redirectString);
			} else {
				echo "Error : ".$sql."<br>". mysqli_error($conn); 
			}
		} else {
				?>
				<script>
					alert("Please insert valid grade range");
				</script>
				<?php
		}


	}

 ?>
