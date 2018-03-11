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
	<title>Teacher</title>
</head>
<body>
	<h1>Teacher</h1>
	
	<form action='create_quiz.php' method="GET">
		<button type="submit" name='submit'>Create Quiz</button>
	</form>
	<br><br>

	<form action='student_selection.php' method="GET">
		<button type="submit" name='submit'>Select Student</button>
	</form>

	<br><br>
	<form action="logout.php" method="GET">
		<button type='submit' name='submit'>Logout</button>
	</form>
	
</body>
</html>