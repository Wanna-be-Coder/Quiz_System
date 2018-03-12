<?php 

	$error_empty = '';
	$reg_info = array();
	$user_check1 = false;
	$user_check2 = false;

	function test_input($data){

		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}

	if (isset($_POST['submit'])) {
		# code...	
	$uname = $_POST['id'];
	$pass = $_POST['pass'];
	$uname = test_input($uname);
	$pass = test_input($pass);

	if (!preg_match("/^[a-zA-Z ]*$/",$uname) )
	{

	$error_empty= "Only letters and white space allowed";

	}

	else if (empty($pass) || empty($uname)){
	
		$error_empty = 'Fill all the credencials';
	}

	else{


		$uname = 'Username:'.$uname;
		$pass = 'Password:'.$pass;

		$fr = fopen("register.txt", "r");

		while (!feof($fr)) {
			# code...
			array_push($reg_info, fgets($fr), fgets($fr));
			}

		fclose($fr);
		
		foreach ($reg_info as $value) {
			# code...
		$value = test_input($value);

		if ($uname == $value) {
			# code...
			$user_check1 = true;
		}

		if ($pass == $value) {
			# code...
			$user_check2 = true;
		}
		}	


		if ($uname == 'Username:admin' && $pass == 'Password:1234') {
			# code...
			session_start();
			$_SESSION['uname'] = $uname;
			$_SESSION['pass'] = $pass;
			$_SESSION['reg_info'] = $reg_info;
			header("location:teacher.php");
		}

		else if ($user_check1 == true && $user_check2 == true) {
			# code...
			session_start();
			$_SESSION['uname'] = $uname;
			$_SESSION['pass'] = $pass;
			$_SESSION['reg_info'] = $reg_info;
			header("location:student.php");
		}

		else
		{
			$error_empty = "Invalid credencials"; 
		}

	}


	}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title>login Page</title>
</head>
<body>
	<form method="POST">
	<label>Id:</label>
	<input type="text" name="id">
	<label>Password:</label>
	<input type="password" name="pass">
	<input type="submit" name="submit">
	<br><br>
	</form>

	<a href="registration.php">Register Here!</a>
	<span><?php echo $error_empty ?></span>
</body>
</html>