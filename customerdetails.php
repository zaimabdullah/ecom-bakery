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
	<title>Customer Information - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.container {width: 80%;margin: 10px 180px;}
		.navigation {width: 30%;margin-right: 40px;}
		.menu {margin: 20px 60px;}
		.form {width: 60%;margin-left: 20px;}
		.customer-info {margin: 20px 60px;width: 100%;}
		#table2 {width: 570px;height: 80px;}
	</style>
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
				<div class="menu">
					<center><h3><i>Welcome <?php echo $_SESSION["userName"]; ?></i></h3></center>
					<form action="homecategory.php" method="post">
						<center>
							<font size="3px">SELECT CATEGORIES</font>
							<select name="product-search" size="5">
							<?php  
								require "php/product_categories.php";
								foreach ($sendquerycategory as $row ) {
									echo "<option value='{$row['categoryID']}'>{$row['categoryName']}</option>";
								}
							?>
							</select><br><br>
							<input type="submit" name="search-btn" value="Search">
						</center>
					</form><br>
					<form action="homeprice.php" method="post">
						<center>
							<table>
								<tr>
									<td colspan="2"><center><font size="3px">SORT BY PRICE</font></center></td>
								</tr>
								<tr>
									<td>From</td><td><input type="text" name="from"></td>
								</tr>
								<tr>
									<td>To</td><td><input type="text" name="to"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="search-btn" value="Search"></td>
								</tr>
							</table>
						</center>
					</form>
					<br><center><a href="showcart.php" style="margin-right: 20px;">View Cart</a>
						<a href="customerdetails.php">Your Info</a><br><br>
						<a href="home.php"><input type="submit" name="back-to-allproduct" value="Back to All Product"></a><br><br>
						<a href="logout.php"><input type="submit" name="logout-btn" value="Logout"></a>
					</center>
				</div>
			</div>
			<div class="form">
				<div class="customer-info">
					<table id="table2" border="1" width="100%">
						<tr>
							<td colspan="7"><center><strong><h3>Details of <i><?php echo $data["userFirstName"]." ".$data["userLastName"];  ?></i></h3></strong></center></td>
						</tr>
						<tr>
							<td><center><strong>First Name</strong></center></td>
							<td><center><strong>Last Name</strong></center></td>
							<td><center><strong>Email</strong></center></td>
							<td><center><strong>Phone</strong></center></td>
							<td><center><strong>City</strong></center></td>
							<td><center><strong>Address</strong></center></td>
							<td><center><strong>Action</strong></center></td>
						</tr>
						<tr>
							<td><?php echo $data["userFirstName"]; ?></td>
							<td><?php echo $data["userLastName"]; ?></td>
							<td><?php echo $data["userEmail"]; ?></td>
							<td><?php echo $data["userPhone"]; ?></td>
							<td><?php echo $data["userCity"]; ?></td>
							<td><?php echo $data["userAddress"]; ?></td>
							<td><a href="edit.php">Update</a></td>
						</tr>
					</table>
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