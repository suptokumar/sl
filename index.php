<?php 
include 'db.php';
if (isset($_SESSION['ms'])) {
	header("Location: dashboard");
} else {
	header("Location: login.php");
}
?>