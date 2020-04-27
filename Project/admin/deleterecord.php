<?php 

include('../dbcon.php');
$delete_number = $_GET['Delete'];
$profile_pic = $_GET['Picture'];


$sql = "delete  from `student` where number = $delete_number";

$result = mysqli_query($conn,$sql);

if ($result) {
	unlink("../databaseimg/".$profile_pic);
	echo '<script>window.open("deletestudent.php?deleted=Record deleted successfully","_self")</script>';
}

 ?>