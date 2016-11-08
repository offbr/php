<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
	echo $_POST['id']. ', '.$_POST['password'];

	function get_arguments($arg1, $arg2){
		return $arg1 + $arg2;
	}

	function get_arguments1($args1=100){
		return $args1;
	}

	echo "<br>";
	echo get_arguments(10, 20);
	echo "<br>";
	echo get_arguments(20, 30);
	echo "<br>";
	echo get_arguments1(1);
	echo "<br>";
	echo get_arguments1();

	echo "<br>";
	$member = array('e1', 'e2', 'e3');
	echo $member[0].'<br>';
	echo $member[1].'<br>';
	echo $member[2].'<br>';
	echo date("y-n-j H:m:s");
 ?>
</body>
</html>