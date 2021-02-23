<?php include 'db.php'; ?>
<?php if (isset($_SESSION['ms'])) {
  header("Location: dashboard");
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Recover</title>
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
  color: rgb(244,255,255);
  border: 1px solid #ccc;
  background: linear-gradient(rgb(20,20,200),rgb(30,30,160));
  padding: 10px 10px;
  float: right;
  margin-top: 5px;
}
.login-button:hover {
  cursor: pointer;
  background: blue;
  color: black;
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
        <h1>Login</h1> <br>
			</div>
			<div class="login_form">
				<form action="login.form.php">
					<div class="partition_dav">
						<label for="email">Email or Phone Number</label>
						<input type="text" class="login-input" id="email" name="email">
					</div>

					<div class="partition_dav">
						<input type="submit" value="Get Code" name="submit" class="login-button">
					</div>
					<div class="information_box">
						<a href="login.php">Try to Log In</a>
						<a href="register.php">Create New Account</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>