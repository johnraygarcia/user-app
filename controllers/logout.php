<?php
	session_start();
	session_unset();
	session_destroy();

	//go back to landing page
	header("Location: index.php?p=login");
?>