<?php
session_start();
session_unset();
$_SESSION['name'] = null;
$_SESSION['email'] = null;
header("Location:index.php");
?>