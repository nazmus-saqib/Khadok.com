<?php
session_start();
include "header.php";
include 'config.php';
?>
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<style>
div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: left;
  padding: 5px;
  font-size: 20px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>

<?php
if(isset($_SESSION['email'])){
	
	$sql = mysqli_query($connection, "select * from restaurant r, food f where r.Rid=f.Rid and r.Rid=".$_GET['rid']."");
	
	$sql2 = mysqli_query($connection, "select * from restaurant r, food f where r.Rid=f.Rid and r.Rid=".$_GET['rid']."");
	
	
	$row=mysqli_fetch_assoc($sql2);
	echo "<br><hr>Restaurant: ".$row['Rname']."<br>Place: ".$row['Location']."<br><hr>Items:";
	while($row=mysqli_fetch_assoc($sql)){
		
		echo '<form action="order.php" method="post">
		'.$row['Fname'].' - '.$row['Price'].'
		<input class="btn btn-default" type="submit" name="order" value="Order"/>
		<input type="text" style="visibility:hidden" name="itemcode" value="'.$row['Rid'].'-'.$row['Fid'].'"/>
		</form>
		<div class="stars">
		  <form action="rating.php" method="post">
			<input class="star star-5" id="star-5'.$row['Rid'].'-'.$row['Fid'].'" type="radio" value="5" name="star" required/>
			<label class="star star-5" for="star-5'.$row['Rid'].'-'.$row['Fid'].'"></label>
			<input class="star star-4" id="star-4'.$row['Rid'].'-'.$row['Fid'].'" type="radio" value="4" name="star"/>
			<label class="star star-4" for="star-4'.$row['Rid'].'-'.$row['Fid'].'"></label>
			<input class="star star-3" id="star-3'.$row['Rid'].'-'.$row['Fid'].'" type="radio" value="3" name="star"/>
			<label class="star star-3" for="star-3'.$row['Rid'].'-'.$row['Fid'].'"></label>
			<input class="star star-2" id="star-2'.$row['Rid'].'-'.$row['Fid'].'" type="radio" value="2" name="star"/>
			<label class="star star-2" for="star-2'.$row['Rid'].'-'.$row['Fid'].'"></label>
			<input class="star star-1" id="star-1'.$row['Rid'].'-'.$row['Fid'].'" type="radio" value="1" name="star"/>
			<label class="star star-1" for="star-1'.$row['Rid'].'-'.$row['Fid'].'"></label>
			<input class="btn btn-primary btn-block" type="submit" name="rating" value="Give a rating"/>
			<input type="text" style="visibility:hidden" name="ratingitem" value="'.$row['Rid'].'-'.$row['Fid'].'"/>
		  </form>
		</div><hr>';
		
		
		
	}
}
else{
	header("Location:index.php?i='You have to login first!'");
}
include "footer.php";

?>
