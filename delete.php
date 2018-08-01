	
<?php  

include 'config.php';

if (isset($_GET["id"])) {

	echo "";

	$id = $_GET['id'];

	$itemsql = "SELECT * FROM orderdetails WHERE detailID='$id'";

	$itemres = $conn->query($itemsql);

	$numrows = $itemres->num_rows;

	if($numrows == 0) {

	echo "<script type='text/javascript'>alert('Query Failed');window.location='showcart.php';</script>";
	}

	$itemrow = $itemres->fetch_assoc();

	$prodsql = "SELECT productPrice FROM products WHERE productID='".$itemrow['detailProductID']."'";

	$prodres = $conn->query($prodsql);

	$prodrow = $prodres->fetch_assoc();

	$sql = "DELETE FROM orderdetails WHERE detailID='$id'";

	$del= $conn->query($sql);

	if($del){

		echo "<script type='text/javascript'>alert('Product have been removed from your cart');window.location='showcart.php';</script>";	

	}
}
?>