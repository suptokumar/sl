<?php 
include '../db.php';
if (isset($_POST['1'])) {
  $id = $_POST['id'];
  $serial = $_POST['serial'];
  $issue_date = $_POST['issue_date'];
  $dctb = $_POST['dctb'];
  $dctb_date = $_POST['dctb_date'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $class = $_POST['class'];
  $r_name = $_POST['r_name'];
  $r_phone = $_POST['r_phone'];
  $type = $_POST['type'];
  $total = $_POST['total'];
  $paid = $_POST['paid'];
  $file_brta = $_POST['file_brta'];
  $ref_number = $_POST['ref_number'];
  $description = $_POST['description'];
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
$sql = "SELECT * FROM drive WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$gid = $row['g_id'];
$total_amount = $row['total_amount'];
$paid_amount = $row['paid_amount'];




$sql = "UPDATE `drive_copy` SET `serial`='$serial',`issue`='$issue_date',`DCTB`='$dctb',`DCTB_date`='$dctb_date',`name`='$name',`phone`='$phone',`r_name`='$r_name',`r_phone`='$r_phone',`type`='$type',`v_class`='$class' WHERE g_id='$gid' AND `serial`!=''";
mysqli_query($db,$sql);
$change = 0;
$des = "Edited By $adder .";
if ($total!=$total_amount) {
	$change = 1;
$des.= "Total Amount changed $total_amount Taka to  $total  Taka.";
}
if ($paid!=$paid_amount) {
	$change = 1;
$des .= "Paid Amount changed $paid_amount Taka to  $paid Taka.";
}



$sql = "SELECT * FROM drive_copy WHERE g_id='$gid' and `serial`!='' ORDER BY id DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$riw = mysqli_fetch_array($m);
$last_paid = $riw['paid_amount'];
$last_total = $riw['total_amount'];

$t = ($last_total)-(($total_amount)-($total));
$s = ($last_paid)-(($paid_amount)-($paid));

$sql = "UPDATE `drive_copy` SET total_amount='$t',paid_amount='$s' WHERE g_id='$gid' and `serial`!='' ORDER BY id DESC LIMIT 1";
mysqli_query($db,$sql);







$sql = "UPDATE `drive` SET `serial`='$serial',`issue`='$issue_date',`DCTB`='$dctb',`DCTB_date`='$dctb_date',`name`='$name',`phone`='$phone',`r_name`='$r_name',`r_phone`='$r_phone',`type`='$type',`v_class`='$class',`total_amount`='$total',`paid_amount`='$paid',`description`='$description',`hide`=0,`file_brta`='$file_brta',`driving_refference`='$ref_number' WHERE id='$id'";
if (mysqli_query($db,$sql)) {
	echo "Updated !";
}
if ($change==1) {
	
$sql = "INSERT INTO drive_copy(type,adder,description,g_id,datetime) VALUES('edited', '$adder','$des', '$gid', '$date')";
mysqli_query($db,$sql);

}
}














if (isset($_POST['2'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $passport = $_POST['passport'];
  $tracking = $_POST['tracking'];
  $type = $_POST['type'];
  $total = $_POST['total'];
  $paid = $_POST['paid'];
  $description = $_POST['description'];
  $ticket = 0;
  $visa = 0;
  $transport =0;
  $rent = 0;
  $food = 0;
  $others = 0;
  $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
$sql = "SELECT * FROM hajj WHERE id='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$gid = $row['g_id'];
$total_amount = $row['total_amount'];
$paid_amount = $row['paid_amount'];




$sql = "UPDATE `hajj_copy` SET `address`='$address',`passport`='$passport',`tracking`='$tracking',`ticket`='$ticket',`name`='$name',`phone`='$phone',`visa`='$visa',`transport`='$transport',`rent`='$rent',`food`='$food',`other`='$others',`type`='$type' WHERE g_id='$gid' AND `passport`!='' AND `phone`!=''";
mysqli_query($db,$sql);
$change = 0;
$des = "Edited By $adder .";
if ($total!=$total_amount) {
	$change = 1;
$des.= "Total Amount changed $total_amount Taka to  $total  Taka.";
}
if ($paid!=$paid_amount) {
	$change = 1;
$des .= "Paid Amount changed $paid_amount Taka to  $paid Taka.";
}



$sql = "SELECT * FROM hajj_copy WHERE g_id='$gid' and `passport`!='' AND `phone`!='' ORDER BY id DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$riw = mysqli_fetch_array($m);
$last_paid = $riw['paid_amount'];
$last_total = $riw['total_amount'];

$t = ($last_total)-(($total_amount)-($total));
$s = ($last_paid)-(($paid_amount)-($paid));

$sql = "UPDATE `hajj_copy` SET total_amount='$t',paid_amount='$s' WHERE g_id='$gid' and `passport`!='' AND `phone`!='' ORDER BY id DESC LIMIT 1";
mysqli_query($db,$sql);





$sql = "UPDATE `hajj` SET `address`='$address',`passport`='$passport',`tracking`='$tracking',`description`='$description',`ticket`='$ticket',`name`='$name',`phone`='$phone',`visa`='$visa',`transport`='$transport',`rent`='$rent',`food`='$food',`other`='$others',`total_amount`='$total',`paid_amount`='$paid',`type`='$type' WHERE id='$id'";
if (mysqli_query($db,$sql)) {
	echo "Updated !";
}
if ($change==1) {
	
$sql = "INSERT INTO hajj_copy(type,adder,description,g_id,datetime) VALUES('edited', '$adder','$des', '$gid', '$date')";
mysqli_query($db,$sql);

}
}

if (isset($_POST['10d'])) {
 $id = $_POST['id'];
 $amount = $_POST['total'];
 $name = $_POST['name'];
 $description = $_POST['description'];
 $sql = "UPDATE daily SET name='$name', amount='$amount', des='$description' WHERE id='$id'";
 mysqli_query($db,$sql);
}






if (isset($_POST['105d'])) {
 $user = $_POST['user'];
 $phones = $_POST['phones'];
 $phone = $_POST['phone'];
 $name = $_POST['name'];
 $address = $_POST['address'];
 $sql = "UPDATE dhar_din SET user='$name', phone='$phone', address='$address' WHERE  user='$user' AND phone='$phones'";
 mysqli_query($db,$sql);
 $sql = "UPDATE dhar_din_copy SET user='$name', phone='$phone', address='$address' WHERE  user='$user' AND phone='$phones'";
 mysqli_query($db,$sql);
}



if (isset($_POST['sdff0'])) {
 $user = $_POST['user'];
 $phones = $_POST['phones'];
 $phone = $_POST['phone'];
 $name = $_POST['name'];
 $address = $_POST['address'];
 $sql = "UPDATE dhar_nin SET user='$name', phone='$phone', address='$address' WHERE  user='$user' AND phone='$phones'";
 mysqli_query($db,$sql);
 $sql = "UPDATE dhar_nin_copy SET user='$name', phone='$phone', address='$address' WHERE  user='$user' AND phone='$phones'";
 mysqli_query($db,$sql);
}



if (isset($_POST['sdtdvbb'])) {
 $total_amount = $_POST['total_amount'];
 $paid_amount = $_POST['paid_amount'];
 $des = $_POST['des'];
 $id = $_POST['id'];
   $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
$sql = "SELECT * FROM dhar_nin WHERE gid='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$paid = $row['paid'];
$change = ($paid)-($paid_amount);

$total = $row['amount'];
$changes = ($total)-($total_amount);


$sql = "SELECT * FROM dhar_nin_copy WHERE gid='$id' and user!='' and phone!='' ORDER BY id DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$paid = $row['paid'];
$ch = ($paid)-($change);

$total = $row['amount'];
$chd = ($total)-($changes);



 $sql = "UPDATE dhar_nin SET paid='$paid_amount',amount='$total_amount', des='$des' WHERE  gid='$id'";
 mysqli_query($db,$sql);
 $sql = "UPDATE dhar_nin_copy SET paid='$ch',amount='$chd', des='$des' WHERE gid='$id' and user!='' and phone!='' ORDER BY id DESC LIMIT 1";
 mysqli_query($db,$sql);

 $sql = "INSERT INTO dhar_nin_copy(paid,amount,des,gid,date,adder) VALUES('$paid_amount','$total_amount','$des','$id','$date','$adder')";
 mysqli_query($db,$sql);
}





if (isset($_POST['5sdf0d'])) {
 $total_amount = $_POST['total_amount'];
 $paid_amount = $_POST['paid_amount'];
 $des = $_POST['des'];
 $id = $_POST['id'];
   $adder = user_detail("user",$ms);
  $date = date("Y-m-d H:i:s");
$sql = "SELECT * FROM dhar_din WHERE gid='$id'";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$paid = $row['paid'];
$change = ($paid)-($paid_amount);

$total = $row['amount'];
$changes = ($total)-($total_amount);


$sql = "SELECT * FROM dhar_din_copy WHERE gid='$id' and user!='' and phone!='' ORDER BY id DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$row = mysqli_fetch_array($m);

$paid = $row['paid'];
$ch = ($paid)-($change);

$total = $row['amount'];
$chd = ($total)-($changes);



 $sql = "UPDATE dhar_din SET paid='$paid_amount',amount='$total_amount', des='$des' WHERE  gid='$id'";
 mysqli_query($db,$sql);
 $sql = "UPDATE dhar_din_copy SET paid='$ch',amount='$chd', des='$des' WHERE gid='$id' and user!='' and phone!='' ORDER BY id DESC LIMIT 1";
 mysqli_query($db,$sql);

 $sql = "INSERT INTO dhar_din_copy(paid,amount,des,gid,date,adder) VALUES('$paid_amount','$total_amount','$des','$id','$date','$adder')";
 mysqli_query($db,$sql);
}



if (isset($_POST['s41df1'])) {
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM pass ORDER BY id DESC LIMIT 1";
  $m = mysqli_query($db,$sql);
  $r = mysqli_fetch_array($m);
  if ($r['pass']!=$pass) {
    echo "Wrong Password.";
    exit();
  }
  $sql = "UPDATE hajj_cost SET hide=1 WHERE hide=0";
  mysqli_query($db,$sql);
  $sql = "UPDATE hajj SET hide=1 WHERE hide=0";
  if (mysqli_query($db,$sql)) {
    echo "Success";
  }else {
    echo "Failed. Please Try Again.";
  }
}



if (isset($_POST['a4410sdfe'])) {
  $old_pass = $_POST['oli'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM pass ORDER BY id DESC LIMIT 1";
  $m = mysqli_query($db,$sql);
  $r = mysqli_fetch_array($m);
  if ($r['pass']!=$old_pass) {
    echo "Wrong Old Password.";
    exit();
  }
  $sql = "INSERT INTO pass(pass) VALUES('$password')";
  if (mysqli_query($db,$sql)) {
    echo "Success";
  }else {
    echo "Failed. Please Try Again.";
  }
}

if (isset($_POST['dsgasdf'])) {
  $amount = $_POST['amount'];
  $des = $_POST['des'];
  $type = $_POST['type'];
  $date = date("Y-m-d H:i:s");
  $sql = "INSERT INTO `hajj_cost` (`id`, `type`, `amount`, `des`, `date`, `hide`) VALUES (NULL, '$type', '$amount', '$des', '$date', '0') ";
  if (mysqli_query($db,$sql)) {
    echo "Success";
  }else {
    echo "Failed. Please Try Again.";
  }
}

if (isset($_POST['d64d54d1'])) {
  $amount = $_POST['amount'];
  $des = $_POST['des'];
  $type = $_POST['type'];
  $donoe = $_POST['donoe'];
  $date = date("Y-m-d H:i:s");
  $sql = "UPDATE hajj_cost SET amount='$amount',type='$type',des='$des' WHERE id='$donoe'";
  if (mysqli_query($db,$sql)) {
    echo "Success";
  }else {
    echo "Failed. Please Try Again.";
  }
}


if (isset($_POST['asdggt'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM hajj_cost WHERE id='$id'";
  if (mysqli_query($db,$sql)) {
    echo "Success";
  }else {
    echo "Failed. Please Try Again.";
  }
}
?>