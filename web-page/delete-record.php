<?php
if(!empty($_GET))
{
	include_once('config.php');
	mysqli_query($al,"DELETE FROM detected_records WHERE rowid = '".$_GET['key']."'");
	header("location:user-home.php");	
}
?>