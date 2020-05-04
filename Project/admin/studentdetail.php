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
	<h2 class="text-center">Student Information</h2>
	<tr class="text-center">
        <th>Profile Picture</th>
		<th>Student ID</th>
		<th>Full Name</th>
        <th>Average GPA</th>
        <th>Current Courses</th>

	</tr>
<?php 
	include('../dbcon.php');
        $sql = "SELECT studentid, name, gpa, image FROM student";
        
		$result = mysqli_query($conn,$sql);
		if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) 
            
            {
				$StudentId = $DataRows['studentid'];
				$Name = $DataRows['name'];
				$gpa = $DataRows['gpa'];
                $ProfilePic = $DataRows['image'];
                
                $sql2 = "SELECT c.coursename, c.coursenum, c.coursesubj
                FROM student s
                JOIN studentcourse sc ON sc.studentid = s.studentid
                JOIN course c ON sc.courseid = c.courseid
                WHERE s.studentid = " . $StudentId;

                $result2 = mysqli_query($conn, $sql2);
                $stringCourse = "";
                if (mysqli_num_rows($result2)>0) {
                    while ($DataRows2 = mysqli_fetch_assoc($result2)) {
                        $courseSubj = $DataRows2['coursesubj'];
                        $courseName = $DataRows2['coursename'];
                        $courseNum = $DataRows2['coursenum'];

                        $stringCourse .= "| ";
                        $stringCourse .= $courseSubj;
                        $stringCourse .= " ";
                        $stringCourse .= $courseNum;
                        $stringCourse .= " (";
                        $stringCourse .= $courseName;
                        $stringCourse .= ") |";

                    }
                }
				?>
				<tr class="text-center">
                <td>
						<img src="../databaseimg/<?php echo $ProfilePic;?>" alt="img"><br><br>
						<form action="UpdateImg.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="number" value="<?php echo $Number; ?>">
						</form>
					</td>
					<td><?php echo $StudentId;?></td>
					<td><?php echo $Name; ?><br>
					<a href="updatestudentname.php?studentid=<?php echo $StudentId;?>" class="btn btn-success" style="float: center;">Edit Name </a>
				</td>
                    <td><?php echo $gpa; ?><br>
                    <a href="viewstudentgrade.php?studentid=<?php echo $StudentId;?>" class="btn btn-success" style="float: center;">View Grades </a>
                    </td>
                    <td><?php echo $stringCourse; ?></td>

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