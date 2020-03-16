<?php

session_start();


$con = mysqli_connect('localhost', 'root', '@Jh0nfake0580');

mysqli_select_db($con, 'userregistration2');

//edit here
$name = $_POST['user'];
$studentid = $_POST['Id'];
$emailid = $_POST['emailId'];
$registeredcourses = $_POST['registeredCourses'];
$averagegpa = $_POST['averageGpa'];
$pass = $_POST['password'];


$s = " select * from usertable where name = '$name' && Id = '$studentid' && emailId = '$emailid' && registeredCourses = '$registeredcourses' && averageGpa = '$averagegpa' && password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    $_SESSION['username'] = $name;
    //edit here
    $_SESSION['Id'] = $studentid;
    $_SESSION['emailId'] = $emailid;
    $_SESSION['registeredCourses'] = $registeredcourses;
    $_SESSION['averageGpa'] = $averagegpa;
    $_SESSION['password'] = $pass;
    header('location:home.php');
    
}else{
   header('location:login.php');
}

?>