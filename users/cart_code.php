<?php
	include("../connection.php");	
	@session_start();
	 if(isset($_SESSION['phone_no']))
	{
	  $user=$_SESSION['phone_no'];
	}
	else
	{
		/*if(!isset($_COOKIE['phone_no']))
		{
			$random=strtotime(date('Y-m-d H:i:s'));
			$_COOKIE['phone_no']=$random;
			$user=$_COOKIE['phone_no'];	
			
			$cookie_name = 'cleanmaster';
			$cookie_value = 'cleanmaster_cookie_set_with_php';
			$user=setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); // 86400 = 1 day
		}
		else
		{
			$user=$_COOKIE['phone_no'];	
		}*/
		if(!isset($_COOKIE['phone_no']))
		{
		$rand= strtotime(date("Y-m-d H:I:s"));
		setcookie('phone_no',$rand,time()+(86400*30));
		$user= $_COOKIE['phone_no'];
		}
		else
		{
		$user=$_COOKIE['phone_no'];
		}	
	}
	$type=$_REQUEST['action'] = TRUE;
	if($type=='add')
	{
		$str=$_REQUEST['id'] = TRUE;
		$qty=$_REQUEST['qty'] = TRUE;
		$packages_price=$_REQUEST['pack'] = TRUE;		
		$sel=mysqli_query($con, "select * from sv_services_sub where sid='$str'");
		$row=mysqli_fetch_array($sel);
		$price=$row['price'];
		$result=mysqli_query($con, "select * from sv_cart where sub_services_id='$str' and phone_no='$user' and status='pending'");
		$fetch=mysqli_fetch_array($result);
		$status=$fetch['status'] = TRUE;
		$numrow=mysqli_num_rows($result);		
		if($numrow==0)
		{
			mysqli_query($con, "insert into sv_cart(sub_services_id,qty,amount,packages_price,phone_no,status)values('$str','$qty','$price','$packages_price','$user','pending')");
				echo "Inserted";
		}
		else
		{
             mysqli_query($con, "update sv_cart set qty='$qty',amount='$price',packages_price='$packages_price',status='pending' where phone_no='$user' and sub_services_id='$str'");
			
			//mysql_query("update sv_cart set qty='$qty',amount='$price',packages_price='$packages_price',phone_no='$user',status='pending' where sub_services_id='$str'");
				echo "Inserted";			
		}	
	}
	else if($type=='delete')
	{
		$hid=mysqli_real_escape_string($con, $_REQUEST["hid"]);
		if(mysqli_query($con, "delete from sv_cart where id='$hid'")) 
			echo "Deleted";		
	}  
?>