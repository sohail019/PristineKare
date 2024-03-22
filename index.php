<?php
	include("./header.php");
	?>

  <body class="index-index splash splash-video">

<section id="main-teaser" class="teaser sv_header">
 
 <div class="main-teaser-content">
   <div class="teaser-content">
	<div class="container">
      <h1>PristineKare<br /></h1>
      <p>
        <span>One Call, Cleans it All<br/></span>
      </p>

      <div class="signup inline-submit">

	<form class="new_bid" id="new_bid" action="users/postal_code.php" accept-charset="UTF-8" data-remote="true" method="post">
	<input name="utf8" type="hidden" value="&#x2713;" /><?php 
include('connection.php');
if(isset($_REQUEST['tiny']))
{
	$tiny=$_REQUEST['tiny'];
	?>
	<div class="tooltip_over">
	<div class="tooltip fade in">
		<div class="tooltip-arrow"></div>
		<div class="tooltip-inner">Our service not available to this Postal code</div>                                                                                                                                                                             
 	</div>
	</div>
				
<?php
}
else{$tiny="";}
?>
		<div class="col-lg-2 col-md-2 col-sm-2 "></div>
		<div class="col-lg-4 col-md-4 col-sm-4 postal">
			
			<select  name="postal_code" id="postal_code" class="user-login__input user-login__input postalcode validate[required]"> 
				<option value="">Select Postal Code / City</option>
				<?php		
				$res=mysqli_query($con, "select * from sv_postal_code order by postal_id");
				while($row=mysqli_fetch_array($res))
				{					
				?>
				<option value="<?php echo $row['postal_code'];?>"><?php echo $row['postal_code'];?></option>
				<?php
				}
				?>
			</select>
			</div>	
			<div class="col-lg-4 col-md-4 col-sm-4">
				<input type="submit" name="commit" value="Book a cleaning" class="btn-primary signup__button" data-checkpostcode="true" />
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 "></div>
	</form>
</div>
</div>
    </div>
	<div class="min-space"></div>
  </div>
</section>

<?php 
$query=mysqli_fetch_array(mysqli_query($con, "select * from sv_pages where id=1"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
<?php echo $content;?>
<link href="validation/validationEngine.jquery.css" rel="stylesheet">
    <script type="text/javascript" src="validation/jquery.validationEngine-en.js"></script>
    <script type="text/javascript" src="validation/jquery.validationEngine.js"></script>
	<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function(){
			jQuery("#new_bid").validationEngine({showOneMessage:true,promptPosition : "topLeft",scroll: false});
		});
		</script>
<?php include("footer.php")?>
  
  </body>

</html>
