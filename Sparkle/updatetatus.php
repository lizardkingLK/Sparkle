<?php
	session_start();
	include "config.php";

?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>

</head>

<body>

<?php
if(isset($_POST['update'])){
	$newstatus = $_POST['sel_status'];
	$qry2 = "UPDATE user_buys_item SET Status = '$newstatus'";
	$result = $conn->query($qry2);
	
	if($result == TRUE) {
		echo "status updated.";
	}
	else {
		echo "Cannot do that" .$conn->error;
	}
}	
?>

</body>
</html>

<?php
	$conn->close();
?>