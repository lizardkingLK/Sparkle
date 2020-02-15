<?php
	include "config.php";
?>		

<?php

		echo "Paid items: "; //UPPER BOX itemDetails
		
		$qry2 = "SELECT * FROM item,user_buys_item WHERE user_buys_item.item_ItemName = item.ItemName";

		$result = $conn->query($qry2);
		
		if($result -> num_rows>0) {
			while($row = $result->fetch_assoc()){
				echo "<br/>";

				//IMAGE IS LOADED

				$ItemName = $row['ItemName'];
				echo "Item : " .$ItemName;
				echo "<br/>";
				
				$price = $row['Price'];
				echo "Price : " .$price;
				echo "<br/>";
				
				$stock = $row['Stock'];
				echo "Stock available" .$stock;
				echo "<br/>";

			}
		}
		else {
			echo "No items found";
		}	
?>