<?php  
session_start();

include "config.php";

if (isset($_GET["productID"])) {
	
	$query = "SELECT * FROM products WHERE productID='".$_GET['productID']."'";
	$sendquery = $conn->query($query);
	$numrows = $sendquery->num_rows;
	$row = $sendquery->fetch_assoc();

	// if (isset($_POST["submit"])) {
		//kalau nak tambah quantity kena buat form pula di page ini
	// }

	if (isset($_SESSION["orderNumber"])) {
		$queryorderdetails = "INSERT INTO orderdetails(detailID, detailOrderID, detailProductID) 
								VALUES('', '".$_SESSION['orderNumber']."', '".$_GET['productID']."')";
		$conn->query($queryorderdetails);
	} else {
		if (isset($_SESSION["userID"])) {
			$queryorder = "INSERT INTO orders(orderID, orderUserID, date) VALUES('', '".$_SESSION['userID']."', NOW())";
			$conn->query($queryorder);
			$_SESSION["orderNumber"] = $conn->insert_id;

			$queryorderdetails = "INSERT INTO orderdetails(detailID, detailOrderID, detailProductID) VALUES('', '".$_SESSION['orderNumber']."', '".$_GET['productID']."')";
			$conn->query($queryorderdetails);
		}
	}

	$totalprice = $row["productPrice"];
	$queryUpdateOrders = "UPDATE orders SET total = '$totalprice' WHERE orderID='".$_SESSION['orderNumber']."'";
	$send = $conn->query($queryUpdateOrders);

	if ($send) {
		echo "<script type='text/javascript'>alert('Order Have Been Made');window.location='home.php';</script>";
	} else {
		echo "<script type='text/javascript'>alert('Query Failed');window.location='productdetails.php';</script>";
	}
}
?>