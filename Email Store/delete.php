<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 <title>Delete</title>
</head>
<body>
<center>
<?php
// Create Connection With Database
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "personal_data";
$conn = new mysqli($servername,$username, $password, $databasename);
if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
}
?>

<?php
session_start();
// Retrive hash code password for Email and with Title
$userEmail=$_SESSION['EmailGlobal'];
$EmailTitle=$_SESSION['EmailTitleGlobal'];
$sno1=$_SESSION['snoGlobal'];

$query = "SELECT * FROM `login_details` where Email='$userEmail' AND Title='$EmailTitle';";
$result = $conn->query($query);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
               $sno=$row["sno"];
			   $hashpassword=$row["Password"];
			   //echo $hashpassword;
		}
	}
	else
	{
		echo "0 results";
	}
    // delete from table login detail
    $sql = "DELETE FROM `login_details` Where sno='$sno';";
    $sql1 = "DELETE FROM `secret_data` where sno='$sno1';";
	if(mysqli_query($conn, $sql))
	{
?>	
	<div class="alert alert-success" role="alert">
		<?php echo "DELETED " ?>
		<br>
		<?php echo "Waiting For Some Time You Will Redirect To Main Page..."?>
	</div>
<?php

	header("Refresh:10;url=index.php");
	} 
	else
	{
		echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
	}
	if(mysqli_query($conn, $sql1))
	{		
	} 
	else
	{
		echo "ERROR: Hush! Sorry $sql1. "
			. mysqli_error($conn);
	}
	// Close connection
	mysqli_close($conn);
?>