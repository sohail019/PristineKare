<?php

//if you got any deprecated error in above php 5.5 version just uncomment below line to hide those warnings
// error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

// date_default_timezone_set('Asia/Kolkata');
// 	$con=mysqli_connect("localhost","root","");  // change host name, username & password
// 	if(!$con)
// 		die('Could not connect: ' . mysqli_error());
// 	mysqli_select_db("laundry",$con);  // change database name here
	

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$con = mysqli_connect('localhost','sohail','p@&&w0rd','laundry');
mysqli_set_charset ($con, 'utf8mb4');

?>




