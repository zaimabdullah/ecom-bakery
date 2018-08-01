<?php  

session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}
include "config.php";

$query = "SELECT * FROM orders WHERE status=1";
$sendquery = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Orders - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.container {width: 80%;margin: 10px 180px;}
		.navigation {width: 30%;margin-right: 40px;}
		.menu {margin: 80px 100px;}
		.form {width: 55%;margin-left: 40px;}
		.view-form {margin: 20px;width: 95%;}
		th {background-color: black;color: white;}
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
					<center><h2><b>Menu</b></h2></center>
					<br>
					<center><a href="productentry.php">Product Entry</a></center>
					<center><a href="vieworders.php">View Orders</a></center>
					<center><a href="productlist.php">View Products</a></center>
					<br>
					<center><a href="logout.php"><input type="submit" name="logout-btn" value="Logout"></a></center>
				</div>
			</div>
			<div class="form">
				<div class="view-form">
					<center><h2><b>View Order</b></h2></center>
					<table border="1" width="100%">
						<tr>
							<th>Name</th><th>Contact</th><th>Address</th><th width="30%">Product</th><th>Cost</th>
						</tr>
						<?php
						 foreach ($sendquery as $data) {
							$userID = $data["orderUserID"];
							$queryusers = "SELECT * FROM users WHERE userID={$userID}";
							$sendqueryusers = $conn->query($queryusers);		
						 	while ($row = $sendqueryusers->fetch_array()) {
						 		$orderID = $data["orderID"];
						 		$querydetails = "SELECT products.*, orderdetails.*, orderdetails.detailID AS itemid FROM products, orderdetails 
											WHERE orderdetails.detailProductID =products.productID AND detailOrderID = '$orderID'";
								$sendquerydetails = $conn->query($querydetails); 
						?>
							<tr>
								<td><?php echo $row["userFirstName"] ." ". $row["userLastName"] ?></td>
								<td><?php echo $row["userPhone"] ?></td>
								<td><?php echo $row["userAddress"] ?></td>
								<td>
									<?php 
										while ($item = $sendquerydetails->fetch_array()) {
											echo $item["productName"]."<br>";
										}	 
									?>	
								</td>
								<td><?php echo $data["total"] ?></td>
							</tr>
						<?php } } ?>
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