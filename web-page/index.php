<?php
include_once("config.php");
if(isset($_COOKIE['user-email']))
	{
		header("location:home.php");
	}
if(!empty($_POST))
{
	$email = mysqli_real_escape_string($al, $_POST['email']);
	$pass = mysqli_real_escape_string($al,sha1($_POST['password']));
	$sql = mysqli_query($al,"SELECT * FROM users WHERE email = '$email' AND password = '$pass'");
	if(mysqli_num_rows($sql) == 1)
	{
		setcookie("email",$_POST['email'], time() + 86400);
		header("location:user-home.php");
	}
	else
	{
		$msg = "Incorrect credentials";
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<title>
<?php include("project-title.php");?>
</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid"> <a class="navbar-brand" href="index.php">
    <?php include("project-title.php");?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"> <a class="nav-link active" aria-current="page" href="index.php">Home</a> </li>
      </ul>
      <a href="register.php" class="btn btn-outline-light">Register</a> </div>
  </div>
</nav>
<?php include("carousel.php");?>
<div class="container py-4">
  <h4 class="display-4 border-bottom">Login </h4>
  <div class="row row-cols-1 row-cols-md-2">
    <div class="col py-3">
      <form method="post" action="">
        <div class="mb-3">
          <?php if(isset($msg)) { ?>
          <div class="alert alert-danger">Incorrect credentials</div>
          <?php } ?>
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
        </div>
        <button type="submit" class="btn btn-dark">Login</button>
      </form>
    </div>
    <div class="col"> <img src="images/right.jpg" class="img-thumbnail" height="425"> </div>
  </div>
</div>
<?php include("footer.php");?>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>