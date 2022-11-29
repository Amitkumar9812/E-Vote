<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<title>PERSONAL DETAILS</title>
</head>
<body>
<!-- NAVBAR -->
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
<div class="container">
    <div class="row align-items-center vh-100">
        <div class="mx-auto">
            <div class="card shadow border">
              <div class="card-body d-flex flex-column align-items-center">
				        <div class="card-body">
                 <h5 class="card-title">ENTER YOUR PERSONAL DETAILS</h5>
<form action="insert.php" method="post">
<div class="form-group">
  <label for="Title">Email Title</label>
  <input type="text" class="form-control" id="Title" aria-describedby="emailHelp" name="Title">  
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email">
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="mypassword" name="Password">
	<input type="checkbox" onclick="shpwd()">Show Password
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>


<script>
	function shpwd() 
  {
   var x = document.getElementById("mypassword");
   if (x.type === "password")
   {
    x.type = "text";
   } 
   else 
   {
    x.type = "password";
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