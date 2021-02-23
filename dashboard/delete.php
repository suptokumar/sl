<?php 
include '../db.php';
if (isset($_POST['1'])) {
	$id= $_POST['id'];
	$sql = "UPDATE drive SET hide=1 WHERE id='$id'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['2'])) {
	$id= $_POST['id'];
	$sql = "DELETE FROM drive WHERE id='$id'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['3'])) {
	$id= $_POST['id'];
	$sql = "UPDATE hajj SET hide=1 WHERE id='$id'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['4'])) {
	$id= $_POST['id'];
	$sql = "DELETE FROM hajj WHERE id='$id'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['54d'])) {
	$id= $_POST['id'];
	$sql = "DELETE FROM daily WHERE id='$id'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['d54'])) {
	$id= $_POST['id'];
	$sql = "SELECT * FROM dhar_din WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
	$user = $row['user'];
	$phone = $row['phone'];
	$sql = "DELETE FROM dhar_din WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$sql = "DELETE FROM dhar_din_copy WHERE user='$user' AND phone='$phone'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}
if (isset($_POST['sdf'])) {
	$id= $_POST['id'];
	$sql = "SELECT * FROM dhar_nin WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
	$user = $row['user'];
	$phone = $row['phone'];
	$sql = "DELETE FROM dhar_nin WHERE user='$user' AND phone='$phone'";
	$m = mysqli_query($db,$sql);
	$sql = "DELETE FROM dhar_nin_copy WHERE user='$user' AND phone='$phone'";
	if (mysqli_query($db,$sql)) {
		$code = ["1","Successfully Deleted"];
	} else {
		$code = ["2","Failed to Delete"];
	}
	echo json_encode($code);
}

?>