<?php
include('../connection.php');
$type=mysql_real_escape_string($_REQUEST['action']);
if($type=='update')
{
	$name=mysql_real_escape_string($_REQUEST['name']);
	$email_id=mysql_real_escape_string($_REQUEST['email_id']);
	$phone_no=mysql_real_escape_string($_REQUEST['phone_no']);
	$city=mysql_real_escape_string($_REQUEST['city']);
	$address=mysql_real_escape_string($_REQUEST['address']);
	$pin_code=mysql_real_escape_string($_REQUEST['pin_code']);
	$gender=mysql_real_escape_string($_REQUEST['gender']);

	$hid=mysql_real_escape_string($_REQUEST['hid']);
	if(mysql_query("update sv_user_profile set name='$name',email_id='$email_id',phone_no='$phone_no',city='$city',address='$address',pin_code='$pin_code',gender='$gender' where signup_id='$hid'")) 
		echo "Updated";
	else 
		echo "Error";
  
}
else if($type=='delete')
{
	$hid=mysql_real_escape_string($_REQUEST["hid"]);		
	if(mysql_query("delete from sv_user_profile where signup_id='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  

?>