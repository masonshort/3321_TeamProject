<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo UserAreaAccess(); ?>

<?php include('../header.php') ?>

<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
					Welcome to the Student Dashboard
					<span><a href="logout.php" class="btn btn-success" style="float: right;">LOGOUT</a><span>
				</h2>	
			</div>
		</div>
	</div>
</div>

<div class="admin-dashboard text-center">
        <div class="container">
        	
            <div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 jumbotron" >
                        <a href="studentprofile.php" class="btn btn-info btn-lg">View My Profile</a><br><br>
                        <a href="studentcourse.php" class="btn btn-info btn-lg">View My Course</a><br><br>
                        <a href="studentgrade.php" class="btn btn-info btn-lg">View My Grades</a>   
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include('../footer.php') ?>
