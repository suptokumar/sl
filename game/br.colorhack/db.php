<?php 
$db = mysqli_connect("localhost","paipixel_game","Sk571960","paipixel_game") or die("DB is not available");
$dbs = mysqli_connect("localhost","paipixel_supto","Sk571960","paipixel_real") or die("DB is not available");
if (isset($_POST['db1000112'])) {
	$score = $_POST['score'];
	$cc = $_POST['cc'];
	$user = $_POST['user'];
date_default_timezone_set("Asia/dhaka");
$date = date("Y-m-d H:i:s");
	$sql = "INSERT INTO `colorhack` (`id`, `user`, `score`, `datetime`, `cc`) VALUES (NULL, '$user', '$score', '$date', '$cc')";
	if (mysqli_query($db,$sql)) {
		echo "Submited";
	}else{
		echo "Failed";
	}
$cc = intval($cc);
$sql = "SELECT cc FROM user WHERE user_name='$user'";
$eo = mysqli_query($dbs,$sql);
$f = mysqli_fetch_array($eo);
$cc = (($cc)+($f[0]));
	$sql = "UPDATE user SET cc='$cc' WHERE user_name='$user'";
	mysqli_query($dbs,$sql);
}


if (isset($_POST['asdf45'])) {
	$user = $_POST['user'];
date_default_timezone_set("Asia/dhaka");

$sql = "SELECT score FROM colorhack WHERE user='$user' ORDER BY score DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$rv = mysqli_fetch_array($m); 

$sql = "SELECT score, user FROM colorhack ORDER BY score DESC LIMIT 1";
$m = mysqli_query($db,$sql);
$rd = mysqli_fetch_array($m); 


$sql = "SELECT id FROM user WHERE active>(DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 13 HOUR)-10)";
$m = mysqli_query($dbs,$sql);
$rvs = mysqli_num_rows($m); 

if($rv[0]==''){$rv = "0";}else{$rv = $rv[0];}
if($rd[0]==''){$rd = "No max scorer";}else{$rd = $rd[1]."(".$rd[0].")";}
echo json_encode([$rv,$rd,$rvs]);

}


if (isset($_POST['sdv45'])) {
	$v = $_POST['v'];
date_default_timezone_set("Asia/dhaka");

$sql = "SELECT *,max(score),max(cc) FROM colorhack WHERE user LIKE '%$v%' GROUP BY user ORDER BY
CASE
WHEN user = '$v' THEN 0
WHEN user LIKE '$v%' THEN 1
WHEN user LIKE '_$v%' THEN 1
WHEN user LIKE '__$v%' THEN 2
WHEN user LIKE '___$v%' THEN 3
WHEN user LIKE '____$v%' THEN 4
WHEN user LIKE '_____$v%' THEN 5
WHEN user LIKE '______$v%' THEN 6
WHEN user LIKE '_______$v%' THEN 7
WHEN user LIKE '________$v%' THEN 8
ELSE 9 END, MAX(score) DESC LIMIT 20";
$m = mysqli_query($db,$sql); 

function wp_pos($score){
	global $db;
$sql = "SELECT score,MAX(score) FROM colorhack GROUP BY user ORDER BY MAX(score) DESC";
$asdf = mysqli_query($db,$sql); 
$i = 0;
while ($r = mysqli_fetch_array($asdf)) {
	$i++;
	if ($r[1]==$score) {
		return $i;
	}
}
}


while ($rd = mysqli_fetch_array($m)) {
	$userv = $rd['user'];
$sql = "SELECT image FROM user WHERE user_name='$userv'";
$ms = mysqli_query($dbs,$sql);
$rvs = mysqli_fetch_array($ms); 
?>
				
<div class="mapblow"  onclick="open_dirg('<?php echo $rd['user'] ?>','')" style="border: 1px solid #ccc; cursor: pointer; overflow: hidden; padding: 10px 1%; background: #F7F7F7EE">
<img src="https://www.paipixel.com/<?php echo $rvs[0] ?>" alt="Image" class="map_image" style="width: 70px; float: left;">
<div style="float: left;width: 80%;padding: 0% 2%;font-weight: bold;line-height: 2;">
	<span style="float: right;">Score: <span style="color: green;"><?php if($rd['max(score)']>0){echo "+".$rd['max(score)'];}else{echo $rd['MAX(score)'];} ?></span></span>
	<a style="float: left;" href="https://www.paipixel.com/profile/<?php echo $rd['user'] ?>"><?php echo $rd['user'] ?></a><br>
	<span style="float: right;">Earned CC: <span style="color: green;"><?php if($rd['max(cc)']>0){echo "+".$rd['max(cc)'];}else{echo $rd['max(cc)'];} ?></span></span>
	<span style="color: #202020;">Overall Position: <span style="color: #FF3838;">#<?php echo wp_pos($rd['max(score)']); ?></span></span>
</div>
</div>
<?php
	
}

}





if (isset($_POST['sdaasddf'])) {
	$v = $_POST['v'];
date_default_timezone_set("Asia/dhaka");

$sql = "SELECT * FROM user WHERE active>(DATE_ADD(CURRENT_TIMESTAMP, INTERVAL 13 HOUR)-10) AND user_name LIKE '%$v%' ORDER BY
CASE
WHEN user_name = '$v' THEN 0
WHEN user_name LIKE '$v%' THEN 1
WHEN user_name LIKE '_$v%' THEN 1
WHEN user_name LIKE '__$v%' THEN 2
WHEN user_name LIKE '___$v%' THEN 3
WHEN user_name LIKE '____$v%' THEN 4
WHEN user_name LIKE '_____$v%' THEN 5
WHEN user_name LIKE '______$v%' THEN 6
WHEN user_name LIKE '_______$v%' THEN 7
WHEN user_name LIKE '________$v%' THEN 8
ELSE 9 END, active DESC";
$m = mysqli_query($dbs,$sql); 

function wp_pos($score){
	global $db;
$sql = "SELECT score,MAX(score) FROM colorhack GROUP BY user ORDER BY MAX(score) DESC";
$asdf = mysqli_query($db,$sql); 
$i = 0;
while ($r = mysqli_fetch_array($asdf)) {
	$i++;
	if ($r[1]==$score) {
		return $i;
	}
}
}


while ($rd = mysqli_fetch_array($m)) {
	$userv = $rd['user_name'];
$sql = "SELECT score,cc FROM colorhack WHERE user='$userv' ORDER BY score DESC limit 1";
$ms = mysqli_query($db,$sql);
$rvs = mysqli_fetch_array($ms); 
?>
				
<div class="mapblow"  onclick="open_dirg('<?php echo $rd['user_name'] ?>','')" style="border: 1px solid #ccc; cursor: pointer; overflow: hidden; padding: 10px 1%; background: #F7F7F7EE">
<img src="https://www.paipixel.com/<?php echo $rd['image'] ?>" alt="Image" class="map_image" style="width: 70px; float: left;">
<div style="float: left;width: 80%;padding: 0% 2%;font-weight: bold;line-height: 2;">
	<span style="float: right;">Score: <span style="color: green;"><?php if($rvs['score']>0){echo "+".$rvs['score'];}else{echo $rvs['score'];} ?></span></span>
	<a style="float: left;" href="https://www.paipixel.com/profile/<?php echo $rd['user_name'] ?>"><?php echo $rd['user_name'] ?></a><br>
	<span style="float: right;">Earned CC: <span style="color: green;"><?php if($rvs['cc']>0){echo "+".$rvs['cc'];}else{echo $rd['cc'];} ?></span></span>
	<span style="color: #202020;">Overall Position: <span style="color: #FF3838;">#<?php echo wp_pos($rvs['score']); ?></span></span>
</div>
</div>
<?php
	
}

}





if (isset($_POST['sdvasdf45'])) {
	 $v = $_POST['v'];
date_default_timezone_set("Asia/dhaka");
$user = $_POST['user'];
if ($v!='') {
$sql = "SELECT * FROM colorhack WHERE `datetime` = '$v' AND user='$user' ORDER BY score DESC LIMIT 20";
}else{
$sql = "SELECT * FROM colorhack WHERE user='$user' ORDER BY score DESC LIMIT 20";
}
$m = mysqli_query($db,$sql); 

function wp_pos($score){
	global $db;
	global $user;
$sql = "SELECT score FROM colorhack WHERE user='$user' ORDER BY score DESC";
$m = mysqli_query($db,$sql); 
$i = 0;
while ($r = mysqli_fetch_array($m)) {
	$i++;
	if ($r[0]==$score) {
		return $i;
	}
}
}


while ($rd = mysqli_fetch_array($m)) {
	$userv = $rd['user'];
$sql = "SELECT image FROM user WHERE user_name='$userv'";
$ms = mysqli_query($dbs,$sql);
$rvs = mysqli_fetch_array($ms); 
?>
				
<div class="mapblow" style="border: 1px solid #ccc; cursor: pointer; overflow: hidden; padding: 10px 1%; background: #F7F7F7EE">
<img src="https://www.paipixel.com/<?php echo $rvs[0] ?>" alt="Image" class="map_image" style="width: 70px; float: left;">
<div style="float: left;width: 80%;padding: 0% 2%;font-weight: bold;line-height: 2;">
	<span style="float: right;">Score: <span style="color: green;"><?php if($rd['score']>1){echo "+".$rd['score'];}else{echo $rd['score'];} ?></span></span>
	<a style="float: left;" href="https://www.paipixel.com/profile/<?php echo $rd['user'] ?>"><?php echo $rd['user'] ?></a><br>
	<span style="float: right;">Earned CC: <span style="color: green;"><?php if($rd['cc']>1){echo "+".$rd['cc'];}else{echo $rd['cc'];} ?></span></span>
	<span style="color: #202020;">Individual Position: <span style="color: #FF3838;">#<?php echo wp_pos($rd['score']); ?></span></span>
</div>
</div>
<?php
	
}

}

 ?>