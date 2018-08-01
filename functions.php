<?php  

session_start();

function showcart()
{
	
	include 'config.php';

	if(isset($_SESSION['orderNumber']))

	{

		if(isset($_SESSION['userID']))

		{

			$custsql = "SELECT orderID, status from orders WHERE orderUserID = ". $_SESSION['userID']. " AND status < 1;";

			$custres = $conn->query($custsql);

			$custrow = $custres->fetch_assoc();

			$itemssql = "SELECT products.*, orderdetails.*, orderdetails.detailID AS itemid FROM products, orderdetails WHERE orderdetails.detailProductID =products.productID AND detailOrderID = '".$custrow['orderID']."'";

			$itemsres = $conn->query($itemssql);

			$itemnumrows = $itemsres->num_rows;

		}
	}

	else

	{

		$itemnumrows = 0;

	}	

	if($itemnumrows == 0)

	{

		echo "<script type='text/javascript'>alert('You have not added anything to your shopping cart yet.');</script>";

	}

	else

	{

		echo "<table cellpadding='10' border='1' style='margin: 20px;margin-left: 5px;border-collapse: collapse;width: 100%;'>";

		echo "<tr>";

		echo "<td width='200px'><strong>Pname</strong></td>";

		// echo "<td><strong>Quantity</strong></td>";

		// echo "<td><strong>Unit Price</strong></td>";

		echo "<td><strong><center>Pcost</center></strong></td>";

		echo "<td width='150px'><strong><center>Action</center></strong></td>";

		echo "</tr>";

		while($itemsrow = $itemsres->fetch_array())
		{

			$quantitytotal =

			$itemsrow['productPrice'];

			echo "<tr>";

			echo "<td>".$itemsrow['productName']."</td>";

			// echo "<td>" . $itemsrow['quantity'] . "</td>";

			echo "<td><strong>RM ".$itemsrow['productPrice']."</strong></td>";

			// echo "<td><strong>&pound;". sprintf('%.2f', $quantitytotal) . "</strong></td>";

			echo "<td><center><a href='delete.php?id=".$itemsrow['itemid']."' title='Delete this product'>X</a></center></td>";

			echo "</tr>";

			@$total = $total + $quantitytotal;

			$totalsql = "UPDATE orders SET total = '".$total."' WHERE orderID = '".$_SESSION['orderNumber']."'";

			$totalres = $conn->query($totalsql);
		}

		echo "<tr>";

		echo "<td></td>";

		echo "<td>TOTAL</td>";

		echo "<td><strong>RM ".$total."</strong></td>";

		echo "</tr>";

		echo "</table>";

		echo "<center><a href='payment.php?amount=".$total."'><input type='submit' name='confirm-btn' value='Confirm Order'></a></center>";

		echo "<br><br>";
	}

}
