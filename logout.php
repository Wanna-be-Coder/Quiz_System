<?php 

if(isset($_GET['submit'])){
session_start();
session_unset();
$_SESSION["username"] = "";
$_SESSION["password"] = "";
session_destroy();
header("location:index.php");
}




 ?>