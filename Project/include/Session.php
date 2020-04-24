<?php 

session_start();

function AdminAreaAccess() 
{
	if (!isset($_SESSION['role']))
		header('location: ../login.php');

	elseif ($_SESSION['role'] != 1)
		echo Redirect_to("include/Restricted.php");
}

function UserAreaAccess() 
{
	if (!isset($_SESSION['role']))
		header('location: ../login.php');

	elseif ($_SESSION['role'] != 0)
		echo Redirect_to("include/Restricted.php");	
}

function ErrorMessage() {

if (isset($_SESSION['ErrorMessage'])) {

	$Output = "<div class=\"alert alert-danger\">";
	$Output.= htmlentities($_SESSION['ErrorMessage']);
	$Output.="</div>";
	$_SESSION['ErrorMessage'] = null;
	return 	$Output;
	
}
}

function SuccessMessage() {

if (isset($_SESSION['SuccessMessage'])) {

	$Output = "<div class=\"alert alert-success\">";
	$Output.= htmlentities($_SESSION['SuccessMessage']);
	$Output.="</div>";
	$_SESSION['SuccessMessage'] = null;
	return 	$Output;
}
}


 ?>