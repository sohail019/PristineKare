<?php
	include("../connection.php");
	@session_start();
	
	   $type=mysqli_real_escape_string($_REQUEST['type']);
		$sub_id=mysqli_real_escape_string($_REQUEST['sub_id']);
		$name='';
		$id='';
		$res=mysqli_query("select * from sv_services_sub where services_name='$sub_id'");
		while($row=mysqli_fetch_array($res))
		{
			if($type=="name")
			{
				$name.=mysqli_real_escape_string($row['services_sub_name']);
				$name.="#";
			}
			else 
			{
				$name.=mysqli_real_escape_string($row['sid']);
				$name.="#";
			}
		}
			echo $name;
	
?>