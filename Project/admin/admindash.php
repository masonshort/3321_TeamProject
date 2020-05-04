<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php echo AdminAreaAccess(); ?>

<?php include('../header.php') ?>

<div class="header-section jumbotron">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">
                Welcome to the Administrator Dashboard
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
                    <h2 class="text-center">Please Select a Category</h2>
                        <a href="studentdetail.php" class="btn btn-primary btn-lg">Student List</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="grade.php" class="btn btn-danger btn-lg">Grade List</a><br><br>
                        <a href="course.php" class="btn btn-warning btn-lg">Course List</a><br><br>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include('../footer.php') ?>
