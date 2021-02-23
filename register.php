
<?php include 'db.php'; ?>
<?php if (isset($_SESSION['ms'])) {
	header("Location: dashboard");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: content-box;
}
body {
  background: rgba(237,240,241,.3);
}
.simple_login_box {
  margin: 0 auto;
  max-width: 400px;
  margin-top: 15%;
  opacity: 1;
  animation: s .2s;
}
@keyframes s {
	from {
		opacity: 0;
	}
	to {
		opacity: 1;
	}
}
.login_header img {
  width: 80px;
  position: absolute;
  margin-top: -100px;
  margin-left: -40px;
  border-radius: 100%;
}
.login_header {
  text-align: center;
  overflow: hidden;
}
.login_form {
  background: white; 
  border: 1px solid #ccc;
  padding: 2%;
  padding-top: 10px;
  color: rgb(70,70,70);
  font: 17px arial;
  overflow: hidden;
}
.login_form label {
  display: block;
  margin-top: 5px;
  margin-bottom: 5px;
  color: rgb(70,70,70);
}
.login-input {
  padding: 5px 4px;
  font: 25px arial;
  width: 98%;
  border: 1px solid #ccc;
  color: rgb(80,80,80);
}
.login-button {
  color: black;
  border: 1px solid #ccc;
  background: linear-gradient(#38E3E5,#19F1FF);
  padding: 10px 10px;
  margin-top: 5px;
  width: 95%;
  margin: 10px auto;
  font: 17px arial;
}
.login-button:hover {
  cursor: pointer;
  background: #38E3E5;
  color: blue;
}
.login-button:focus {
  box-shadow: 0px 0px 1px 1px rgb(20,20,200);
}
.login-input:focus {
  border: 1px solid rgb(20,100,200);
  box-shadow: 0px 0px 1px 1px rgb(0,100,160);
}
div.information_box {
  clear: both;
  display: block;
}
div.information_box a {
  color: rgb(0,70,200);
  display: block;
  padding: 2% 0%;
}
div.information_box a:hover {
  color: rgb(220,70,200);
}

@media(max-width:700px){
  .simple_login_box {
    margin-top: 30%;
    max-width: 80%;

  }
}
	</style>
</head>
<body>
	<div class="main_content">
		<div class="simple_login_box">
			<div class="login_header" style="margin-top: -50px; color: #555; font-family: cursive;">
				<h1>Register</h1> <br>
			</div>
			<div class="login_description">
<?php 
$fst_name = '';
$email = '';
$password = '';
$rpassword = '';
$apassword = '';
if (isset($_POST['fst_name'])) {
	$fst_name = $_POST['fst_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$rpassword = $_POST['rpassword'];
	$apassword = $_POST['apassword'];
date_default_timezone_set("Asia/Dhaka");
$datetime = date("Y-m-d H:i:s");
$profile = date("YmdHis");
$sql = "SELECT * FROM user WHERE role=2";
$m = mysqli_query($db,$sql);
$g = mysqli_num_rows($m);
if ($g==0) {
	$role = 2;
} else {
	$role = 1;
}
if ($role == 1) {
	$mo = mysqli_fetch_array($m);
	if ($mo['pass']!=md5($apassword)) {
		echo "Wrong Admin Password.";
		$error = 1;
	} else {
		$error = 0;
	}
}else{
	$error = 0;
}
if ($error==0) {
	$sql = "SELECT * FROM user WHERE email='$email'";
	$q = mysqli_query($db,$sql);
	if (mysqli_num_rows($q)!=0) {
		echo "Already Have an account on your email or phone number. <a href='recover.php'>forget password?</a>";
	} else if($password!=$rpassword){
		echo "Both Password Didn't Match";
	} else {
		$password=md5($password);
		$sql = "INSERT INTO `user` (`user`, `email`, `pass`, `role`, `ms`, `date`) VALUES ('$fst_name', '$email', '$password', '$role', '$profile', '$datetime')";
		if (!mysqli_query($db,$sql)) {
			echo "Failed to Create Your account !";
		} else {
			header("Location: login.php?msg=account creation success ! Login to go on !");
		}
	}
}

}

?>
			</div>
			<div class="login_form">
				<form action="" method="POST">
					<div class="partition_dav">
						<label for="fst_name">First Name</label>
						<input type="text" class="login-input" autocomplete="off" id="fst_name" name="fst_name" value="<?php echo $fst_name; ?>">
					</div>
					<div class="partition_dav">
						<label for="email">Email Or Phone Number</label>
						<input type="text" class="login-input" autocomplete="off" id="email" name="email" value="<?php echo $email; ?>">
					</div>
					<div class="partition_dav">
						<label for="password">Your Password</label>
						<input type="password" class="login-input" autocomplete="off" id="password" name="password" value="<?php echo $password; ?>">
					</div>
					<div class="partition_dav">
						<label for="rpassword">Retype Password</label>
						<input type="password" class="login-input" id="rpassword" autocomplete="off" name="rpassword" value="<?php echo $rpassword; ?>">
					</div>
					<div class="partition_dav">
						<label for="rpassword">Admin Password</label>
						<input type="password" class="login-input" id="apassword" autocomplete="off" name="apassword" value="">
					</div>

					<div class="partition_dav">
						<input type="submit" value="Create Account" name="submit" class="login-button">
					</div>
					<div class="information_box">
						<a href="login.php">Already Have an account?</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>