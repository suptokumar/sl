
<?php include 'db.php'; ?>
		
<?php if (isset($_SESSION['ms'])) {
	header("Location: dashboard");
} ?>
<?php 


if (isset($_POST['email'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pass = md5($password);
	$sql = "SELECT * FROM user WHERE  email='$email'";
	$q = mysqli_query($db,$sql);
	if (mysqli_num_rows($q)!=0) {
		
	$sql  = "SELECT * FROM user WHERE email='$email' and pass='$pass'";
	$q = mysqli_query($db,$sql);
	if (mysqli_num_rows($q)!=0) {
		$row = mysqli_fetch_array($q);
		echo $profile = $row['ms'];
		$_SESSION['ms'] = $profile;
		if (isset($_GET['redirect'])) {
			$link = $_GET['redirect'];
			header("Location: ".$link);
		} else {
			header("Location: dashboard");
		}
	} else {
		header("Location: login.php?msg=Password not Matched With the Email or Phone Number.");
	}
	} else {
		header("Location: login.php?msg=Wrong Password. <a href='recover.php'>Recover Password</a>");
	}
}








?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
  max-width: 350px;
  margin-top: 18%;
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
<script src="js/jquery.js"></script>
<script src="ui/jquery-ui.min.js"></script>
<link rel="stylesheet" href="ui/jquery-ui.min.css">
</head>
<body>
	<?php 
	if (isset($_GET['msg'])) {
	 	?>

	<script>
		$(document).ready(function() {
		$(".msg_corner").dialog({
			title: "success",
			open: true,
			modal: true,
			buttons:{
				"ok":function(){
					$(this).dialog("close");
				}
			}
		});	
		});
	</script>
	<div class="msg_corner" style="display: none;"><?php echo $_GET['msg']; ?></div>
	 	<?php
	 } ?>
	<div class="main_content">
		<div class="simple_login_box">
			<div class="login_header" style="margin-top: -50px; color: #555; font-family: cursive;">
				<h1>Login</h1> <br>
			</div>
			<div class="login_form">
				<?php if (isset($_GET['msg'])) {
					?>
<p style="color: green"><?php echo $_GET['msg'] ?></p>
					<?php
				} ?>
				<form action="" method="POST">
					<div class="partition_dav">
						<label for="email">Email or Phone Number</label>
						<input type="text" autocomplete="off" class="login-input" id="email" name="email">
					</div>
					<div class="partition_dav">
						<label for="password">Your Password</label>
						<input type="password" autocomplete="off" class="login-input" id="password" name="password">
					</div>

					<div class="partition_dav">
						<input type="submit" value="Log in" name="submit" class="login-button">
					</div>
					<div class="information_box">
						<a href="recover.php">Recover Your Password</a>
						<a href="register.php">Create New Account</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>