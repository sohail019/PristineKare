<?php include("../connection.php");
@session_start();
if(!isset($_SESSION['user_nam']))
	header("Location:index.php");
else
{		
	$user_name=mysqli_real_escape_string($con, $_SESSION['user_nam']);			
	$res=mysqli_fetch_array(mysqli_query($con, "select * from sv_admin_login where user_name='$user_name'"));
	$uname=mysqli_real_escape_string($res['user_name']);
}	
$page = 'order';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div id="wrapper">
        <?php include("top_menu.php") ?>
        <!--/. NAV TOP  -->
        <?php include("side_menu.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Order
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Order</a></li>
					</ol>		
		</div>
            <div id="page-inner">
<?php
if(isset($_REQUEST['msg']))
	$msg=$_REQUEST['msg'];
else
	$msg="";
?>

<div class="err" style="color:red" id="err_id"><?php echo $msg;?></div>	
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Order
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
								
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
<script type="text/javascript">
$('#datatable-default').dataTable({
	"iDisplayLength": 5,
	"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
});
</script>
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
										    <th>User_Name</th>
											<th>Phone_No</th>
											<th>Order_ID</th>
											<th >Services_Name</th>
											<th>Product_Name</th>
											<th>Packages_price</th>											
											<th>Pickup_Date</th>
											<th>Pickup_Time</th>
											<th>Delivery_Date</th>
											<th>Delivery_Time</th>
											<th>Address</th>
											<th>City</th>
											<th>Pin_Code</th>
											<th>Total_Price</th>
											<th>Payment_Mode</th>
											<th>Payment_Status</th>
											<!--<th>Currency_Code</th>-->
                                        </tr>
                                    </thead>
									<tbody>
									<?php
									$sno=0;
									$res=mysqli_query($con, "select * from sv_user_order ORDER BY order_id DESC");
									while($row=mysqli_fetch_array($res))
									{
										$sno++;
										$services_name="";
										$sub_services_name="";
										$phone_no=mysqli_real_escape_string($con, $row['phone_no']);
										$pickup_date=mysqli_real_escape_string($con, date("d-m-Y",strtotime($row['pickup_date'])));
										$user=mysqli_fetch_array(mysqli_query($con, "select * from sv_user_profile where phone_no='$phone_no'"));
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
					
												$date=mysqli_real_escape_string($con, date("d-m-Y",strtotime($row['pickup_date'])));	
										}
										$services_name=trim($services_name,",");
										$sub_services_name=trim($sub_services_name,",");

									?>									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $user['name'];?></td>
											<td><?php echo $row['phone_no']; ?></td>
											<td><?php echo $row['order_id'];?></td>
											<td><?php echo $services_name; ?></td>
											<td><?php echo $sub_services_name; ?></td>
											<td><?php echo $query3['packages_name'];?>-(<?php echo $packages_price;?><?php echo $currency_mode; ?>)</td>
											<td><?php echo $pickup_date; ?></td>
											<td><?php echo $row['pickup_time']; ?></td>
											<td><?php echo date("d-m-Y",strtotime($row['delivery_date'])); ?></td>
											<td><?php echo $row['delivery_time']; ?></td>
											<td><?php echo $row['address']; ?></td>
											<td><?php echo $row['city']; ?></td>
											<td><?php echo $row['pin_code']; ?></td>
											<td><?php echo $row['total_price']; ?> <?php echo $currency_mode; ?></td>
											<td><?php echo $row['payment_mode']; ?></td>
											<td><?php echo $row['payment_status']; ?></td>
											<!--<td><?php echo $currency_mode; ?></td>-->
										</tr>
										<?php } ?>		
									</tbody>															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                   </div>
				   				<?php include("footer.php") ?>

    </div>
             <!-- /. PAGE INNER  -->
            </div>
		
</body>
 
</html>
