<?php
	//error_reporting(0);
	$con = mysqli_connect("localhost","root","","late_come");

	if (!$con) {
		echo "Database Connected";
		exit();
	}
?>