<?php
include("../connection.php");
@session_start();
$phone_no=mysql_real_escape_string($_REQUEST['pno']);
$pwd=mysql_real_escape_string($_REQUEST['pwd']);
$pass=mysql_real_escape_string(md5($pwd));
$result=mysql_query("select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
$row=mysql_num_rows($result);
if($row==0)
		echo "Invalid";
else
{
	$result=mysql_query("select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
	$row=mysql_fetch_array($result);
	$_SESSION['phone_no']=$row['phone_no'];
			echo "welcome"; 
		
}
?>