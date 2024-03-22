<?php
include('../connection.php');
$type=$_REQUEST['typ'];
if($type=='add')
{
	$packages_name=mysqli_real_escape_string($_POST['pname']);
	$price=mysqli_real_escape_string($_POST['price']);
	$desc=mysqli_real_escape_string($_POST['desc']);			
	mysqli_query($con, "insert into sv_packages(packages_name,price,description)values('$packages_name','$price','$desc')");	
		$msg="Inserted";				
	header("Location:packages.php?msg=".$msg);
}
else if($type=='update')
{
	
	$packages_name=mysqli_real_escape_string($_POST['pname']);
	$price=mysqli_real_escape_string($_POST['price']);
	$desc=mysqli_real_escape_string($_POST['desc']);	
	$id=$_POST['hid'];
		mysqli_query($con, "update sv_packages set packages_name='$packages_name', price='$price',description='$desc' where id='$id'");
			$msg="Updated";		
		header("Location:packages.php?msg=".$msg);		
}
else if($type=='delete')
{
	$hid=mysqli_real_escape_string($_REQUEST["hid"]);		
	if(mysqli_query($con, "delete from sv_packages where id='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  
?>
