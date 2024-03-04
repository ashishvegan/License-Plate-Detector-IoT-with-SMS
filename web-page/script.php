<?php
date_default_timezone_set("Asia/Kolkata");
echo date('h:i a');
if(!empty($_POST))
{
	$time = date('h:i a');
	$date = date('d-m-Y');
	include_once("config.php");
	$license = $_POST['license'];
	$fetchGovData = mysqli_query($al,"SELECT * FROM gov_records WHERE license = '$license'");
	if(mysqli_num_rows($fetchGovData) == 1)
	{
		$pr = mysqli_fetch_array($fetchGovData);
		$owner = $pr['owner'];
		$address = $pr['address'];
		$chassis_no = $pr['chassis_no'];
		$mobile = $pr['mobile'];
		mysqli_query($al, "INSERT INTO detected_records(rowid,license,owner,address,fine,chassis_no,time,date,govrecords,image) VALUES('".uniqid()."','$license','$owner','$address','1200','$chassis_no','$time','$date','1','')");
		sms($mobile,$license);
	}
	else
	{
		$extension = end(explode(".", $_FILES["file"]["name"]));
		$fileName = $license."_".uniqid().".".$extension;
		print_r($_FILES);
		move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$fileName);
		mysqli_query($al, "INSERT INTO detected_records(rowid,license,owner,address,fine,chassis_no,time,date,govrecords,image) VALUES('".uniqid()."','$license','-','-','1200','-','$time','$date','0','".$fileName."')");
	}
}
function sms($mobile,$license)
{
		$xx = "https://www.techvegan.in/license-detector/sms/index.php?mobile=+91".$mobile."&license=".$license;
		$url = str_replace( "&amp;", "&", $xx );
		$url = str_replace( " " , "%20" , $xx );
		fopen($url,"r");
}
?>