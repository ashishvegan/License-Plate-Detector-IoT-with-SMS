<?php
include_once("config.php");
session_start();
$flag = 2;
if(!empty($_POST))
{
	$name = ucwords($_POST['name']);
	$email = strtolower($_POST['email']);
	$pass = sha1($_POST['password']);
	$sql = mysqli_query($al,"INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
	if($sql)
	{
		$flag = 1;
	}
	else
	{
		$flag = 0;
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<title>Register | <?php include("project-title.php");?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid"> <a class="navbar-brand" href="index.php"><?php include("project-title.php");?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="index.php">Home</a> </li>
      </ul>
      <a href="index.php" class="btn btn-outline-light">Login</a></div>
  </div>
</nav>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active"> <img src="images/1.jpg" class="d-block w-100" alt=""> </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="visually-hidden">Previous</span> </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
</div>
<div class="container py-4">
  <h4 class="display-4 border-bottom">User Registration</h4>
  <div class="row row-cols-1 row-cols-md-2">
    <div class="col py-3">
      <form method="post" action="">
        <?php 
		if($flag == 1) 
		{ ?>
        <div class="alert alert-success" role="alert"> Registered successfully </div>
        <?php } elseif($flag == 0) {
			 ?>
        <div class="alert alert-danger" role="alert"> Email already registered with us. </div>
        <?php } ?>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <input type="submit" class="btn btn-dark" value="Register">
      </form>
    </div>
    <div class="col"> <img src="images/right.jpg" class="img-thumbnail" height="425"> </div>
  </div>
</div>
  <?php include("footer.php");?>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>