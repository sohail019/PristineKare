<?php
session_start();
include ('../connection.php');
include ('../header.php');
if(isset($_SESSION['phone_no']))
{
$order_id=  mysqli_real_escape_string($_SESSION["order_id"]);
//Set useful variables for paypal form 
$query=mysqli_fetch_array(mysqli_query("select * from sv_admin_login"));
$site_mode=$query['paypal_site_mode'];
$cur_code=$query['currency_mode'];
$site_url=$query['site_url'];
$paypal_id = $query['paypal_id']; //Business Email

if($site_mode=="test")
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
else if($site_mode=="live")
	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Live PayPal API URL

?>
 <section class="teaser bg-top ">
 <div class="min-space"></div><div class="min-space"></div><div class="min-space"></div>
 <h3 class="sub-title">Payment Confirmation</h3>
<div class="min-space"></div>
<div class="min-space"></div>
</section>
<!--fetch products from the database--->
<?php
		$sno="";
		$results = mysqli_query("select * from sv_user_order where order_id='$order_id'");
		while($row=mysqli_fetch_array($results))
		{
			$sno++;
			$services_name="";
			$sub_services_name="";
			$total_price=$row['total_price'];
			$payment_mode=$row['payment_mode'];
			
			$order_id=$row['order_id'];
			$fet=mysqli_query("select * from sv_cart where order_id='$order_id'");
			while($query=mysqli_fetch_array($fet))
			{
				$sub_id=$query['sub_services_id'];				
				$packages_price=$query['packages_price'];
				$query2=mysqli_fetch_array(mysqli_query("select * from sv_services_sub where sid='$sub_id'"));
				$sub_services_name.=$query2['services_sub_name'].'<span class="qty">-&nbsp;Qty'."[".$query['qty']."]</span>";
				$sub_services_name.=",";
				
				$services_id=$query2['services_name'];
				$query1=mysqli_fetch_array(mysqli_query("select * from sv_services where services_id='$services_id'"));
				$services_name.=$query1['services_name'];
				$services_name.=",";
				$pack_id=$query['packages_price'];
			}
			$pack=mysqli_fetch_array(mysqli_query("select * from sv_packages where price='$pack_id'"));
			$services_name=trim($services_name,",");
			$sub_services_name=trim($sub_services_name,",");
	?>

	
<head>
<title>Order</title>

</head>
<body>
<div class="user-login-container">

<div class="container text-center">
<div class="min-space"></div>

<table class="table service-table">
			<thead class="thead-inverse">
			<tr>
				<th>Sno</th>
				<th>Product_Name</th>
				<th>Sub_Product_Name</th>
				<th>Packages_Price</th>
				</tr>
			</thead>
			<?php
			
			?>
			<tbody>
			<tr>
				<td><?php echo $sno;?></td>
				<td><?php echo $services_name; ?></td>
				<td><?php echo $sub_services_name; ?></td>
				<td><?php  echo $pack['price'];?>&nbsp;<?php echo $cur_code; ?></td>
			</tr>   
		</tbody>
			
			<tr>			
			<input type="hidden" id="total_price" name="total_price" value="<?php echo $total_price;?>">
				<td colspan="3" align="right"><strong>Total : </strong><?php echo $row['total_price'];?>&nbsp;<?php echo $cur_code; ?></td>
			</tr>
		</table>


    <form action="<?php echo $paypal_url; ?>" method="post">

        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $pack['packages_name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['order_id'];?>">
        <input type="hidden" name="amount" value="<?php echo $total_price; ?>">
        <input type="hidden" name="currency_code" value="<?php echo $cur_code; ?>">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='<?php echo $site_url;?>/users/cancel.php'>
		<input type='hidden' name='return' value='<?php echo $site_url;?>/users/success.php'>
		<input type="submit" name="submit" value="Pay now" class="paynow">
     
    
    </form>
    <?php } ?>
	</div>
	
</div>	
</body>

<?php include('../footer.php'); ?>
<?php } else { header('Location:sign_in.php'); }?>
