<?php
session_start();
echo "All the user information is given below"."<br>";
$reg_Info=$_SESSION['reg_info'];
foreach($reg_Info as $r)
{
	echo $r."<br>";
}


	echo "<a href='teacher.php'><button>Back</button></a>";





?>