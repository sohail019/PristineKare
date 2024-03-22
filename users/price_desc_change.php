<?php
	include("../connection.php");
	@session_start();
	
	$str=$_REQUEST['id'];
	$price="";
	$sel=mysqli_query($con, "select * from sv_packages where id='$str'");
	$row=mysqli_fetch_array($sel);
	$price.=$row['price'];
	$price.="&&";
	$price.=$row['description'];
   echo $price;
	
?>