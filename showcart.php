<?php  

include "config.php";
include "functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Cart - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.navigation {margin: 10px 90px;width: 22%;} 
		.back-to-index {margin: 50px 110px;width: 10%;}
		.form {width: 55%;margin-left: 20px;} 
		.cart-form {margin: 0 200px;width: 45%;}
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
					<a href="home.php"><input type="submit" name="back-btn" value="Back" title="Home Page"></a>
				</div>
			</div>
		 	<div class="form">
		 		<div class="cart-form">
		 			<h3><center>Your Cart</center></h3>
		 			<?php showcart() ;?>
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