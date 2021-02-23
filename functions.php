<?php
function get_domain($more = "")
{
	echo "http://".$_SERVER['HTTP_HOST'].$more;
}
function return_domain($more = "")
{
	return "http://".$_SERVER['HTTP_HOST'].$more;
}
function d_link()
{
	return "?".rand();
}
function color($doc,$val)
{
	return "<span style='color:".$val."'>".$doc."</span>";
}
function rating($val)
{
	if ($val==0 || $val=='') {
		return "<span style='color: black; font-weight: bold;'>Unrated</span>";
	}
	if ($val<1999) {
		return "<span style='color: gray; font-weight: bold;'>".$val."</span>";
	}
	if ($val<3999) {
		return "<span style='color: green; font-weight: bold;'>".$val."</span>";
	}
	if ($val<5999) {
		return "<span style='color: blue; font-weight: bold;'>".$val."</span>";
	}
	if ($val<7999) {
		return "<span style='color: #FFFF00; font-weight: bold;'>".$val."</span>";
	}
	if ($val<=9999) {
		return "<span style='color: red; font-weight: bold;'>".$val."</span>";
	}
}
function user_detail($table)
{
	if (!isset($_SESSION['login_data_paipixel24'])) {
		return "Nothing";
	}
	include 'db.php';
	$d =$_SESSION['login_data_paipixel24'];
	$sql ="SELECT `$table` FROM `user` WHERE user_name='$d'";
	$q = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($q);
	return $r[0];
}
function more_user($table,$d)
{

	include 'db.php';
	$sql ="SELECT `$table` FROM `user` WHERE user_name='$d'";
	$q = mysqli_query($db,$sql);
	$r = mysqli_fetch_array($q);
	return $r[0];
}
function my_name($user)
{
	$val = more_user("rating",$user);
	$s = more_user("isnew",$user);
	if ($s==0) {
		return "<span style='color: black; font-weight: bold'>".$user."<span>";
	}
	if ($val==0 || $val=='') {
		return "<span style='color: gray; font-weight: bold'>".$user."<span>";
	}
	if ($val<1999) {
		return "<span style='color: gray; font-weight: bold'>".$user."<span>";
	}
	if ($val<3999) {
		return "<span style='color: green; font-weight: bold'>".$user."<span>";
	}
	if ($val<5999) {
		return "<span style='color: blue; font-weight: bold'>".$user."<span>";
	}
	if ($val<7999) {
		return "<span style='color: #FFFF00; font-weight: bold'>".$user."<span>";
	}
	if ($val<=9999) {
		return "<span style='color: red; font-weight: bold'>".$user."<span>";
	}
}
?>