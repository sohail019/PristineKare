<?php $page = 'dashboard'; ?>

<?php 
@session_start();
if(isset($_SESSION['phone_no']))
{
?>
<?php include("../connection.php");
@session_start();
if(isset($_SESSION['phone_no']))
	{		
		$phone_no=mysqli_real_escape_string($con, $_SESSION['phone_no']);
		//$res=mysqli_fetch_array(mysqli_query("
		
		select * from sv_login where phone_no='$phone_no'"));
		//$uname=$res['phone_no'];		
		$query=mysqli_fetch_array(mysqli_query($con, "select * from sv_user_profile where phone_no='$phone_no'"));
		//$address=mysqli_real_escape_string($query['address']);		
		$uname=mysqli_real_escape_string($con, $query['phone_no']);		
	}	
?>
<?php 
if(isset($_REQUEST['postal_code']))
{
	$postal_code=mysqli_real_escape_string($con, $_REQUEST['postal_code']);
}
else{$postal_code="";}
?>
  <body class="splash-index">
      <?php include("../header.php") ?>
    

<section class="teaser main-teaser bg-top">
<div class="min-space"></div>
<div class="min-space"></div>
<div class="min-space"></div>
<h1 class="sub-title">Dashboard</h1>
<div class="min-space"></div>
<div class="min-space"></div>
</section>

<style type="text/css">

body{overflow-x:hidden;}

</style>
<section class="teaser">
<div class="min-space"></div>
<div class="container">
<div class="col-lg-3 col-md-3 col-sm-3">

<?php include("side_menu.php") ?>
<div class="min-space"></div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9">

<h3>Order Details</h3>


<div class="table-responsive">
  <table class="table">
     <thead>
        <tr>
            <th>SNo</th>	
			<!--<th >Services_Name</th>-->
			<th>Product_Name</th>
			<th>Packages_price</th>
			
			<th>Order_ID</th>
			<th>Pickup_date</th>
			<th>Pickup_Time</th>
			<th>Delivery_Date</th>
			<th>Delivery_time</th>
			<th>Address</th>
			<th>City</th>
			<th>Pin_Code</th>
			<!--<th>Price</th>-->
			<th>Payment_Mode</th>
			<th>Payment_Status</th>
			<!--<th>Currency_Code</th>-->
			<th>Total_price</th>
			
			
        </tr>
     </thead>
	 <?php
		$sno=0;
		$res=mysqli_query($con, "select * from sv_user_order where phone_no='$phone_no' ORDER BY order_id DESC");
		while($row=mysqli_fetch_array($res))
		{
			$sno++;
			$services_name="";
			$sub_services_name="";
			$packages_price="";
			$order_id=$row['order_id'];
			$fet=mysqli_query($con, "select * from sv_cart where order_id='$order_id'");
			while($query=mysqli_fetch_array($fet))
			{
				$sub_id=$query['sub_services_id'];				
				$packages_price=$query['packages_price'];
				$query3=mysqli_fetch_array(mysqli_query($con, "select * from sv_packages where price='$packages_price'"));
				
				$query2=mysqli_fetch_array(mysqli_query($con, "select * from sv_services_sub where sid='$sub_id'"));
				$sub_services_name.=$query2['services_sub_name'].'<span class="qty">-&nbsp;Qty'."[".$query['qty']."]</span>";
				$sub_services_name.=",";
				
				$services_id=$query2['services_name'];
				$query1=mysqli_fetch_array(mysqli_query($con, "select * from sv_services where services_id='$services_id'"));
				$services_name.=$query1['services_name'];
				$services_name.=",";
				
				$date=mysqli_real_escape_string(date("d-m-Y",strtotime($row['pickup_date'])));
				$delivery_date=mysqli_real_escape_string(date("d-m-Y",strtotime($row['delivery_date'])));					
			}
			$services_name=trim($services_name,",");
			$sub_services_name=trim($sub_services_name,",");

	?>  
	<tbody>
	<tr>
		<td><?php echo $sno; ?></td>
		<!--<td><?php echo $services_name; ?></td>-->
		<td><?php echo $sub_services_name; ?></td>
		<td><?php echo $query3['packages_name'];?>-(<?php echo $packages_price;?><?php echo $currency_mode; ?>)</td>

		<td><?php echo $row['order_id']; ?></td>
		<td><?php echo $date; ?></td>
		<td><?php echo $row['pickup_time']; ?></td>
		<td><?php echo $delivery_date; ?></td>
		<td><?php echo $row['delivery_time']; ?></td>
		<td><?php echo $row['address']; ?></td>
		<td><?php echo $row['city']; ?></td>
		<td><?php echo $row['pin_code']; ?></td>
		<!--<td><?php echo $row['price']; ?></td>--->
		<td><?php echo $row['payment_mode']; ?></td>
		<td><?php echo $row['payment_status']; ?></td>
		<!--<td><?php echo $row['currency_code']; ?></td>-->
		<td><?php echo $row['total_price']; ?> <?php echo $currency_mode; ?></td>
		

	</tr>
	</tbody>
		<?php } ?>	
  </table>
</div>

</div>
</div>
<div class="min-space"></div>

</section>

   <?php include("../footer.php") ?>
   
   
</html>
<?php } else { header('Location:sign_in.php'); }?>


