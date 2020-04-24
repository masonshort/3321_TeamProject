<?php require_once('../include/Session.php');?>
<?php require_once('../include/Functions.php');?>
<?php include('../dbcon.php') ?>
<?php 

if(isset($_POST['submitimg'])) {
	
	
	$imgName = $_FILES['updateimg']['name'];
	$imgTmpName =$_FILES['updateimg']['tmp_name'];
	$imgSize = $_FILES['updateimg']['size'];
	$imgError = $_FILES['updateimg']['error'];
	$imgExt = explode('.', $imgName);
	$actualFileExt = strtolower(end($imgExt));
	$allowed = array('jpg','jpeg','png','pdf');

	if (in_array($actualFileExt, $allowed)) {

		if ($imgError === 0) {
			if ($imgSize < 50000) {
				$fileDestination = '../databaseimg/'.$imgName;
				move_uploaded_file($imgTmpName, $fileDestination);
			} else {
				echo "file size is too big";
			}
		} else {
			echo "error while uploading your file";
		}
	
	} else {
		echo "you cannot upload files of this type";
	}		

	if(empty($imgName)) {
		 					$_SESSION['ErrorMessage'] = "Please Select an Image First";
                			Redirect_to("updatestudent.php");
                		} else {


						$sql = "update student set image ='$imgName' where number = '$NUMBER' ";
						$result = mysqli_query($conn,$sql);

								if ($result) {
									$_SESSION['SuccessMessage'] = "Image Updated Successfully";
                					Redirect_to("updatestudent.php");
								}
					}
}

 ?>
