<?php  

session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}

include "config.php";

$query = "SELECT * FROM products";
$sendquery = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Product List - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.navigation {margin: 10px 90px;width: 22%;} 
		.back-to-index {margin: 50px 100px;width: 10%;}
		.form {width: 80%;} 
		.product-list {margin: 20px 5px;width: 100%;}
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
				<div class="back-to-index">
					<a href="productentry.php"><input type="submit" name="back-btn" value="Back"></a>
				</div>
			</div>
			<div class="form">
				<div class="product-list">
					<table border="1" width="100%">
						<tr>
							<td>Product Name</td>
							<td>Short Desc</td>
							<td>Full Desc</td>
							<td>Price</td>
							<td>Product Category</td>
							<td>Action</td>
						</tr>
						<?php while ($row = $sendquery->fetch_array()) { ?>
						<tr>
							<td><?php echo $row["productName"] ?></td>
							<td><?php echo $row["productShortDesc"] ?></td>
							<td><?php echo $row["productLongDesc"] ?></td>
							<td><?php echo $row["productPrice"] ?></td>
							<td>
								<?php  
									if ($row["productCategoryID"] == 1) {
										echo "cakes";
									} else if ($row["productCategoryID"] == 2) {
										echo "cookies";
									} else if ($row["productCategoryID"] == 3) {
										echo "breads";
									} else if ($row["productCategoryID"] == 4) {
										echo "Cup Cake";
									} else if ($row["productCategoryID"] == 5) {
										echo "Pizza";
									} else if ($row["productCategoryID"] == 6) {
										echo "Arabian Bread";
									}
								?>	
							</td>
							<td><a href="productviewedit.php?id=<?php echo $row["productID"]; ?>" style="margin-right: 10px;">Update</a><a href="deleteproduct.php?id=<?php echo $row["productID"]; ?>">Delete</a></td>
						</tr>
						<?php } ?>
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