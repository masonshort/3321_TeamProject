
<?php 
//create connection
$conn = mysqli_connect('localhost','root','','student');

//check connection

if (!$conn) {
    echo "connection failed: " . mysqli_connect_error()."<br>";
    echo "connection error no: " . mysqli_connect_errno();

} else {
   // echo "connected successfuly";
}



 ?>