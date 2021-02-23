
<?php 
include '../db.php';
if (isset($_POST['1'])) {
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$sql = "SELECT * FROM drive WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
$g_id = $row['g_id'];
$serial = $row['serial'];
$issue = $row['issue'];
$DCTB_date = $row['DCTB_date'];
$DCTB = $row['DCTB'];
$name = $row['name'];
$phone = $row['phone'];
$r_name = $row['r_name'];
$r_phone = $row['r_phone'];
$type = $row['type'];
$v_class = $row['v_class'];
$description = $row['description'];
$total_amount = $row['total_amount'];
$paid_amount = $row['paid_amount'];
$adder = user_detail("user",$ms);
$date = date("Y-m-d H:i:s");
$amount_update = ($row['paid_amount'])+($amount);
$sql = "UPDATE drive SET paid_amount='$amount_update' WHERE id='$id'";
mysqli_query($db,$sql);

$sql = "INSERT INTO `drive_copy` (`serial`, `issue`, `DCTB`, `DCTB_date`, `name`, `phone`, `r_name`, `r_phone`, `type`, `v_class`, `total_amount`, `paid_amount`, `description`, `hide`, `datetime`, `adder`, `pre`, `new`, `g_id`) VALUES ('$serial', '$issue', '$DCTB', '$DCTB_date', '$name', '$phone', '$r_name', '$r_phone', '$type', '$v_class', '$total_amount', '$amount', '$description', '0', '$date', '$adder', '$paid_amount', '1', '$g_id') ";
if (mysqli_query($db,$sql)) {
	echo "Collected !";
}
}





if (isset($_POST['2'])) {
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$sql = "SELECT * FROM hajj WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
$g_id = $row['g_id'];
$address = $row['address'];
$passport = $row['passport'];
$tracking = $row['tracking'];
$ticket = $row['ticket'];
$visa = $row['visa'];
$transport = $row['transport'];
$rent = $row['rent'];
$food = $row['food'];
$other = $row['other'];
$name = $row['name'];
$phone = $row['phone'];
$type = $row['type'];
$description = $row['description'];
$total_amount = $row['total_amount'];
$paid_amount = $row['paid_amount'];
$adder = user_detail("user",$ms);
$date = date("Y-m-d H:i:s");
$amount_update = ($row['paid_amount'])+($amount);
$sql = "UPDATE hajj SET paid_amount='$amount_update' WHERE id='$id'";
mysqli_query($db,$sql);

$sql = "INSERT INTO `hajj_copy` (`id`, `name`, `address`, `phone`, `passport`, `tracking`, `type`, `total_amount`, `paid_amount`, `description`, `ticket`, `visa`, `transport`, `rent`, `food`, `other`, `hide`, `new`, `g_id`, `adder`, `datetime`, `pre`) VALUES (NULL, '$name', '$address', '$phone', '$passport', '$tracking', '$type', '$total_amount', '$amount', '$description', '$ticket', '$visa', '$transport', '$rent', '$food', '$other', '0', '1', '$g_id', '$adder', '$date', '$paid_amount')";
if (mysqli_query($db,$sql)) {
	echo "Collected !";
}
}




if (isset($_POST['1d'])) {
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$sql = "SELECT * FROM dhar_din WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
$gid = $row['gid'];
$user = $row['user'];
$phone = $row['phone'];
$address = $row['address'];

$ts = total_paid($user,$phone);

$adder = user_detail("user",$ms);
$date = date("Y-m-d H:i:s");

$sql = "SELECT SUM(amount-paid) FROM dhar_din WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

$row=mysqli_fetch_array($m);
$dues = $row[0];


$sql = "SELECT * FROM dhar_din WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

$taka = ($amount)*1;
while ($row=mysqli_fetch_array($m)) {
	$due = ($row['amount'])-($row['paid']);
	$gid = $row['gid'];

	if ($due<$taka) {
		$taka = ($taka)-($due);
		$sql = "UPDATE dhar_din SET paid=amount WHERE gid='$gid'";
		mysqli_query($db,$sql);
	}
	if ($due==$taka) {
		$sql = "UPDATE dhar_din SET paid=amount WHERE gid='$gid'";
		mysqli_query($db,$sql);
		continue;
	}
	if ($due>$taka) {
		$update = ($row['paid'])+($taka);
		$sql = "UPDATE dhar_din SET paid='$update' WHERE gid='$gid'";
		mysqli_query($db,$sql);
		continue;
	}
}
$sql = "INSERT INTO dhar_din_copy(user,phone,address,amount,paid,date,adder,new,pre) VALUES('$user','$phone','$address','$dues','$amount','$date','$adder','1','$ts')";
if(mysqli_query($db,$sql)){
	echo "Collected !";
}
}



if (isset($_POST['100d'])) {
	$id=$_POST['id'];
	$amount=$_POST['amount'];
	$sql = "SELECT * FROM dhar_nin WHERE id='$id'";
	$m = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($m);
$gid = $row['gid'];
$user = $row['user'];
$phone = $row['phone'];
$address = $row['address'];

$ts = total_paid($user,$phone);

$adder = user_detail("user",$ms);
$date = date("Y-m-d H:i:s");

$sql = "SELECT SUM(amount-paid) FROM dhar_nin WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

$row=mysqli_fetch_array($m);
$dues = $row[0];


$sql = "SELECT * FROM dhar_nin WHERE user='$user' AND phone='$phone'";
$m = mysqli_query($db,$sql);

$taka = ($amount)*1;
while ($row=mysqli_fetch_array($m)) {
	$due = ($row['amount'])-($row['paid']);
	$gid = $row['gid'];

	if ($due<$taka) {
		$taka = ($taka)-($due);
		$sql = "UPDATE dhar_nin SET paid=amount WHERE gid='$gid'";
		mysqli_query($db,$sql);
	}
	if ($due==$taka) {
		$sql = "UPDATE dhar_nin SET paid=amount WHERE gid='$gid'";
		mysqli_query($db,$sql);
		continue;
	}
	if ($due>$taka) {
		$update = ($row['paid'])+($taka);
		$sql = "UPDATE dhar_nin SET paid='$update' WHERE gid='$gid'";
		mysqli_query($db,$sql);
		continue;
	}
}
$sql = "INSERT INTO dhar_nin_copy(user,phone,address,amount,paid,date,adder,new,pre) VALUES('$user','$phone','$address','$dues','$amount','$date','$adder','1','$ts')";
if(mysqli_query($db,$sql)){
	echo "Collected !";
}
}
?>