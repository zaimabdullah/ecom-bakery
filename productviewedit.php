<?php 
session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}
include "config.php";

$id = $_GET["id"];

$queryproduct = "SELECT * FROM products WHERE productID='".$id."'";
$send = $conn->query($queryproduct);
$data = $send->fetch_assoc();

$query = "SELECT * FROM product_categories";
$sendquery = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Entry - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.container {width: 80%;margin: 10px 180px;}
		.navigation {width: 30%;margin-right: 40px;}
		.menu {margin: 80px 100px;}
		.form {width: 55%;margin-left: 40px;}
		.product-form {margin: 20px 100px;width: 100%;}
		tr {height: 35px;}
	</style>
	<script type="text/javascript">
		function Check() {
			var productname = document.myForm.productname.value;
			var shortdesc = document.myForm.shortdesc.value;
			var longdesc = document.myForm.longdesc.value;
			var productprice = document.myForm.productprice.value;

			if (productname == null || productname == "") {
				alert("Please insert product name!");
				document.myForm.productname.focus();
				return false;
			} 
			if (shortdesc == null || shortdesc == "") {
				alert("Please insert the short description!");
				document.myForm.shortdesc.focus();
				return false;
			} 
			if (longdesc == null || longdesc == "") {
				alert("Please insert the long description!");
				document.myForm.longdesc.focus();
				return false;
			} 
			if (productprice == null || productprice == "") {
				alert("Please insert the product price!");
				document.myForm.productprice.focus();
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
				<div class="product-form">
					<form name="myForm" onsubmit="return Check()" action="productviewedit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td colspan="2"><h2><b>Product Entry</b></h2></td>
							</tr>
							<tr>
								<td>Product Name</td><td><input type="text" name="productname" value="<?php echo $data['productName'] ?>"></td>
							</tr>
							<tr>
								<td>Select Image</td><td><input type="file" name="productimage" value="<?php echo $data['productImage'] ?>"></td>
							</tr>
							<tr>
								<td>Short Description</td><td><input type="text" name="shortdesc" value="<?php echo $data['productShortDesc'] ?>"></td>
							</tr>
							<tr>
								<td>Full Description</td><td><input type="text" name="longdesc" value="<?php echo $data['productLongDesc'] ?>"></td>
							</tr>
							<tr>
								<td>Price</td><td><input type="text" name="productprice" value="<?php echo $data['productPrice'] ?>"></td>
							</tr>
							<tr>
								<td>Category</td>
								<td>
									<select name="productcategory">
										<option>
											<?php 
												if ($data["productCategoryID"] == 1) {
													echo "cakes";
												} else if ($data["productCategoryID"] == 2) {
													echo "cookies";
												} else if ($data["productCategoryID"] == 3) {
													echo "breads";
												} else if ($data["productCategoryID"] == 4) {
													echo "Cup Cake";
												} else if ($data["productCategoryID"] == 5) {
													echo "Pizza";
												} else if ($data["productCategoryID"] == 6) {
													echo "Arabian Bread";
												}	 
											?>
										</option>
										<?php foreach ($sendquery as $data) {
											echo "<option value={$data['categoryID']}>{$data['categoryName']}</option>";
										} ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td><td><input type="submit" name="submit-btn"></td>
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
if (isset($_POST["submit-btn"])) {
	
	$productid = $_GET["id"];
	$productname = $_POST["productname"];
	$productimage = $_FILES["productimage"]["name"];
	$shortdesc = $_POST["shortdesc"];
	$longdesc = $_POST["longdesc"];
	$productprice = $_POST["productprice"];
	$productcategory = $_POST["productcategory"]; 

	$query = "UPDATE products SET productCategoryID = '$productcategory', productName = '$productname', productImage = '$productimage', productShortDesc = '$shortdesc', productLongDesc = '$longdesc', productPrice = '$productprice' WHERE productID = '$productid'";
	
	$sendquery = $conn->query($query);
	
	if ($sendquery) {
		echo "<script type='text/javascript'>alert('Update Success');window.location='productlist.php';</script>";
	} else {
		echo "<script type='text/javascript'>alert('Query Failed');window.location='productentry.php';</script>";
	}			
}




?>