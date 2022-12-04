<?php
session_start();
// Checking if user is not logged in, then redirecting to start.php
if (!isset($_SESSION['user_has_logged_in'])) {
	header('Location: index.php');
	exit;
}
session_destroy();
// Redirecting the user to the start page.
header('Location: index.php');
?>