<?php 
include('../connection.php');
include("../header.php");


?>
 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" >-->

 <body class="splash-index">
   
<section class="teaser main-teaser bg-top" >
	<div class="min-space"></div><div class="min-space"></div><div class="min-space"></div>
		<h1 class="sub-title">Order</h1>
		<div class="min-space"></div><div class="min-space"></div>
</section>

<div class="min-space"></div>







<?php if(isset($_SESSION['phone_no'])){?>



<script type="text/javascript">
window.onload = function(){
   document.getElementById('mysend').onclick = function(e){
	   
	   
var status=false; 
	 






				

if(document.getElementById("address").value==""){ 
	  
document.getElementById('address').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('address').style.borderColor = "green"; 
   status=true; 	
}



if(document.getElementById("city").value==""){ 
	  
document.getElementById('city').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('city').style.borderColor = "green"; 
   status=true; 	
}




if(document.getElementById("pin_code").value==""){ 
	  
document.getElementById('pin_code').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('pin_code').style.borderColor = "green"; 
   status=true; 	
}



if(document.getElementById("payment_mode").value==""){ 
	  
document.getElementById('payment_mode').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('payment_mode').style.borderColor = "green"; 
   status=true; 	
}







	  
	  
       return status;
   }
}
</script>




<?php } else { ?>




<script type="text/javascript">
window.onload = function(){
   document.getElementById('send').onclick = function(e){
	   
	   
var status=false; 
	var x=document.getElementById("email").value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  


	  
	  if(document.getElementById("name").value==""){ 
	  
document.getElementById('name').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('name').style.borderColor = "green"; 
   status=true; 	
}
	if(document.getElementById("email").value==""){ 
	  
document.getElementById('email').style.borderColor = "#A94442";  
status=false;  
} 
else if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
{
	document.getElementById('email').style.borderColor = "#A94442";  
status=false;  
} 
else
{
	document.getElementById('email').style.borderColor = "green"; 
   status=true; 	
}	  





if(document.getElementById("pho_no").value==""){ 
	  
document.getElementById('pho_no').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('pho_no').style.borderColor = "green"; 
   status=true; 	
}




if(document.getElementById("pwd").value==""){ 
	  
document.getElementById('pwd').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('pwd').style.borderColor = "green"; 
   status=true; 	
}

				

if(document.getElementById("address").value==""){ 
	  
document.getElementById('address').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('address').style.borderColor = "green"; 
   status=true; 	
}



if(document.getElementById("city").value==""){ 
	  
document.getElementById('city').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('city').style.borderColor = "green"; 
   status=true; 	
}




if(document.getElementById("pin_code").value==""){ 
	  
document.getElementById('pin_code').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('pin_code').style.borderColor = "green"; 
   status=true; 	
}



if(document.getElementById("payment_mode").value==""){ 
	  
document.getElementById('payment_mode').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('payment_mode').style.borderColor = "green"; 
   status=true; 	
}







	  
	  
       return status;
   }
}
</script>

<?php } ?>








<style type="text/css">
#name_error,#email_error
{
	color: red;
    font-size: 13px;
    
}
</style>

<?php 
if(isset($_REQUEST['city_name']))
{
	$city_name=$_REQUEST['city_name'];
}
else{$city_name="";}
?>
<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Inserted")
		{
			echo '<div class="succ-msg">Order Details Inserted Successfully.</div>'; 
		}
else if($msg=="Exist")
		{
			echo '<div class="succ-msg">Phone No already exist</div>'; 
		}		
}
else
	$msg="";


?>



<section class="teaser sv_order">
	<div class="container">	
	<div class="col-md-12">
	<div class="col-md-3"></div>
      <div class="stepwizard col-md-6">
			<div class="stepwizard-row setup-panel">
				<div class="stepwizard-step">
					<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
					<p>Packages</p>
				</div>
				<div class="stepwizard-step">
					<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
					<p>Pickup & Delivery</p>
				</div>
				<div class="stepwizard-step">
					<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
					<p>Products</p>
				</div>
				<div class="stepwizard-step">
					<a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
					<p>Account Details</p>
				</div>
			</div>
	</div>
	<div class="col-md-3"></div>
	</div>

	
      <form role="form" action="order_code.php" accept-charset="UTF-8" method="post" name="f1">
			<div class="row setup-content" id="step-1">
			<div class="col-md-12">
				  <div class="col-md-3"></div>

				<div class="col-md-6">
              <h3>Select Packages</h3>		  
			  
			  	<div class="col-md-12">
				<div class="form-group">
				<?php		
					$res=mysqli_query($con, "select * from sv_packages");
					while($row=mysqli_fetch_array($res))
					{			
				?>
				<div class="col-md-6">
				<div class="packages">
				<h4><?php echo $row['packages_name']; ?></h4>
				<h5><i class="fa fa-money" aria-hidden="true"></i>&nbsp;<?php echo $row['price']; ?>&nbsp;<?php echo $currency_mode; ?></h5>
				<h6><?php echo $row['description']; ?></h6>
				<button type="button" class="select-button nextBtn" id="packages" name="packages" value="<?php echo $row['id'];?>" onclick="javascript:price_desc(this.value);">Select</button>
				<!--<input type="radio" id="packages" name="packages" value="<?php echo $row['id'];?>" onchange="javascript:price_desc(this.value);">-->
				<input  type="hidden"  class="form-control" id="price" name="price" >
				<input type="hidden" class="form-control"  id="desc" name="desc">	
				</div>
				</div>
				
				<?php
					}
				?>
			</div>
			</div>
		
             <!--<button class="btn btn-primary nextBtn pull-right next-button" type="button" >Next</button>-->
      </div>
	  <div class="col-md-3"></div>
	  </div>
	  
        </div>
		<div class="row setup-content" id="step-2">
			  <div class="col-md-3"></div>
          <div class="col-md-6">
			<div class="col-md-12">
              <h3> Pickup & Delivery</h3>
			  <div class="space"></div>
  			  	<div class="row">
				<div class="col-md-6">
              <div class="form-group">
			  <script src="../js/jquery-1.9.1.js"></script>
					<script src="../js/jquery-ui.js"></script>		
					<link rel="stylesheet" href="../css/jquery-ui.css">
					
<script>
$(function(){
 $('#datepicker1').datepicker({
        dateFormat: "dd-mm-yy" 
    });

    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy", 
        minDate:  0,
        onSelect: function(date){            
            var date1 = $('#datepicker').datepicker('getDate');           
            var date = new Date( Date.parse( date1 ) ); 
            //date.setDate( date.getDate() + 1 );  
			date.setDate( date.getDate());  			
            var newDate = date.toDateString(); 
            newDate = new Date( Date.parse( newDate ) );                      
            $('#datepicker1').datepicker("option","minDate",newDate);            
        }
    });
	});
</script>
				
				
					<label class="control-label">Pickup date</label>
				<input type="text" id="datepicker" name="datepicker"  placeholder="Select date" class="form-control" required>
			</div>
			</div>
			
			  	<div class="col-md-6">
              <div class="form-group">
            <label class="control-label">Pickup Time</label>
			<select id="ptime" name="ptime" class="form-control dropbox" required>
				<option value="">None</option>
			
				<option value="6:00 AM">06:00 AM</option>
				<option value="7:00 AM">07:00 AM</option>
				<option value="8:00 AM">08:00 AM</option>
				<option value="9:00 AM">09:00 AM</option>
				<option value="10:00 AM">10:00 AM</option>
				<option value="11:00 AM">11:00 AM</option>
				<option value="12:00 PM">12:00 PM</option>
				<option value="1:00 PM">01:00 PM</option>
				<option value="2:00 PM">02:00 PM</option>
				<option value="3:00 PM">03:00 PM</option>
				<option value="4:00 PM">04:00 PM</option>
				<option value="5:00 PM">05:00 PM</option>
				<option value="6:00 PM">06:00 PM</option>
				<option value="7:00 PM">07:00 PM</option>
				<option value="8:00 PM">08:00 PM</option>
				<option value="9:00 PM">09:00 PM</option>
				<option value="10:00 PM">10:00 PM</option>
			</select>
          </div></div>
		  
		  </div>
		  
		  <div class="row">
		  <div class="col-md-6">
              <div class="form-group">			  
            <label class="control-label">Delivery date</label>
			<input type="text" id="datepicker1" name="datepicker1" placeholder="Select date" class="form-control" required  />
          </div>
		  </div>
			  	<div class="col-md-6">
              <div class="form-group">
            <label class="control-label">Delivery Time</label>
			<select id="dtime" name="dtime" class="form-control dropbox" required>
	<option value="">None</option>

	<option value="6:00 AM">06:00 AM</option>
	<option value="7:00 AM">07:00 AM</option>
	<option value="8:00 AM">08:00 AM</option>
	<option value="9:00 AM">09:00 AM</option>
	<option value="10:00 AM">10:00 AM</option>
	<option value="11:00 AM">11:00 AM</option>
	<option value="12:00 PM">12:00 PM</option>
	<option value="1:00 PM">01:00 PM</option>
	<option value="2:00 PM">02:00 PM</option>
	<option value="3:00 PM">03:00 PM</option>
	<option value="4:00 PM">04:00 PM</option>
	<option value="5:00 PM">05:00 PM</option>
	<option value="6:00 PM">06:00 PM</option>
	<option value="7:00 PM">07:00 PM</option>
	<option value="8:00 PM">08:00 PM</option>
	<option value="9:00 PM">09:00 PM</option>
	<option value="10:00 PM">10:00 PM</option>
	<!--<option value="11:00 PM">11:00 PM</option>--->
</select>
          </div></div>
		  </div>
		  
         <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
            </div>
      </div>
	  <div class="col-md-3"></div>
        </div>
    <div class="row setup-content" id="step-3">
          <div class="container">
		
		    <div class="col-md-8">				
			<ul class="nav nav-tabs">
			<?php		
				$res=mysqli_query($con, "select * from sv_services");
				while($row=mysqli_fetch_array($res))
				{		
					$sid=$row['services_id'];												
			?>
			<li class="service_name"><a data-toggle="tab" href="#<?php echo $sid; ?>services"><?php echo $row['services_name']; ?></a></li>					 
			<?php
				}
			?>    
			</ul>
			<div class="tab-content">
			<?php		
				$res1=mysqli_query($con, "select * from sv_services");
				while($row1=mysqli_fetch_array($res1))
				{		
					$sid=$row1['services_id'];
			?>
			<div id="<?php echo $sid; ?>services" class="tab-pane fade in active">						
			<?php
				$query=mysqli_query($con, "select * from sv_services_sub where services_name='$sid'");
				while($fetch=mysqli_fetch_array($query))
				{
					$sub_name=$fetch['services_sub_name'];						
			?>
			<div class="product">
				<div class="sub_product col-md-4"> 
					<h6><?php echo $sub_name; ?></h6>
					<img src="<?php echo $site_url; ?>/admincp/images/<?php echo $fetch['sub_services_pic'];?>">
					<h5><?php echo $fetch['price']; ?><?php echo $currency_mode; ?></h5>
					<input type="number" id="<?php echo $fetch['sid']; ?>qty" name="qty" value="1" placeholder="Quantity">
					<button class="cart" type="button" onclick="javascript:cart_function(<?php echo $fetch['sid']; ?>);">Add to Cart</button>
				</div>
			</div>
			<?php } ?>
			</div>
		<?php } ?>
		</div>  
		</div>
		
        <div class="col-md-4">
		<h4 class="shop_cart">Shopping Cart</h4>
		<table class="table service-table">
			<thead class="thead-inverse">
			<tr>
				<th>Sno</th>
				<th>Name</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Action</th>
				</tr>
			</thead>
			<?php
			$sno="";			
			$product_price ="";
			$pack_price="";
			$total_price="";
			
			$cart=mysqli_query($con, "select * from sv_cart where phone_no='$user' and status='pending'");
			 
			while($result=mysqli_fetch_array($cart))
			{	
				$sno++;
				$services_id=mysqli_real_escape_string($result['sub_services_id']);	
				$query=mysqli_fetch_array(mysqli_query("select * from sv_services_sub where sid='$services_id'"));	
				$pack_price=$result['packages_price'];
				$product_price += $result['amount']*$result['qty'];	
				$total_price=$product_price+$pack_price;
				$status=$result['status'];
			?>
			<tbody>
			<tr>
			<?php if($status=="pending") { ?>
				<td><?php echo $sno;?></td>
				<td><?php echo $query['services_sub_name'];?></td>
				<td><?php echo $result['qty'];?></td>
				<td><?php echo $result['amount'];?></td>
				<td><a href="javascript:cart_del('<?php echo $result['id'];?>');"><i class="fa fa-times remove" aria-hidden="true"></i></a></td>	
			<?php } ?>
			</tr>   
		</tbody>
			<?php }  ?>
			<?php 
			$cart=mysqli_query($con, "select * from sv_cart order by id desc");
			isset($numrow[$cart]);
			$numrow=mysqli_num_rows($cart);
			$fetch=mysqli_fetch_array($cart);
			$status=$fetch['status'];
			if(!$numrow==0 )
			{
			?>
			<tr>			
				<td colspan="5" align="right"><strong>Packages Price : </strong><?php  echo $pack_price;?><?php echo $currency_mode; ?></td>
			</tr><tr>			
				<td colspan="5" align="right"><strong>Product Price : </strong><?php echo $product_price;?><?php echo $currency_mode; ?></td>
			</tr>
			<tr>			
			<input type="hidden" id="total_price" name="total_price" value="<?php echo $total_price;?>">
				<td colspan="5" align="right"><strong>Total : </strong><?php echo $total_price;?><?php echo $currency_mode; ?></td>
			</tr>
			<?php } ?>
		</table>
		
		</div>  
		
		 <div class="sv_min_price nextBtn pull-right" id="sv_min_price">
		<?php 
		if($total_price!="") { 
			?>
         <button class="btn btn-primary nextBtn pull-right" type="button" >Proceed to Checkout</button>
		<?php } ?>
		</div>
            </div>
      </div>
        </div>
		
		
		<?php
			if(isset($_SESSION['phone_no']))
            {    
                $phone_no=mysqli_real_escape_string($_SESSION['phone_no']);     
                $user_info=mysqli_fetch_array(mysqli_query("select * from sv_user_profile where phone_no='$phone_no'"));
				$address=$user_info['address'];
				$city=$user_info['city'];
				$pin_code=$user_info['pin_code'];
			}
		?>
		 <div class="row setup-content" id="step-4">
		  <div class="col-md-3"></div>
          <div class="col-md-6">
        <div class="col-md-12">
              <h3> Account / Payment details</h3>
			  <div class="space"></div>
			  <?php
				if(!isset($_SESSION['phone_no']))
				{  ?>   
			   <div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Name</label>
				<input type="text"  id="name" name="name"  class="form-control">
				<span id="name_error"></span>
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Email</label>
					<input type="text"  id="email" name="email" class="form-control">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Phone No</label>
					<input type="number"  id="pho_no" name="pho_no" class="form-control">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Password</label>
				<input type="password"  id="pwd" name="pwd" class="form-control">
			</div>
			</div>
			<?php } ?>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Address</label>
				<input type="text"  id="address" name="address" value="<?php if(isset($_SESSION['phone_no'])) { if($address!="") { echo $address;} else {} } ?>" class="form-control">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">City</label>
				<input type="text"  id="city" name="city" value="<?php if(isset($_REQUEST['city_name'])) { echo $city_name;}else	{if(isset($_SESSION['phone_no'])) { if($city!="") { echo $city;} else {} } } ?>" class="form-control">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Pin Code</label>
				<input type="text"  id="pin_code" name="pin_code" value="<?php if(isset($_SESSION['phone_no'])) { if($pin_code!="") { echo $pin_code;} else {} }?>" class="form-control">
			</div>
			</div>
			  
			
			<div class="col-md-6">
				<div class="form-group">
				<label class="control-label">Payment Mode</label>
				<select id="payment_mode" name="payment_mode" class="user-login__input dropbox" style="margin-top:0px !important;"  onchange="javascript:payment_check(this.value);">
					<option value="">None</option>
					<option value="cash">Cash</option>
					<?php 
						$paypal=mysqli_fetch_array(mysqli_query("select * from sv_admin_login"));
						$paypal_id=$paypal['paypal_id'];
						if($paypal_id!=="")
						{
					?>
					<option value="paypal">Paypal</option>
					<?php } ?>
				</select>
			</div>
			</div>
			
			
            </div>
			<div class="col-md-12">
			<?php if(isset($_SESSION['phone_no'])){ $sname="mysend"; } else { $sname="send"; }?>
              <input class="btn btn-success pull-right final-butt" type="submit" id="<?php echo $sname;?>" value="Submit">
			  </div>
      </div>
		  <div class="col-md-3"></div>
        </div>
  </form>
  </div>
<div class="min-space"></div>
</section>
<div class="min-space"></div>

</body>

<?php include("../footer.php") ?>
