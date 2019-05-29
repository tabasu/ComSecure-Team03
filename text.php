<!DOCTYPE html>
<html>
<head>
    <title>TEAM03</title>
    <style type="text/css" media="screen">
  
    </style>
</head>
<body>
 <h1> test </h1>
 <?php
	include 'db_connection.php';
	$conn = OpenCon();
	if(conn === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$query = "SELECT * FROM users";
	echo "Connected Successfully";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	if($result > 0){
		echo "<table>";
		echo "<tr>";
		echo "<th>first_name</th>";
		echo "<th>last_name</th>";
		echo "<tr>";
	while($row = mysqli_fetch_array($result)){
		echo "<tr>";
		echo "<td>" . $row['firstname'] . "</td>";
		echo "<td>" . $row['lastname']. "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_free_result($result);
	} else{
		echo "fail bitches";
	}


	




	CloseCon($conn);


 ?>
</body>
</html>

