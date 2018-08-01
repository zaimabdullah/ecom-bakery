<?php 

include '../config.php';

$query = "SELECT * FROM product_categories";
$sendquerycategory = $conn->query($query);
if ($sendquerycategory == 0) {
	echo "<script type='text/javascript'>alert('Query Failed');</script>";
}
?>