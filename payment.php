<?php  
session_start();

include "config.php";

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
		.payment-form {margin: 0 200px;width: 45%;}
		#amount {background-color: #95a5a6;}
		#cancel-btn {margin-right: 10px;}
	</style>
	<script type="text/javascript">
		function Check() {
			var name = document.myForm.name.value;
			var cardno = document.myForm.cardno.value;
			var cvv = document.myForm.cvv.value;

			if (name = "") 
			{
				alert("Please insert the name");
				document.myForm.name.focus();
				return false;
			}
			if (cardno = "") 
			{
				alert("Please insert your card number");
				document.myForm.cardno.focus();
				return false;
			}
			if (cvv = "") 
			{
				alert("Please insert the CVV number");
				document.myForm.cvv.focus();
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
				<div class="back-to-index">
					<a href="showcart.php"><input type="submit" name="back-btn" value="Back" title="Show Cart Page"></a>
				</div>
			</div>
		 	<div class="form">
		 		<div class="payment-form">
		 			<h3><center>Your Payment</center></h3>
		 			<form name='myForm' onsubmit="return Check()" action='payment.php' method='post'>
		 				<table cellpadding='10' border='1' style='margin: 20px;margin-left: 5px;border-collapse: collapse;width: 100%;'>
		 					<tr>
		 						<td colspan='2'><strong>PAYMENTS</strong></td>
		 					</tr>
		 					<tr>
		 						<td>Name</td><td><input type='text' name='name'></td>
		 					</tr>
		 					<tr>
		 						<td>Card No</td><td><input type='text' name='cardno'></td>
		 					</tr>
		 					<tr>
		 						<td>CVV</td><td><input type='text' name='cvv'></td>
		 					</tr>
		 					<tr>
		 						<td>Amount</td><td><input type='text' name='amount' id="amount" value='RM <?php echo $_GET['amount']; ?>' readonly></td>
		 					</tr>
		 					<tr>
		 						<td colspan='2'><input type='reset' name='cancel-btn' id="cancel-btn" value='Cancel'><input type='submit' name='pay-btn' value='Pay'></td>
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
	if (isset($_POST['pay-btn'])) {
		
		$name = $_POST['name'];
		$cardno = $_POST['cardno'];
		$cvv = $_POST['cvv'];
		$orderID = $_SESSION['orderNumber'];

		$query = "INSERT INTO payments(paymentID, paymentName, paymentCardNo, paymentCVV) VALUES('', '$name', '$cardno', '$cvv')";
		$sendquery = $conn->query($query);

		if ($sendquery) {

			$paymentID = $conn->insert_id;
			$queryorders = "UPDATE orders SET status=1, orderPaymentID='$paymentID' WHERE orderID='$orderID'";
			$send = $conn->query($queryorders);
			echo "<script type='text/javascript'>alert('Thank You. Your Order Has Been Placed');window.location='home.php';</script>";
		}
	}
?>	 