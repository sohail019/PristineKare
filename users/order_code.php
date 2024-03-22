<?php
include ('../connection.php');
@session_start();
if(isset($_SESSION['phone_no']))
{
  $user=$_SESSION['phone_no'];
}
else
{	
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

 
 
 
$pickup_date = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['datepicker'])));
$pickup_time = mysql_real_escape_string($_POST['ptime']);
$delivery_date = mysql_real_escape_string(date("Y-m-d", strtotime($_POST['datepicker1'])));
$delivery_time = mysql_real_escape_string($_POST['dtime']);
$curr_date=date("Y-m-d");
$payment_mode= mysql_real_escape_string($_POST['payment_mode']);
$total_price = mysql_real_escape_string($_POST['total_price']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$pin_code = mysql_real_escape_string($_POST['pin_code']);
$flag=0;

if(isset($_SESSION['phone_no'])) 
 {
	 $flag=1;
	$phone_no=mysql_real_escape_string($_SESSION['phone_no']); 
 }	
 else
 {
	 $name = mysql_real_escape_string($_POST['name']);
  	$email_id= mysql_real_escape_string($_POST['email']);
	$phone_no = mysql_real_escape_string($_POST['pho_no']);
	$pwd = mysql_real_escape_string($_POST['pwd']);
	$pass = mysql_real_escape_string(md5($pwd));	
	$res = mysql_query("select * from sv_user_profile where phone_no='$phone_no'");
	$numrow = mysql_num_rows($res);
	if($numrow == "")
	{		
		$flag=1;
		$res1=mysql_query("insert into sv_user_profile(name,password,phone_no,email_id,date,address,city,pin_code)values('$name','$pass','$phone_no','$email_id','$curr_date','$address','$city','$pin_code')");
		$profile = mysql_fetch_array(mysql_query("select * from sv_user_profile where phone_no='$phone_no' order by signup_id DESC limit 1"));
		$phone_no=$profile['phone_no'];
		
		
	}	 
 }
 if($flag==0)
 {
	 $msg="Exist";
			header("Location:order.php?msg=".$msg);
 }
 else{
	 
 
		mysql_query("insert into sv_user_order(pickup_date,pickup_time,delivery_date,delivery_time,phone_no,payment_mode,payment_status,total_price,date,address,city,pin_code)values('$pickup_date','$pickup_time','$delivery_date','$delivery_time','$phone_no','$payment_mode','pending','$total_price','$curr_date','$address','$city','$pin_code')");		
		
		$query1 = mysql_fetch_array(mysql_query("select * from sv_admin_login"));
		$logo = mysql_real_escape_string($query1['logo']);
		$imgSrc = $query1['site_url'] . "/admincp/admin-logo/$logo";
		$site_name = mysql_real_escape_string($query1['site_name']);
		$admin_email=mysql_real_escape_string($query1['email_id']);
		/*----------------------User email start-------------------*/
		if(!isset($_SESSION['phone_no'])) 
		{
		$subject = 'Your Account & Order has been created Successfully';
		$phone_no = mysql_real_escape_string($phone_no);
		$pwd = mysql_real_escape_string($pwd);
		}
		else{
			$subject = 'Order has been created Successfully';
			$phone_no = mysql_real_escape_string($phone_no);
			$pwd='';
		}
		$subtitle = $site_name . '- Order Details';
		
		$order = mysql_fetch_array(mysql_query("select * from sv_user_order where phone_no='$phone_no' order by order_id DESC limit 1"));
		$order_id=$order['order_id'];
		mysql_query("update sv_cart set phone_no='$phone_no',order_id='$order_id',status='completed' where order_id=''");
		$services_name="";
		$sub_services_name="";
		$packages_price="";
		$fet=mysql_query("select * from sv_cart where order_id='$order_id'");
		while($query=mysql_fetch_array($fet))
		{			
			$sub_id=$query['sub_services_id'];				
			$packages_price=$query['packages_price'];
			echo $packages_price;
			$query2=mysql_fetch_array(mysql_query("select * from sv_services_sub where sid='$sub_id'"));
			$sub_services_name.=$query2['services_sub_name'].'<span class="qty">-&nbsp;Qty'."[".$query['qty']."]</span>";
			$sub_services_name.=",";
				
			$services_id=$query2['services_name'];
			$query3=mysql_fetch_array(mysql_query("select * from sv_services where services_id='$services_id'"));
			$services_name.=$query3['services_name'];
			$services_name.=",";
		}
			$services_name=trim($services_name,",");
			$sub_services_name=trim($sub_services_name,",");
		
		$pickup_date = mysql_real_escape_string($order['pickup_date']);
		$pickup_time = mysql_real_escape_string($order['pickup_time']);
		$delivery_date = mysql_real_escape_string($order['delivery_date']);
		$delivery_time = mysql_real_escape_string($order['delivery_time']);
		$address = mysql_real_escape_string($order['address']);
		$city = mysql_real_escape_string($order['city']);
		$pin_code = mysql_real_escape_string($order['pin_code']);
		
		$user_det = mysql_fetch_array(mysql_query("select * from sv_user_profile where phone_no='$phone_no' order by signup_id DESC limit 1"));


		$message = '<!DOCTYPE HTML>' . '<head>' . '<meta http-equiv="content-type" content="text/html">' . '</head>' . '<body>' . '<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">' . '<img height="50" width="220" style="border-width:0" src="' . $imgSrc . '" title="' . $site_name . '">' . '</div>' . '<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">' . '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">' . 
		'<p>' . $site_name . ' - ' . $subject . '</p>' . 
		'<p> Phone No - ' . $phone_no . '</p>' .
		'<p> Password - ' . $pwd . '</p>' .
		'<p>' . $subtitle . '</p>' . 
		'<p> Product Name - ' . $services_name . '</p>' .
		'<p> Sub Product Name - ' . $sub_services_name . '</p>' .
		'<p> Packages Price - ' . $packages_price . '</p>' . 
		'<p> Pickup Date- ' . $pickup_date . '</p>' .
		'<p> Pickup Time - ' . $pickup_time . '</p>' .
		'<p> Delivery Date - ' . $delivery_date . '</p>' .
		'<p> Delivery Time - ' . $delivery_time . '</p>' . 
		'<p> Address - ' . $address. '</p>' . 
		'<p> City- ' . $city . '</p>' .
		'<p> Pin Code - ' . $pin_code . '</p>' . 
		'<p> Total Price - ' . $order['total_price'] . '</p>' .
		'</div>' . '</div>' . '<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">' . 'All rights reserved @ ' . $site_name . '</div>' . '</body>';
		$to = mysql_real_escape_string($user_det['email_id']); // give to email address
		$subject = 'Account & Order Details - ' . $site_name; //change subject of email
		$from = mysql_real_escape_string($admin_email); // give from email address

		// mandatory headers for email message, change if you need something different in your setting.

		$headers = "From: " . $from . "\r\n";
		$headers.= "MIME-Version: 1.0\r\n";
		$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";

		// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, PHPMail classes etc.)
		// Sending mail

		if (mail($to, $subject, $message, $headers))
			{

			// echo 'Email sent successfully!';

			}
		  else
			{

			// echo 'Problem sending email!';

			} /*--------------------------user email end----------------------*/ /*--------------------------Admin email start----------------------*/
		$subject = 'New Order Received';
		$subtitle = $site_name . '- Order Details';
		$message = '<!DOCTYPE HTML>' . '<head>' . '<meta http-equiv="content-type" content="text/html">' . '</head>' . '<body>' . '<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">' . '<img height="50" width="220" style="border-width:0" src="' . $imgSrc . '" title="' . $site_name . '">' . '</div>' . '<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">' . '<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">' .
		'<p>' . $site_name . ' - ' . $subject . '</p>' .
		'<p>' . $subtitle . '</p>' . 
		'<p> Product Name - ' . $services_name . '</p>' .
		'<p> Sub Product Name - ' . $sub_services_name . '</p>' .
		'<p> Packages Price - ' . $packages_price . '</p>' . 
		'<p> Pickup Date- ' . $pickup_date . '</p>' .
		'<p> Pickup Time - ' . $pickup_time . '</p>' .
		'<p> Delivery Date - ' . $delivery_date . '</p>' .
		'<p> Delivery Time - ' . $delivery_time . '</p>' . 
		'<p> Address - ' . $address. '</p>' . 
		'<p> City- ' . $city . '</p>' .
		'<p> Pin Code - ' . $pin_code . '</p>' . 
		'<p> Total Price - ' . $order['total_price'] . '</p>' .
		'</div>' . '</div>' . '<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">' . 'All rights reserved @ ' . $site_name . '</div>' . '</body>';
		$to = $query1['email_id']; // give to email address
		$subject = 'Order Details - ' . $site_name;

		// change subject of email

		$from = $query1['email_id'];

		// give from email address // mandatory headers for email message, change if you need something different in your setting.
		$headers  = "From: " . $from . "\r\n"; 
		$headers .= "MIME-Version: 1.0\r\n"; 
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
		// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, PHPMail classes etc.) // Sending mail 
		
		if(mail($to, $subject, $message, $headers)) { 
		//echo 'Email sent successfully!'; 
		} else { 
		//echo 'Problem sending email!'; 
		} 

		/*--------------------------Admin email end----------------------*/
		$order = mysql_fetch_array(mysql_query("select * from sv_user_order where phone_no='$phone_no' order by order_id DESC limit 1"));		
		$last_user_phone_no=$order['phone_no'];
		$_SESSION['phone_no'] = $phone_no;
		$last_order_id=$order['order_id'];
		$_SESSION['order_id'] = $last_order_id;
		

		$payment_mode=$order['payment_mode'];
		if($payment_mode=='cash')
		{
			//echo "update sv_cart set order_id='$last_order_id' where phone_no='$phone_no'";
				mysql_query("update sv_cart set phone_no='$phone_no' where order_id='$last_order_id'");
			mysql_query("update sv_user_order set payment_status='completed' where order_id='$last_order_id'");
				$msg="Inserted";
			header("Location:dashboard.php?msg=".$msg);
		}		
		else if($payment_mode=='paypal')
		{
			header("Location:payment.php");		
		}
 }
?>	
	


  

 
