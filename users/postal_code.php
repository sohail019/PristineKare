<?php
include('../connection.php');
@session_start();
$phone_no=mysqli_real_escape_string($_SESSION['phone_no']);
$postal_code=mysqli_real_escape_string($_POST['postal_code']);
		header("Location:order.php?city_name=".$postal_code);	
?>
