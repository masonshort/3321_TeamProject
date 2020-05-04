<?php session_start();?>
<?php require_once('include/Functions.php');?>
<?php echo UpdateCourseGrade(); ?>
<?php echo UpdateGradePoint(); ?>
<?php echo UpdateGPA(); ?>

<?php include('header.php') ?>
            <div class="jumbotron text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>
                                <span><a href="index.php" class="btn btn-success " style="float: left;">HOME</a></span>
                            Login Page
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 jumbotron">
                            <form action="login.php" method="post">
                              <div class="form-group">
                                  Username:<input type="text" class="form-control" name="user" placeholder=" Enter Username" required>
                              </div>
                            <div class="form-group">
                                  Password:<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                            </div>
                              <div class="form-group">
                                  <input type="submit" name="login" value="LOGIN" class="btn btn-success btn-block text-center" > 
                              </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    include ('dbcon.php');

    if (isset($_POST['login'])) {

        $user = $_POST['user'];
        $password = $_POST['password'];
        $qry = "SELECT * FROM account WHERE username='$user' AND password='$password'";
        $run  = mysqli_query($conn, $qry);
        $row = mysqli_num_rows($run);

        if($row > 0) {
            $data = mysqli_fetch_assoc($run);
            $accountType = $data['accounttype'];
            $loginid = $data['loginid'];
            $_SESSION['loginid'] = $loginid;
            $_SESSION['role'] = $accountType;

            if ($_SESSION['role'] == 1) {
                header('location:admin/admindash.php');
            }

            else if ($_SESSION['role'] == 0)
                {
                    header('location:user/userdash.php');
                }

        else {
      ?>             
    <script>
        alert('Invalid username or password');
        window.open('login.php','_self');
    </script>
    <?php
                   
                }

}
    }
?>

<?php include('footer.php') ?>
