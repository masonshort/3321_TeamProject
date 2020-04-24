<?php 

function Redirect_to($new_location) {
	header("Location:".$new_location);
	exit;
}
 ?>