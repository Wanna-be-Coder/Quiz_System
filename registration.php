<?php 

$error_empty = '';
$reg_info = array();

$user_check = false;

function test_input($data){

	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripcslashes($data);
	return $data;
}


if (isset($_POST['submit'])) {
	# code...
	$fname = $_POST['fname'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];


	$fname = test_input($fname);
	$uname = test_input($uname);
	$pass = test_input($pass);

	if (empty($fname) || empty($uname) || empty($pass)) {
	
		$error_empty = 'Fill all the credencials';
	}

	elseif (!preg_match("/^[a-zA-Z ]*$/",$fname) && !preg_match("/^[a-zA-Z ]*$/",$uname) )
	{

	$error_empty= "Only letters and white space allowed";

	}


	else{
		$fname = 'Fullname:'.$fname;
		$uname = 'Username:'.$uname;
		$pass = 'Password:'.$pass;

		$fh = 'register.txt';

		

		if (file_exists($fh)) {
		# code...
		$fr = fopen($fh, "r");
		while (!feof($fr)) {
			# code...
			array_push($reg_info, fgets($fr),fgets($fr));
		}
		foreach ($reg_info as  $value) {
			$value = test_input($value);
			if ($uname == $value) {
				# code...
				$user_check = true;
			}
			# code...
		}


		if (!$user_check) {
			# code...
		$myfile = fopen("register.txt", "a");
		fwrite($myfile, $fname.PHP_EOL);
		fwrite($myfile, $uname.PHP_EOL);
		fwrite($myfile, $pass.PHP_EOL);
		fclose($myfile);
		}
		else{
			$error_empty = 'Username Already Exists';
		}		


		}

		else{
		$myfile = fopen("register.txt", "w");
		fwrite($myfile, 'Fullname:teacher');
		fwrite($myfile, 'Username:admin');
		fwrite($myfile, 'Password:1234');

		fwrite($myfile, $fname.PHP_EOL);
		fwrite($myfile, $uname.PHP_EOL);
		fwrite($myfile, $pass.PHP_EOL);
		fclose($myfile);
	    }

	

	}


}





 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<form method="POST">
		<label>Fullname:</label>
		<input type="text" name="fname">
		<br><br>
		<label>Username:</label>
		<input type="text" name="uname">
		<br><br>
		<label>Password:</label>
		<input type="password" name="pass">
		<br><br>
		<input type="submit" name="submit">

	</form>

	<span><?php 

		echo $error_empty;
	 	  ?>
	 	  	
	</span>
</body>
</html>