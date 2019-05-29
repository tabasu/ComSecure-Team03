<?php
	
	include 'db_connection.php';
	include 'protection.php';
	$conn = OpenCon();
	session_start();

	echo "<h1>WRONG QUERY ?? TRY AGAIN </h1>";
	$_SESSION["username"] = SQLCleaner($_POST['username']);
	$_SESSION["pass"] = SQLCleaner($_POST['pass']);
	echo "<h1>" . $_SESSION["username"] . " " . $_SESSION["pass"] . "</h1>";
	
	if(conn === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$query = "SELECT * FROM users WHERE username = '" . 
	$_SESSION["username"] . "' and password = '" . 
	$_SESSION["pass"] . "'";

	$result = mysqli_query($conn,$query) or die(mysql_error());
	$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	if($objResult){
		$_SESSION["query"] = $query;
		$_SESSION["STATUS"] = "TRUE";
		$message = "Login Successfully";
		mysqli_free_result($result);
		header("Location: main.php");

	}else{
		mysqli_free_result($result);
		header("Location: index.php");
	}

	CloseCon($conn);
?>
