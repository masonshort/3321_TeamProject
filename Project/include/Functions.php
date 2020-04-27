<?php 


function Redirect_to($new_location) {
	header("Location:".$new_location);
	exit;
}

function UpdateCourseGrade()
{
	include ('dbcon.php');
	$qry = "UPDATE studentcourse s 
	SET s.coursegrade =
		(SELECT AVG(g.grade)
		 FROM studentgrade g 
		 WHERE s.studentid = g.studentid AND s.courseid = g.courseid);";
	mysqli_query($conn, $qry);
}

function UpdateGradePoint()
{
	include ('dbcon.php');
	$qry = "UPDATE studentcourse
	SET gradepoint = 
	CASE
		WHEN coursegrade < 60 THEN 0
		WHEN coursegrade >= 60 AND coursegrade < 70 THEN 1
		WHEN coursegrade >= 70 AND coursegrade < 80 THEN 2
		WHEN coursegrade >= 80 AND coursegrade < 90 THEN 3
		ELSE 4
	END;";
	mysqli_query($conn, $qry);
}

function UpdateGPA()
{
	include ('dbcon.php');
	$qry = "UPDATE student s
	SET s.gpa =
		(SELECT AVG(c.gradepoint)
		 FROM studentcourse c
		 WHERE s.studentid = c.studentid);";
	mysqli_query($conn, $qry);
}
 ?>