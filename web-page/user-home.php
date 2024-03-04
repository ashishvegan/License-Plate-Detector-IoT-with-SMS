<?php
include_once("config.php");
session_start();
if(!isset($_COOKIE['email']))
	{
		header("location:index.php");
	}
$email = $_COOKIE['email'];
$data = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM users WHERE email = '$email'"));
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<title><?php include("project-title.php");?></title>
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script>
function ajaxCall() {
    $.ajax({
        url: "records.php", 
        success: (function (result) {
            $("#vegan").html(result);
        })
    })
};

ajaxCall(); // To output when the page loads
setInterval(ajaxCall, (1 * 20000)); // x * 1000 to get it in seconds
</script>
</head>
<body>
<?php include("user-home-nav.php");?>
<?php include("carousel.php");?>
<div class="container py-4">
  <h3 class="border-bottom">Detected License Records</h3>
  <div class="row py-5">
  	<div class="col" id="vegan">
    
    </div>
  </div>
</div>
<?php include("footer.php");?>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>