<?php
session_start();
include "header.php";
include 'config.php';
if(isset($_SESSION['email'])){
	if(isset($_POST['rating']) && $_POST['rating'] != ''){
		
	
		$ratings = $_POST['star'];
		
		list($rid, $fid) = explode("-",$_POST['ratingitem']);
		
		mysqli_query($connection, "insert into review(Fid,Rid,Ratings) values($fid,$rid,$ratings)");
		if(mysqli_affected_rows($connection)==1){
			echo "<center><h1>Thanks for ".$ratings." star review.</center></h1>";
		}
		else{
			echo mysqli_error($connection);
		}
	}
	else{
		header("Location:index.php");
	}
}
else{
	header("Location:index.php?i='You have to login first!'");
}
include "footer.php";
?>