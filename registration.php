<?php

session_start();
//header('location:login.php');

$con = mysqli_connect('localhost', 'root', '@Jh0nfake0580');

mysqli_select_db($con, 'userregistration2');

//edit here
$name = $_POST['user'];
$studentid = $_POST['Id'];
$emailid = $_POST['emailId'];
$registeredcourses = $_POST['registeredCourses'];
$averagegpa = $_POST['averageGpa'];
$pass = $_POST['password'];


$s = " select * from usertable where name = '$name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo" Username Already Taken";
}else{
    $reg= " insert into usertable(name , Id, emailId, registeredCourses, averageGpa, password) values ('$name' , '$studentid' , '$emailid' , '$registeredcourses' , '$averagegpa' , '$pass')";
    mysqli_query($con, $reg);
    echo" Registration Successful";
}

?>