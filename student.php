<?php 


session_start();

	if ($_SESSION['uname'] == null) {
		# code...
		header("location:index.php");
	}

	
	$uname = $_SESSION['uname'];
	$pass = $_SESSION['pass'];



 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Student</h1>
	<form action="logout.php" method="GET">
		<button type='submit' name='submit'>Logout</button>
	</form>
		<a href="quiz.php"><button>Attend Quiz</button></a>
</body>
</html>