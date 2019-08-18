<?php 
session_start();
include "header.php";
include('config.php');

$err='';
if(!isset($_SESSION['email'])){
	if(isset($_POST['login'])){
			
			
		$u = $_POST['Umail'];
		$p = $_POST['Upass'];
		
		$query = mysqli_query($connection,"select * from  user where Umail='$u' and Upass='$p'");
		
		$row = mysqli_fetch_assoc($query);
		
		if(isset($row['Umail'])){
			$_SESSION['email'] = $row['Umail'];
			$_SESSION['name'] = $row['UName'];
			header("Location:index.php");
		}
		else{
			$err = "Invalid username or password!";
		}
			
			
	}
	echo '<center><h1>'.$err.'</h1></center>';
	
}
else{
	echo "<center><h1>Hello ".$_SESSION['name']."</h1></center>";

}

echo ' <div class="row">
			<div class="col-md-12">
				<center>
					<img src="images/khadok.jpg?'.rand().'" alt="Khadok" style="width:100%;">
				</center>
			</div>
		</div>';
if(isset($_GET['i'])){
	echo '<script>alert('.$_GET['i'].');</script>';
}
include "footer.php";
?>