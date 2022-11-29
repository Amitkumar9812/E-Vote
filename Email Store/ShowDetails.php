<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 <title>Foget Page</title>
 <style>#form2 {display: none;}
</style>
</head>
<body>
	<center><?php
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
$userEmail=$_REQUEST['Email'];
$EmailTitle=$_REQUEST['EmailTitle'];
$_SESSION['EmailGlobal'] = $userEmail;
$_SESSION['EmailTitleGlobal'] = $EmailTitle;

//echo $userEmail ;
//echo $EmailTitle;
$query = "SELECT * FROM `login_details` where Email='$userEmail' AND Title='$EmailTitle';";
$result = $conn->query($query);
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			   $hashpassword=$row["Password"];
			   //echo $hashpassword;
		}
	}
	else
	{
		echo "0 results";
	}
	
// Retrive Orignal Password using Hashing password
// FETCHING DATA FROM DATABASE from second table
$query1 = "SELECT * FROM `secret_data` where Hash='$hashpassword';";
$result1 = $conn->query($query1);
	if ($result1->num_rows > 0)
	{
		while($row1 = $result1->fetch_assoc())
		{
			//echo "Email.:$userEmail";
            //echo "Password.: ".$row1["Password"];
            $secondpass=$row1["Password"];
            $sno=$row1["sno"];
            //echo $sno;
            $_SESSION['snoGlobal']=$sno;
		}
	}
	else
	 {
		echo "0 results";
	}
//$conn->close();
?></center>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">
    <img src="/docs/4.6/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    Email-Store
  </a>
  <form class="form-inline">
   <a class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0" href="index.php">Data Entry</a> 
   <a class="btn btn-outline-primary my-2 my-sm-0" href="DataRetrive.php">Data Retrive</a> 
  </form>
</nav>
<div class="container" id="mainform">
    <div class="row align-items-center vh-80">
        <div class="mx-auto">
            <div class="card shadow border">
              <div class="card-body d-flex flex-column align-items-center">
				        <div class="card-body">
                 <h5 class="card-title">HERE IS YOUR EMAIL AND PASSWORD.</h5>
				 <table class="table table-bordered">
                  <thead class="thead-dark">
                   <tr>
                   <th scope="col">EMAIL</th>
                   <th scope="col">PASSWORD</th>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                   <td><?php echo "$userEmail";  ?></td>
                   <td><?php echo "$secondpass";  ?></td>
                   </tr>
                   </tbody>
                   </table>
                                
    <button class="btn btn-primary" type="button" onclick="show()" id="btnID">Change Password</button>
				  <!-- <a class="btn btn-primary" href="#" role="button">Change Password </a>-->
				   <a class="btn btn-danger" href="delete.php" role="button">Delete</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="form2">
                    <div class="row align-items-center vh-80">
                    <div class="mx-auto">
                    <div class="card shadow border">
                    <div class="card-body d-flex flex-column align-items-center">
				            <div class="card-body">
                    
                    <h5 class="card-title">ENTER YOUR NEW PASSWORD FOR UPDATE.</h5>
	

                    <form action="update.php" method="post" onsubmit="return passwordcheck(this)">
                    <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="mypassword" name="Password">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="mypassword1" name="Password1">
                    <input type="checkbox" onclick="shpwd()">Show Password
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                    <button class="btn btn-danger" type="button" onclick="show1()" id="btnID">Back</button>
                    
                    </form>

                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>


<script>
        function show() {
            document.getElementById('form2')
                    .style.display = "block";
 
            document.getElementById('mainform')
                    .style.display = "none";
        }
        function show1() {
            document.getElementById('mainform')
                    .style.display = "block";
 
            document.getElementById('form2')
                    .style.display = "none";
        }

        </script>
        <script>
        function passwordcheck(this)
        {
           pw1=form.mypassword.value;
           pw2=form.mypassword1.value;
           if(pw1=='')
           {
            alert("New password is empty...");
           }
           else if(pw2=='')
           {
            alert("Confirm password is empty...");
           }
           else if(pw1 != pw2)
           {
            alert("New password and confirm password is Not match...");
            return false;
           }
           else
           {
            return true;
           }
        }
</script>
<script>
	function shpwd() 
  {
   var x = document.getElementById("mypassword");
   var y = document.getElementById("mypassword1");
   if (x.type === "password" || y.type === "password1" )
   {
    x.type = "text";
    y.type = "text";
   } 
   else 
   {
    x.type = "password";
    y.type = "password";
   }
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>