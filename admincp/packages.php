<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("../connection.php"); ?>
<?php 
if(isset($_REQUEST['packages_id']))
	{		
		$packages_id=$_REQUEST['packages_id'];
		$res=mysqli_query("select * from sv_packages where id='$packages_id'");
		$row=mysqli_num_rows($res);
		if($row==0)
	 	{
		 
		  $packages_name="";
		  $price="";
		  $desc="";
		  $typ="add";
		  
		}
		else
		{			
			$fet=mysqli_fetch_array($res);	
			
			$packages_name=mysqli_real_escape_string($fet['packages_name']);	
			$price=mysqli_real_escape_string($fet['price']);	
			$desc=mysqli_real_escape_string($fet['description']);			
			$typ="update";
		}		
	}
	else
	{
		
		$packages_name="";
		$price="";
		$desc="";
		$typ="add";
	}
	$page = 'packages';
?>

<body>
    <div id="wrapper">
        <?php include("top_menu.php") ?>
        <!--/. NAV TOP  -->
        <?php include("side_menu.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Packages
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#"> Packages</a></li>
					</ol>		
		</div>
            <div id="page-inner">
			    <div class="panel-body">
			<div class="text-center">
				<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Inserted")
		{
		      echo '<div class="succ-msg">Inserted Successfully.</div>';
		}
		else if($msg=="Updated")
			{
		      echo '<div class="succ-msg">Updated Successfully</div>';		
			}
			else if($msg=="Deleted")
			{
		      echo '<div class="succ-msg">Deleted Successfully</div>';		
			}
}

else
	$msg="";
?>
	</div>
			<form class="" name="service_s" id="service_s" method="post" enctype="multipart/form-data" action="packages_add.php">
			<input type="hidden" id="typ" name="typ" value="<?php echo $typ;?>">
			<input type="hidden" id="hid" name="hid" value="<?php echo $packages_id;?>">
				<div class="col-lg-3 col-md-3 col-sm-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-6 table-bg">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
						<label> Packages Name</label>				
						<input type="text" id="pname" class="form-control" required="required" name="pname" value="<?php echo $packages_name;?>">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
						<label> Price</label>				
						<input type="text" id="price" class="form-control" required="required" name="price" value="<?php echo $price;?>">
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="form-group">
						<label> Description</label>
					<textarea id="desc" name="desc" required="required" class="form-control"><?php echo $desc; ?></textarea>
					</div>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6">					
					<input type="submit" value="Submit Packages" class="btn btn-warning">
				</div>
				</div>
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					</div>
			</form>

		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Packages
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th> Packages Name</th>
											<th>Price</th>
											<th>Description</th>
											<th>Update</th>
											<th>Delete</th>	
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										$res=mysqli_query($con, "select * from sv_packages ORDER BY id DESC");
										while($row=mysqli_fetch_array($res))
										{
											$sno++;
											$id=mysqli_real_escape_string($con, $row['id']);				
											$packages_name=mysqli_real_escape_string($con, $row['packages_name']);				
									?> 
									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $packages_name; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td><?php echo $row['description']; ?></td>
											<td><a href="packages.php?packages_id=<?php echo $id;?>"><img src="images/file_edit.png"  alt="update" title="update" ></a></td>
											<td><a href="javascript:packages_del('<?php echo $id;?>');"><img src="images/delete.png" alt="" title="delete"></a></td>
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
