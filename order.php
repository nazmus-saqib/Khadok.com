<?php
session_start();
include "header.php";
include 'config.php';
if(isset($_SESSION['email'])){
	
	if(isset($_POST['order'])){
		
		$email = $_SESSION['email'];
		$itemcode = $_POST['itemcode'];
		$orderid = substr(number_format(time() * rand(),0,'',''),0,6);
		mysqli_query($connection, "insert into delivery values('$email',$orderid,'$itemcode')");
		if(mysqli_affected_rows($connection)==1){
			echo "<center><h1>Successfully Ordered!<br>Your order id: ".$orderid."</center></h1>";
		}
		else{
			echo mysqli_error($connection);
		}
	}
	else{
		echo "<br><center><h1>You have to choose any package first!</center></h1>";
	}
}
else{
	header("Location:index.php?i='You have to login first!'");
}
include "footer.php";
?>