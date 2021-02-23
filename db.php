<?php 
$db = mysqli_connect("localhost","root","","lh");
date_default_timezone_set("Asia/Dhaka");
session_start();
function user_detail($sec,$log)
{
	global $db;
	$sql = "SELECT $sec FROM user WHERE ms='$log'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
	return $row[0];
}
$lock = "?".rand();
if (isset($_SESSION['ms'])) {
$ms = $_SESSION['ms'];
}
function total_amount($user,$phone)
{
	global $db;
	$sql="SELECT SUM(amount) FROM dhar_din WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($m);
	return $r[0];
}
function total_paid($user,$phone)
{
	global $db;
	$sql="SELECT SUM(paid) FROM dhar_din WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($m);
	return $r[0];
}

function total_amounts($user,$phone)
{
	global $db;
	$sql="SELECT SUM(amount) FROM dhar_nin WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($m);
	return $r[0];
}
function total_paids($user,$phone)
{
	global $db;
	$sql="SELECT SUM(paid) FROM dhar_nin WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($m);
	return $r[0];
}
?>