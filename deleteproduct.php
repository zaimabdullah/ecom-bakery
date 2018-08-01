<?php  

if (isset($_GET["id"])) {
	
	include 'config.php';

	$id = $_GET["id"];

	$query = "DELETE FROM products WHERE productID='".$id."'";
	$sendquery = $conn->query($query);

	if ($sendquery) {
		echo "<script type='text/javascript'>alert('Product have been delete');window.location='productlist.php';</script>";
	} else {
		echo "<script type='text/javascript'>alert('Query Failed');window.location='productlist.php';</script>";
	}
}

?>