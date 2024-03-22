<?php
include('../connection.php');
$type=mysql_real_escape_string($_REQUEST['typ']);
if($type=='add')
{
	$sname=mysql_real_escape_string($_POST['sname']);
	$sub_sname=mysql_real_escape_string($_POST['sub_sname']);
	$price=mysql_real_escape_string($_POST['price']);	
	$file_name = $_FILES['sub_services_pic']['name'];	
	if($file_name=="")
	{
		echo "select-img";
			header("Location:services_sub.php?msg="."select-img");
	}
	else if($file_name!="")
	{
		$allowed =  array('jpeg','png' ,'jpg');	
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed)) 
		{
			echo "imgerr";
				header("Location:services_sub.php?msg="."imgerr");
		}
		else if($_FILES['sub_services_pic']['size'] > 1048576)
		{
			echo "size-err";
			header("Location:services_sub.php?msg="."size-err");
		}
		else {
			$random_digit=rand(0000,9999);
			if($file_name!="")
			{		
				$file_name= $random_digit.$file_name;
				$path= "images/" .$file_name;
				move_uploaded_file($_FILES['sub_services_pic']["tmp_name"],$path);
			}
			else 
				$file_name="";		
	
			if(mysql_query("insert into sv_services_sub(services_name,services_sub_name,price,sub_services_pic)values('$sname','$sub_sname','$price','$file_name')"))
				echo "Inserted";
					header("Location:services_sub.php?msg=".$msg);
		}
	}
}
else if($type=='update')
{
	$flag=0;
	$sname=mysql_real_escape_string($_POST['sname']);
	$sub_sname=mysql_real_escape_string($_POST['sub_sname']);
	$price=mysql_real_escape_string($_POST['price']);	
	$hid=mysql_real_escape_string($_POST['hid']);	
	
	$res=mysql_query("select * from sv_services_sub where sid='$hid'");
	$fet=mysql_fetch_array($res);
	$old_file="images/".$fet['sub_services_pic'];
	$file_name = $_FILES['sub_services_pic']['name'];
	$random_digit=rand(0000,9999);	
	if($file_name!="")
	{		
		$file_name= $random_digit.$file_name;
 		$path= "images/" .$file_name;
		$allowed =  array('jpeg','png' ,'jpg');	
		$ext = pathinfo($file_name, PATHINFO_EXTENSION);
		if(!in_array($ext,$allowed)) 
		{
			$flag="1";
			$msg1="error1";					
		}
		else if($_FILES['sub_services_pic']['size'] > 1048576)
		{
			$flag="1";
			$msg1="error2";					
		}	
		else {
		move_uploaded_file($_FILES['sub_services_pic']["tmp_name"],$path);
		if (file_exists($old_file))
		{
   	 		unlink($old_file);
		} }
	}
	else 
	{
		$old_file=mysql_real_escape_string($fet['sub_services_pic']);
		$file_name=mysql_real_escape_string($old_file);
	}
	if($flag=="0")
	{		
		if(mysql_query("update sv_services_sub set services_name='$sname',services_sub_name='$sub_sname',price='$price',sub_services_pic='$file_name' where sid='$hid'"))
		{
			$msg="Updated";	
			header("Location:services_sub.php?msg=".$msg);	
		}
	}	
	else 
	{
		$error="";
		if($flag=="1") 
		{
			if($msg1=="error1") 
				$error="imgerr";
			else if($msg1=="error2")
				$error="size-err";	
		}
		header("Location:services_sub.php?msg=".$error);	
	}
}
else if($type=='delete')
{
	$hid=mysql_real_escape_string($_REQUEST["hid"]);		
	if(mysql_query("delete from sv_services_sub where sid='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  
?>