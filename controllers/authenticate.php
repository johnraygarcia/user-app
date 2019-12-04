<?php

$email = $_POST['EmailAddress'];
$password = $_POST['Password'];

$userAuthenticated = $dbConn->processLogin($email, $password);

if ($userAuthenticated) {
	$_SESSION['login_success'] = "Successfully Logged in";
	header("Location: index.php?p=users");
} else {
	$_SESSION['login_error'] = "Incorrect Credentials";
	header("Location: index.php?p=login");
}

