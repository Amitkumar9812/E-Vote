<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>Insert page</title>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Email-Store
  </a>
  <form class="form-inline">
   <a class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0" href="index.php">Data Entry</a> 
   <a class="btn btn-outline-primary my-2 my-sm-0" href="try.php">Data Retrive</a> 
  </form>
</nav>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "personal_data");
		if($conn === false)
		{
			die("ERROR: Could not connect. ". mysqli_connect_error());
		}
		
        $sno=0;
		$Email = $_REQUEST['Email'];
		$Password = $_REQUEST['Password'];
		$Title = $_REQUEST['Title'];
		//Hashing Algo
        $options = ['cost' => 12,];
        $hashpass= password_hash($Password, PASSWORD_BCRYPT, $options);

		$sql = "INSERT INTO login_details VALUES ('$sno','$Email','$hashpass','$Title')";
        $sql1 = "INSERT INTO secret_data VALUES ('$sno','$Password','$hashpass')";
		
		if(mysqli_query($conn, $sql))
		{
	?>	
		<div class="alert alert-success" role="alert">
			<?php echo "YOUR DATA IS SUCCESSFULLY ADDED TO OUR SECURE DATABASE WITH HASING ALGO " ?>
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
	</center>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
