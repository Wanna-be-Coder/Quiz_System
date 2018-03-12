<?php
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data; 
	}
if (isset($_POST['submit']))
{
	
if (empty($_POST['question'])||empty($_POST['choice1'])||empty($_POST['choice2'])||empty($_POST['choice3'])||empty($_POST['choice4'])||empty($_POST['answer'])) {
	# code...
	echo "FILL ALL THE CREDENTIALS";
}
	else{	
	$q = test_input($_POST['question']);
	$c1= test_input($_POST['choice1']);
	$c2= test_input($_POST['choice2']);
	$c3= test_input($_POST['choice3']);
	$c4= test_input($_POST['choice4']);
	$an= test_input($_POST['answer']);

	// $fe='quiz1.xml';
	// if (file_exists($fe)) {
		
			
	// $xml = new DOMDocument( );
	// $xml->load('quiz1.xml');
	// $nodes = $xml->getElementsByTagName('quiz') ;
	// if ($nodes->length > 0) {
 //    $ele = $xml->createElement( 'quiz_info' );
 //    $ele2 = $xml->createElement( 'quiz' );
 //    $ele3 = $xml->createElement( 'question' );
 //    $ele3 = $xml->createElement( 'choice' );
 //    $ele4 = $xml->createElement( 'c' );
 //    $ele5 = $xml->createElement( 'answer' );
 //    $ele3->nodeValue = $q;
 //    $ele4->nodeValue = $c1;
 //    $ele4->nodeValue = $c2;
 //    $ele4->nodeValue = $c3;
 //    $ele4->nodeValue = $c4;
 //    $ele4->nodeValue = $an;
 //    $ele2->appendChild( $ele3 );
 //    $ele2->appendChild( $ele5 );
 //    $ele3->appendChild( $ele4 );
 //    $ele->appendChild( $ele2 );
 //    $xml->appendChild( $ele );
 //    $xml->save('quiz1.xml');
	// 	}
	// 		# code...
	// 	}	


 
		
	
	// else{
	
	
    $myfile=fopen("quiz1.xml", "w") or die("Unable to open file!");
		$txt="<?xml version='1.0' encoding='UTF-8'?>".PHP_EOL;
		fwrite($myfile, $txt);
		$txt="<!DOCTYPE quiz_info[
	<!ELEMENT quiz_info (quiz*)>
	<!ELEMENT quiz (question,choice,answer)>
	<!ELEMENT choice (c+)>
	<!ELEMENT question (#PCDATA)>
	<!ELEMENT answer (#PCDATA)>
	<!ELEMENT c (#PCDATA)>
]>";
fwrite($myfile, $txt);
	
	      $txt=PHP_EOL."<quiz_info>
	<quiz>
	    <question>"
		    .$q.
	    "</question>
		<choice>
			<c>".$c1."</c>
			<c>".$c2."</c>
			<c>".$c3."</c>
			<c>".$c4."</c>
		</choice>

		<answer>".$an."</answer>

	</quiz>
	</quiz_info>";
		fwrite($myfile, $txt);

		fclose($myfile);
	}


//}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Create Quiz</title>
</head>
<body>
	<form method="POST">
		<label>Create Question:</label><br><br>
		<input type="text" name="question"><br><br>
		<label>choice 1 :</label><br><br>
		<input type="text" name="choice1"><br><br>
		<label>choice 2 :</label><br><br>
		<input type="text" name="choice2"><br><br>
		<label>choice 3 :</label><br><br>
		<input type="text" name="choice3"><br><br>
		<label>choice 4 :</label><br><br>
		<input type="text" name="choice4"><br><br>
		<label>Correct Answer:</label><br><br>
		<input type="text" name="answer"><br><br>
		<input type="submit" name="submit"><br><br>
		
	</form>
	<a href='teacher.php'><button>Back</button></a>
    <form action="logout.php" method="GET">
	<button type='submit' name='submit'>Logout</button>
    </form>

</body>
</html>