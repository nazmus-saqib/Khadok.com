<?php
session_start();
include "header.php";
include 'config.php';
if(isset($_SESSION['email'])){
$sql = mysqli_query($connection, "SELECT r.Rid, r.Rname, sum(Ratings)/count(*) as res_rating FROM restaurant r left outer join review w on w.Rid=r.Rid group by r.rid");

while($row=mysqli_fetch_assoc($sql)){
	echo "<br><a href='resinfo.php?rid=".$row['Rid']."'>".$row['Rname']."</a>-(Rating: ".round($row['res_rating'],1).")<hr>";
}

}
else{
	header("Location:index.php?i='You have to login first!'");
}
include "footer.php";
?>
