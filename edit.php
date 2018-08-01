<?php  
session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}

include "config.php";

$userID = $_SESSION["userID"];

$query = "SELECT * FROM users WHERE userID='$userID'";
$sendquery = $conn->query($query);
$data = $sendquery->fetch_assoc();

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
					<a href="home.php"><input type="submit" name="back-btn" value="Back"></a>
				</div>
			</div>
			<div class="form">
				<div class="register-form">
					<form name="myForm" onsubmit="return Check()" action="edit.php" method="post">
						<table>
							<tr>
								<td colspan="2"><h2><b>Register</b></h2></td>
							</tr>
							<tr>
								<td colspan="2">All fields marked * are compulsory</td>
							</tr>
							<tr>
								<td>First Name</td><td><input type="text" name="firstname" value="<?php echo $data["userFirstName"]; ?>"> *</td>
							</tr>
							<tr>
								<td>Last Name</td><td><input type="text" name="lastname" value="<?php echo $data["userLastName"]; ?>"> *</td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>
									<select name="gender">
										<option value="m" <?php if ($data["userGender"]=="m") {echo "selected";} ?>>Male</option>
										<option value="f" <?php if ($data["userGender"]=="f") {echo "selected";} ?>>Female</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Email</td><td><input type="text" name="email" value="<?php echo $data["userEmail"]; ?>"> *</td>
							</tr>
							<tr>
								<td>Contact No</td><td><input type="text" name="phone" value="<?php echo $data["userPhone"]; ?>"> *</td>
							</tr>
							<tr>
								<td>City</td><td><input type="text" name="city" value="<?php echo $data["userCity"]; ?>"></td>
							</tr>
							<tr>
								<td>Address</td>
								<td>
									<textarea name="address" cols="20" rows="5" style="overflow: hidden;"><?php echo $data["userAddress"]; ?></textarea>
								</td>
							</tr>
							<tr>
								<td>Password</td><td><input type="Password" name="password" value="<?php echo $data["userPassword"]; ?>"> *</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="update-btn" value="Update"></td>
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
if (isset($_POST["update-btn"])) {

	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$gender = $_POST["gender"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$city = $_POST["city"];
	$address = $_POST["address"];
	$password = $_POST["password"];

	$query = "UPDATE users SET userEmail='".$email."',userPassword='".$password."', userFirstName='".$firstname."', userLastName='".$lastname."', userGender='".$gender."', userPhone='".$phone."', userCity='".$city."', userAddress='".$address."' WHERE userID='".$userID."'";
	$sendquery = $conn->query($query);
	if($sendquery) {
		echo "<script type='text/javascript'>alert('Update Success');window.location='customerdetails.php';</script>"; /*javascript syntax for auto redirect page*/

	} else {
		echo "<script type='text/javascript'>alert('Query Failed');</script>";
	}			
}

?>