<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

?>

<html>
<head>
<title> Home Page </title>    
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    
</head>
<body>
    
    <div class="container">
    <a class="float-right" href="logout.php"> LOGOUT </a>
    
<!--    edit here    -->
    <h1> Welcome <?php echo $_SESSION['username']; ?> </h1> <br/>
    <h5> Id: <?php echo $_SESSION['Id']; ?> </h5> <br/>
    <h5> Email: <?php echo $_SESSION['emailId']; ?> </h5> <br/>
    <h5> Registered Courses: <?php echo $_SESSION['registeredCourses']; ?> </h5> <br/>
    <h5> Average GPA: <?php echo $_SESSION['averageGpa']; ?> </h5> <br/>
        
    
    </div>
</body>

</html>