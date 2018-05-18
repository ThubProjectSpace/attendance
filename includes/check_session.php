<?php
	session_start();

	// STORING THE SESSION VARIABLES
	if (!isset($_SESSION['id'])) {
	   echo "<script>location.href='index1.php'</script>";
	}
?>