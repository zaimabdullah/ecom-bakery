<?php  
session_start();

if (isset($_SESSION["userID"]) && $_SESSION["userID"] == true) {
	if ($_SESSION["status"] == 2) {
		header("Location:productentry.php");
	} else {
		header("Location:home.php");
	}
}

include "config.php";
if (isset($_POST["login-btn"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$query = "SELECT * FROM users WHERE userEmail='".$username."' AND userPassword='".$password."'";
	$sendquery = $conn->query($query);
	$numrow = $sendquery->num_rows;
	if ($numrow > 0) {
		$data = $sendquery->fetch_assoc();
		$_SESSION["status"] = $data["userStatus"];
		$_SESSION["userID"] = $data["userID"];
		$_SESSION["userName"] = $data["userFirstName"];

		$queryorder = "SELECT orderID FROM orders WHERE orderUserID='".$data["userID"]."' AND status < 1";
		$sendqueryorders = $conn->query($queryorder);
		$dataorders = $sendqueryorders->fetch_assoc();
		$_SESSION["orderNumber"] = $dataorders["orderID"]; /*pegang order ID yang status < 2 untuk customer yang sedang login kalau ada order*/
 		if ($_SESSION["status"] == 2) {
			echo "<script type='text/javascript'>alert('Login Success');window.location='productentry.php';</script>";
			/*header("Location:#");*/
		} else {
			echo "<script type='text/javascript'>alert('Login Success');window.location='home.php';</script>";
			/*header("Location:home.php"); PHP syntax for auto redirect page*/
		}	
	} else {
		echo "<script type='text/javascript'>alert('Invalid email or password, please enter again');window.location='index.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.blank {margin: 10px 90px;width: 22%;} 
		.form {width: 55%;margin-left: 20px;} 
		.login-form {margin: 0 200px;width: 45%;}
		#table2 tr {height: 25px;}
	</style>
	<script type="text/javascript">
		function Show() {
			var x = document.myForm.password;

			if (x.type == "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</head>
<body>
	<div class="wrapper">
		<table id="table1" width="80%">
		 	<tr>
		 		<td><img src="img/BakeryMenu_2bb.jpg" alt="Bakery main banner" id="banner"></td>
		 	</tr>
		</table>
		<div class="container">
		 	<div class="blank">
		 		<img src="img/white.jpg" alt="white space">
		 	</div>
		 	<div class="form">
		 		<div class="login-form">
		 			<form name="myForm" action="index.php" method="post">
			 			<table id="table2">
			 				<tr>
			 					<td colspan="3"><h2><b>Login</b></h2></td>
			 				</tr>
			 				<tr>
			 					<td>Email</td><td><input type="text" name="username" autofocus></td><td></td>
			 				</tr>
			 				<tr>
			 					<td>Password</td><td><input type="Password" name="password"></td><td><input type="checkbox" name="show" onclick="Show()">Show</td>
			 				</tr>
			 				<tr>
			 					<td></td><td><input type="submit" name="login-btn" value="Login"></td>
			 				</tr>
			 				<tr>
			 					<td colspan="3">New User ? <a href="registration.php">Register Here</a></td>
			 				</tr>
			 			</table>
			 		</form>
		 		</div>
		 	</div>
		</div>
		<div class="footer">
		 	<div class="info">
		 		<h4><b><i>Darling Bakery</i></b></h4>
		 	</div>
		</div>
	</div>
</body>	
</html>