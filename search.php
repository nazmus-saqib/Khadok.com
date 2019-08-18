<?php
session_start();
include "header.php";
include 'config.php';
if(isset($_SESSION['email'])){

if(isset($_GET['search'])){
	$key = $_GET['key'];
	$sql = mysqli_query($connection, "select distinct Fname from food f, restaurant r where r.Rid=f.Rid and f.Fname like '%$key%'");
	
	while($row=mysqli_fetch_assoc($sql)){
		echo "<br><hr>Found item: ".$row['Fname']."<br><hr>Places:";
		$sql2 = mysqli_query($connection, "select * from food f, restaurant r where r.Rid=f.Rid and f.Fname ='".$row['Fname']."'");
		while($row2=mysqli_fetch_assoc($sql2)){
			
			
			echo '<form action="order.php" method="post">
			Restaurant name: '.$row2['Rname'].'<br>Location: '.$row2['Location'].'<br>Price: '.$row2['Price'].'<br>
			<input class="btn btn-default" type="submit" name="order" value="Order"/>
			<input type="text" style="visibility:hidden" name="itemcode" value="'.$row2['Rid'].'-'.$row2['Fid'].'"/>
			</form><hr>
			';
		}
	}
}
}
else{
	header("Location:index.php?i='You have to login first!'");
}
include "footer.php";
?>