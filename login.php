<html>
<head>
        <title> User Login and Registration </title>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">      
    
</head>
<body>
<div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-6">
        <h2> Login Here </h2>
        <form action="validation.php" method="post">
            <div class="form-group">
                <label>Student name</label>
                <input type="text" name="user" class="form-control" required>
                </div>
            
             <div class="form-group">
                <label>Student Id</label>
                <input type="int" name="Id" class="form-control" required>
                </div>  
            
            <div class="form-group">
                <label>Email Id</label>
                <input type="text" name="emailId" class="form-control" required>
                </div>  
            
            <div class="form-group">
                <label>Registered Courses</label>
                <input type="text" name="registeredCourses" class="form-control" required>
                </div>  
            
            
            <div class="form-group">
                <label>Average GPA</label>
                <input type="text" name="averageGpa" class="form-control" required>
                </div>  
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                
                </div>    
                <button type="submit" class="btn btn-primary"> Login </button>        
            </form> 
        </div>
        
        
        <div class="col-md-6" login-right>
        <h2> Register Here </h2>
        <form action="registration.php" method="post">
            
            <div class="form-group">
                <label>Student name</label>
                <input type="text" name="user" class="form-control" required>
                </div>
<!--
            
  edit here
-->
            <div class="form-group">
                <label>Student Id</label>
                <input type="int" name="Id" class="form-control" required>
                </div>    
            
            <div class="form-group">
                <label>Email Id</label>
                <input type="text" name="emailId" class="form-control" required>
                </div>  
            
            <div class="form-group">
                <label>Registered Courses</label>
                <input type="text" name="registeredCourses" class="form-control" required>
                </div>  
            
            <div class="form-group">
                <label>Average GPA</label>
                <input type="text" name="averageGpa" class="form-control" required>
                </div>  
             
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
                </div>    
                <button type="submit" class="btn btn-primary"> Register </button>        
            </form> 
        
      </div>    
    </div>
</div>   
    </div>
</body>
</html>