<?php 
session_start();

$hw=1;
$point = 0;
$selected = array();


if (isset($_POST['submit'])) {
	// $first=$_POST['hw'];

	
	$dom = simplexml_load_file("quiz.xml");

	foreach ($dom->quiz as $s) 
	{
		array_push($selected,$s->answer);
		
	}
	for($i=1;$i<=3;$i++)
	{
		

	
	foreach ($selected as $key) 
	{
		
		if($_POST[$i]==$key){$point++;}		
	}
}
echo $point;
$_SESSION['score']=$point;
header('location:score.php');
}
$n = 1;

$dom = simplexml_load_file ("quiz.xml");

echo "<form method='POST'>";

foreach ($dom->quiz as $s) {
	# code...
	echo  "Question "."$n."."$s->question"."<br><br>";
	$n++;
	
		# code...
    foreach ($dom->quiz->choice->c as $a) {
		# code...
			echo "<input type='radio' name=$hw value=$a>"."$a"."<br><br>";
		
			


	}
	$hw++;
	
}

echo "<input type='submit' name='submit'>";

echo "</form>";

 ?>