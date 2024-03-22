<?php $page = 'edit profile'; ?>

<?php 
@session_start();
if(isset($_SESSION['phone_no']))
{
?>
 
<?php include("../connection.php");
@session_start();
if(isset($_SESSION['phone_no']))
	{		
		$phone_no=mysql_real_escape_string($_SESSION['phone_no']);
			
		$query=mysql_fetch_array(mysql_query("select * from sv_user_profile where phone_no='$phone_no'"));
		$address=mysql_real_escape_string($query['address']);	
		
	}	
?>


<!--<script type="text/javascript">
window.onload = function(){
   document.getElementById('mysubmit').onclick = function(e){
	   
	   
var status=false; 
	 






				

if(document.getElementById("name").value==""){ 
	  
document.getElementById('name').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('name').style.borderColor = "green"; 
   status=true; 	
}



if(document.getElementById("phone_no").value==""){ 
	  
document.getElementById('phone_no').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('phone_no').style.borderColor = "green"; 
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



if(document.getElementById("address").value==""){ 
	  
document.getElementById('address').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('address').style.borderColor = "green"; 
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


if(document.getElementById("gender").value==""){ 
	  
document.getElementById('gender').style.borderColor = "#A94442";  
status=false;  
}
else
{
	document.getElementById('gender').style.borderColor = "green"; 
   status=true; 	
}



	
	  
	 return true; 
       
   }
}
</script>-->


<?php 
if(isset($_REQUEST['postal_code']))
{
	$postal_code=mysql_real_escape_string($_REQUEST['postal_code']);
}
else{$postal_code="";}
?>

  <body class="splash-index">
       <?php include("../header.php");
include("validation.php");	   ?> 

<section class="teaser main-teaser bg-top">
<div class="min-space"></div>
<div class="min-space"></div>
<div class="min-space"></div>
<h1 class="sub-title">Edit your account</h1>
<div class="min-space"></div>
<div class="min-space"></div>
</section>


<section class="teaser">
<div class="min-space"></div>
<form class="form-large" action="javascript:edit_profile('add')" accept-charset="UTF-8" method="post" id="edit_profile">

<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Updated")
		{
		      echo '<div class="succ-msg">Your Profile has been updated Successfully.</div>';
		}
		else if($msg=="Error")
			{
		      echo '<div class="err-msg">Server Error</div>';		
			}
}
else
	$msg="";
?>
<!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>	--->


<div class="container">

<div class="col-lg-3 col-md-3 col-sm-3">
<?php include("side_menu.php") ?>

</div>
<div class="col-lg-9 col-md-9 col-sm-9">
<h3 align="center">Edit your account</h3>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">Name</span>
	<input type="text" value="<?php echo $query['name']; ?>"  class="user-login__input user-login__input validate[required]" id="name">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">Phone No</span>
	<input type="text" value="<?php echo $query['phone_no']; ?>" class="user-login__input user-login__input validate[required,custom[number]]" id="phone_no">
    <div class="err" style="color:#e00000" id="pno_err"></div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">city</span>
	<input type="text" value="<?php echo $query['city']; ?>"  class="user-login__input user-login__input validate[required]" id="city">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">Address</span>
	<input type="text" value="<?php echo $query['address']; ?>"  class="user-login__input user-login__input validate[required]" id="address">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">Pin Code</span>
	<input type="text" value="<?php echo $query['pin_code']; ?>"  class="user-login__input user-login__input validate[required]" id="pin_code">
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<span class="title">Gender</span>
	<select id="gender" name="gender" class="user-login__input user-login__input validate[required]">
		<option value="">None</option>
		<option value="1" <?php { if($query['gender']=="1") echo "selected='selected'"; }?>>Male</option>
		<option value="2" <?php { if($query['gender']=="2") echo "selected='selected'"; }?>>Female</option>
	</select>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
	<input type="submit" class="user-login__action" value="Update" id="mysubmit" >
</div>

</div>

</div>

</form><div class="min-space"></div>
</section>


   <?php include("../footer.php") ?>
   
  
</html>
<?php } else { header('Location:sign_in.php'); }?>

