<?php
include('../connection.php');
?>

  <body class="splash-index">
  
    <?php include("../header.php");
	include("validation.php");
	?>
    
<!--<script type="text/javascript">
function validates(){  
var name=document.f1.name.value; 
var email=document.f1.email.value;   
var emailpattern =/^[a-zA-Z][a-zA-Z0-9_]*(\.[a-zA-Z0-9_]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.([a-zA-Z]{2,4})$/;
var status=false;  
  
if(name.length<1){  
document.getElementById("name_error").innerHTML=  
" <img src='../img/unchecked.gif'/> Please enter your name";  
status=false;  
}



if(email.length<1){  
document.getElementById("email_error").innerHTML=  
" <img src='../img/unchecked.gif'/> Please enter the email id";  
status=false;  
}
else if(!emailpattern.test(email))
{
	document.getElementById("email_error").innerHTML=  
" <img src='../img/unchecked.gif'/> Please enter a valid email address.";  
status=false;  
}





  

return status;  
}  
</script>
<style type="text/css">
#name_error,#email_error
{
	color: red;
    font-size: 13px;
    position: relative;
    top: -10px;
}
</style>-->
<section class="teaser bg-top">
<div class="min-space"></div>
<div class="min-space"></div>
<div class="min-space"></div>
<?php 
$query=mysqli_fetch_array(mysqli_query($con, "select * from sv_pages where id=5"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
<h1 class="sub-title"><?php echo $page_name; ?></h1>
<div class="min-space"></div>
<div class="min-space"></div>
</section>
<div class="container">
<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Inserted")
		{
		      echo '<div class="succ-msg">Your Enquiry send successfully. We will get back to you soon..</div>';
		}
		else if($msg=="Error")
			{
		      echo '<div class="err-msg">Server Error</div>';		
			}
}
else
	$msg="";
?>
<!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
</div>

<section class="teaser">
<form class="form-large" action="javascript:contact('add')" accept-charset="UTF-8" method="post" id="f1">

<div class="container apply_form">
<div class="min-space"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="col-lg-12 col-md-12 col-sm-12">
	<span class="title">Name</span>
	<input type="text" value="" class="user-login__input user-login__input validate[required]" id="name">
	<span id="name_error"></span>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
	<span class="title">Email</span>
	<input type="text" value="" class="user-login__input user-login__input validate[required,custom[email]] text-input" id="email"  >
	<span id="email_error"></span>
</div><div class="col-lg-12 col-md-12 col-sm-12">
	<span class="title">Phone No</span>
	<input type="text" value="" class="user-login__input user-login__input validate[required,custom[number]] text-input" id="pho_no" >
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
	<span class="title">Message</span>
	<input type="text" value=""  class="user-login__input user-login__input validate[required]" id="msg">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
	<input type="submit" class="user-login__action" value="Send">
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6">


<?php echo $content; ?>

</div>

</div>
</form>
		
<div class="min-space"></div>
</section>

<?php include("../footer.php") ?>

 
  </body>

</html>
