<?php
	setcookie("email","", time() - 36000);
	header("location:index.php");
?>