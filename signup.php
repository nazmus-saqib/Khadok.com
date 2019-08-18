<?php
session_start();
include "header.php";
include "config.php";
if(!isset($_SESSION['email'])){
	if(isset($_POST['signup'])){
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		
		mysqli_query($connection, "insert into user values('$uname', '$address', $phone, '$email', '$password')");
		if(mysqli_affected_rows($connection)==1){
			$_SESSION['email'] = $email;
			$_SESSION['name'] = $uname;
			header("Location:index.php");
		}
		else{
			echo mysqli_error($connection);
		}
		
	}
echo '	
<div class="row">
	<div class="col-md-12">
		<h1>Sign up</h1> 
		 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
				<div class="form-group">
					 <input type="text" name="uname" class="form-control" placeholder="UserName" required>
				</div>
				<div class="form-group">
					 <input type="email" name="email" class="form-control" placeholder="Email" required>
					 
				</div>
				<div class="form-group">
					 <input type="password" name="password" class="form-control" placeholder="Password" required>
					 
				</div>
				<div class="form-group">
					 <input type="text" name="phone" class="form-control" placeholder="Phone" required>
					 
				</div>
				<div class="form-group">
					 <input type="text" name="address" class="form-control" placeholder="Address" required>
					 
				</div>
				<div class="form-group">
					 <button type="submit" name="signup" class="btn btn-primary btn-block">Sign up</button>
				</div>
				
		 </form>
	</div>
</div>';
}
else{
	header("Location:index.php");
}
include "footer.php";
?>

