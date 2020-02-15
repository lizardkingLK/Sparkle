<?php
	include "config.php";
	session_start();
		
?>

<!DOCTYPE html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<head>
<title>Sales of Me</title>

  <link rel="stylesheet" href="theme.css" type="text/css"> 
  

<style>
	#order_details{
	  width: 50%;
	  display: block;
	  margin:auto;
	}

	#order_details h1{
	  background-color: red;
	  color:white;
	}

	hr {
	  height:1px;
	}


</style>


<script>
	function relO() {
		location.reload(); 
	}
</script>

</head>

<body>

<div id="order_details">


<?php
$Vendor_VendorName =  $_SESSION["VendorName"];
$qry = "SELECT * FROM user_buys_item WHERE (item_Vendor_VendorName) = ANY (SELECT '".$Vendor_VendorName."' FROM Vendor)";

$result = $conn->query($qry);

if($result ->num_rows>0) {
	while($row = $result->fetch_assoc()) {
		$token = $row['token']; //BOLDED HEADING with token 
?>

<h1>

<?php	
		echo "Order ID: " .$token;
?>

</h1>
<hr/>

<?php
		$itemName = $row['item_ItemName']; 
?>
		<form action="VendorloadsItem.php">
			<p id="item_Viewer"></p>
			<button type="button" onclick="return relO(this);">View Items</button>
		</form>
<hr/>

<?php
		$email = $row['user_email']; //UPPER BOX email
?>

<p>

<?php
		echo "Buyer's email: " .$email;
?>

</p>

<?php
		$date = $row['Date']; //UPPER BOX date
?>

<p>

<?php
		echo "Purchased date: " .$date;
?>

</p>

<?php
		$status = $row['Status']; //UPPER BOX status
?>

<p>

<?php
		echo "Transaction status: " .$status;
?>

</p>
<hr/>

<form action="updatetatus.php" method="POST">

<p>Delivery Status: </p>
<select name='sel_status'>
	<option>On Delivery</option>
	<option>Expired</option>
	<option>Returning</option>
</select>

<input onclick="return relO(this);" type="submit" value="Update Status" name="update"/>

</form>

<?php

	}
}
else {
	echo "No Sale records";
}

?>

</div>
</body>
</html>