<?php
    include_once("config.php");
	if(!empty($_GET))
	{
		$sql = mysqli_query($al,"INSERT INTO gov_records(license,owner,address,chassis_no,mobile) VALUES('".strtoupper($_GET['license'])."','".ucwords($_GET['owner'])."','".ucwords($_GET['address'])."','".strtoupper($_GET['chassis_no'])."','".$_GET['mobile']."')");
		if($sql)
		{
			echo "Saved";
		}
		else
		{
			echo "Error! ".mysqli_error($al);
		}
	}
	$qr = mysqli_query($al, "SELECT * FROM gov_records ORDER BY id DESC");
	while($pr = mysqli_fetch_array($qr))
	{
	    echo "License: ".$pr['license']."<br>";
	    echo "Owner: ".$pr['owner']."<br>";
	    echo "Address: ".$pr['address']."<br>";
	    echo "Chassis No.: ".$pr['chassis_no']."<br>";
	    echo "Mobile No.: ".$pr['mobile']."<br>";
	    echo "<hr>";
	}
?>