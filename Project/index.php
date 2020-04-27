
<?php
//include header part of html
 include('header.php')
  ?>
            

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                WELCOME TO UHD STUDENT MANAGEMENT SYSTEM
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Student's information</h2>
                            <form action="index.php" method="post">
                <input type="text" name="studentid" placeholder="Enter Student ID" style="width: 240px;height: 35px;"><span>OR/AND<span>
                 <select name="escore" class="btn btn-info" >
                                    <option>SELECT EXAM SCORE</option>
                                    <option>60</option>
                                    <option>70</option>
                                    <option>80</option>
                                    <option>90</option>
                                    <option>100</option>
                                </select>
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center">
    <tr >
        <th class="text-center">Student ID.</th>
        <th class="text-center">Exam's Score</th>
        <th class="text-center">Student Name</th>
        <th class="text-center">Registered Courses</th>
        <th class="text-center">Average GPA.</th>
        <th class="text-center">Profile Pic</th>
    </tr>
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {

        $Escore = $_POST['escore'];
        $StudentIdQuery = $_POST['studentid'];

        $sql = "SELECT * FROM `student` WHERE `escore` = '$Escore' OR `studentid`='$StudentIdQuery'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $StudentId = $DataRows['studentid'];
                $Name = $DataRows['name'];
                $Rcourses = $DataRows['rcourses'];
                $gpa = $DataRows['gpa'];
                $Escore = $DataRows['escore'];
                $ProfilePic = $DataRows['image'];
                ?>
                <tr>
                    <td><?php echo $StudentId;?></td>
                    <td><?php echo $Escore;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $Rcourses; ?></td>
                    <td><?php echo $gpa; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    


<!--include header part of html-->
<?php include('footer.php') ?>

