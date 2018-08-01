<?php  
session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}

include "config.php";

if (isset($_GET["id"])) {

$id = $_GET["id"];	 
$query = "SELECT * FROM products WHERE productID='$id'";
$sendquery = $conn->query($query);
$data = $sendquery->fetch_assoc();

$categoryID = $data["productCategoryID"];
$querycategory = "SELECT * FROM product_categories WHERE categoryID='$categoryID'";
$sendquerycategory = $conn->query($querycategory);
$category = $sendquerycategory->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Details - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.navigation {margin: 10px 90px;width: 22%;} 
		.back-to-index {margin: 50px 110px;width: 10%;}
		.form {width: 55%;margin-left: 20px;} 
		.product-details {margin: 20px 10px;width: 100%;}
		.product-details img {width: 300px;height: 250px;}
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
					<a href="home.php"><input type="submit" name="back-btn" value="Back" title="Back to Product Selection"></a>
				</div>
			</div>
			<div class="form">
				<div class="product-details">
					<?php  
					if ($category["categoryID"] == 1) { 
						echo "<center><img src='img/cakes/{$data["productImage"]}' alt='product image'/></center>";
					} else if ($category["categoryID"] == 2) {
						echo "<center><img src='img/cookies/{$data["productImage"]}' alt='product image'/></center>";
					} else if ($category["categoryID"] == 3) {
						echo "<center><img src='img/breads/{$data["productImage"]}' alt='product image'/></center>";
					} else if ($category["categoryID"] == 4) {
						echo "<center><img src='img/cupcakes/{$data["productImage"]}' alt='product image'/></center>";
					} else if ($category["categoryID"] == 5) {
						echo "<center><img src='img/Pizza/{$data["productImage"]}' alt='product image'/></center>";
					} else if ($category["categoryID"] == 6) {
						echo "<center><img src='img/Arabian bread/{$data["productImage"]}' alt='product image'/></center>";
					}
					echo "<center><h4>{$data['productName']}</h4></center>";
					echo "<center><font size='2px'>OVERVIEW</font></center>
						<center><textarea id='shortdesc' cols='50' rows='5' readonly>{$data['productShortDesc']}</textarea></center><br>";
					echo "<center><font size='3px'>Cost</font></center>
						<center><font size='3px'>RM {$data['productPrice']}</font></center><br>";
					echo "<center><font size='2px'>DETAILS</font></center>
						<center><textarea id='longdesc' cols='55' rows='10' readonly>{$data['productLongDesc']}</textarea></center><br>";	
					?>
					<form name="myForm" action="addtocart.php?productID=<?php echo $id ?>" method="post"> 
						<center><input type="submit" name="order-btn" value="Order Now"></center>
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
<?php } ?>