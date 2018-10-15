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

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration -  Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.navigation {margin: 10px 90px;width: 22%;} 
		.back-to-index {margin: 50px 110px;width: 10%;}
		.form {width: 55%;margin-left: 20px;} 
		.register-form {margin: 0 20%;width: 100%;}
		tr {height: 40px;}
	</style>
	<script type="text/javascript">
		function Check() 
		{
			var firstname = document.myForm.firstname.value;
			var lastname = document.myForm.lastname.value;
			var email = document.myForm.email.value;
			var phone = document.myForm.phone.value;
			var password = document.myForm.password.value;

			if (firstname == null || firstname == "") 
			{
				alert("Please insert your first name");
				document.myForm.firstname.focus();
				return false;
			} 
			if (lastname == null || lastname == "") 
			{
				alert("Please insert your last name");
				document.myForm.lastname.focus();
				return false;
			} 
			if (email == null || email == "") 
			{
				alert("Please insert your email");
				document.myForm.email.focus();
				return false;
			}
			var atpos = email.indexOf("@"); /*check email format*/
			var dotpos = email.lastIndexOf(".");
			if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
				alert("Not a valid Email Format");
				document.myForm.email.focus();
				return false;
			}
			if (phone == null || phone == "") 
			{
				alert("Please insert your contact number");
				document.myForm.phone.focus();
				return false;
			} 
			if (password == null || password == "") 
			{
				alert("Please insert your password");
				document.myForm.password.focus();
				return false;
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
			<div class="navigation">
				<div class="back-to-index">
					<a href="index.php"><input type="submit" name="back-btn" value="Back"></a>
				</div>
			</div>
			<div class="form">
				<div class="register-form">
					<form name="myForm" onsubmit="return Check()" action="registration.php" method="post">
						<table>
							<tr>
								<td colspan="2"><h2><b>Register</b></h2></td>
							</tr>
							<tr>
								<td colspan="2">All fields marked * are compulsory</td>
							</tr>
							<tr>
								<td>First Name</td><td><input type="text" name="firstname"> *</td>
							</tr>
							<tr>
								<td>Last Name</td><td><input type="text" name="lastname"> *</td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>
									<select name="gender">
										<option value="m">Male</option>
										<option value="f">Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Email</td><td><input type="text" name="email"> *</td>
							</tr>
							<tr>
								<td>Contact No</td><td><input type="text" name="phone"> *</td>
							</tr>
							<tr>
								<td>City</td><td><input type="text" name="city"></td>
							</tr>
							<tr>
								<td>Address</td>
								<td>
									<textarea name="address" cols="20" rows="5" style="overflow: hidden;"></textarea>
								</td>
							</tr>
							<tr>
								<td>Password</td><td><input type="Password" name="password"> *</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="register-btn" value="Register"></td>
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
<?php 
if (isset($_POST["register-btn"])) {

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$city = $_POST["city"];
	$address = $_POST["address"];
	$password = $_POST["password"];
	$password_hash = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO users(userID, userEmail, userPassword, userFirstName, userLastName, userGender, userPhone, userCity, userAddress, userStatus)
				VALUES('', '$email', '$password_hash', '$firstname', '$lastname', '$gender', '$phone', '$city', '$address', default)";
	$sendquery = $conn->query($query);
	if($sendquery) {
		echo "<script type='text/javascript'>alert('Register Success');window.location='index.php';</script>"; /*javascript syntax for auto redirect page*/

	} else {
		echo "<script type='text/javascript'>alert('Query Failed');</script>";
	}			
}

?>