  <body class="splash-index">
    
<?php include("../header.php");
include("validation.php");
?>

<section class="teaser main-teaser bg-top">
<div class="min-space"></div>
<div class="min-space"></div><div class="min-space"></div>
<h1 class="sub-title">Sign In / Register</h1>
<div class="min-space"></div>
<div class="min-space"></div>

</section>

<div class="user-login-container">
  <div class="user-login-errors">
    
  </div>
  <div class="container">

<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="success")
		{
		      echo '<div class="succ-msg">Account created successfully. please login your account </div>';
		}	
			else if($msg=="Exist")
			{
		      echo '<div class="err-msg">Phone No already exist</div>';		
			}
			else if($msg=="Invalid")
			{
		      echo '<div class="err-msg">Invalid username or Password</div>';		
			}
			
}
else
	$msg="";
?>
<!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
</div>
 
		<div class="container">
		<div class="min-space"></div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
		<div class="user-login">
	        <h1 class="user-login__heading">Sign in to your account</h1>
			<form class="form-large" action="javascript:login();" accept-charset="UTF-8" method="post" id="login_form">
				<input placeholder="Phone No" type="tel"  class="user-login__input user-login__input validate[required,custom[number]]" name="phone_no" id="phone_no" />
				<input placeholder="Password"  class="user-login__input user-login__input--password validate[required]" type="password" name="password" id="password" />
				<input type="submit" value="Sign In" class="user-login__action" />
				
				<a class="user-login__forgot-password" href="forgot.php">Forgot your password?</a>
				<input value="true" type="hidden" name="user[remember_me]" id="user_remember_me" />
				<input type="hidden" name="initial_origin" id="initial_origin" />				
			</form>
		</div>
		</div>
		
				<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
		<div class="container user-login">
        <h1 class="user-login__heading">Create an account</h1>
		<form class="form-large" action="signup_add_code.php" accept-charset="UTF-8" method="post" id="register_form">
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Name" class="user-login__input user-login__input validate[required]" name="name" id="name">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Email Id"  class="user-login__input user-login__input--email validate[required,custom[email]]" name="email_id" id="email_id">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
		<input type="tel" placeholder="Phone No"   class="user-login__input user-login__input--tel validate[required,custom[number]]" name="phone_no" id="phone_no">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="password" placeholder="Password"  class="user-login__input user-login__input validate[required]" name="password" id="password">
		</div>	
		
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="text" placeholder="City"  class="user-login__input user-login__input validate[required]" name="city" id="city">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Address"  class="user-login__input user-login__input validate[required]" name="address" id="address">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<input type="text" placeholder="Pin Code"  class="user-login__input user-login__input validate[required,custom[number]]" name="pin_code" id="pin_code">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-md-6 col-sm-6">
			<select id="gender" name="gender" class="user-login__input user-login__input validate[required]">
				<option value="">gender</option>
				<option value="1">Male</option>
				<option value="2">Female</option>
			</select>
		</div>
		<input type="submit" value="Sign Up" class="user-login__action" />
		</form>
		</div>
		</div>
		</div>
</div>


    <?php include("../footer.php") ?>
	
  </html>
