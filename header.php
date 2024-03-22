<html>
 <?php 
 include("connection.php");
 @session_start();
    $res=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM sv_admin_login"));        
    $admin_email=mysqli_real_escape_string($con, $res['email_id']);
    $site_name=mysqli_real_escape_string($con, $res['site_name']);
    $logo=mysqli_real_escape_string($con, $res['logo']);    
    $favicon=mysqli_real_escape_string($con, $res['favicon']);
    $site_desc=mysqli_real_escape_string($con, $res['site_desc']);
    $keyword=mysqli_real_escape_string($con, $res['keyword']);
    $site_url=mysqli_real_escape_string($con, $res['site_url']);
    $currency_mode=mysqli_real_escape_string($con, $res['currency_mode']);

 ?>
 <!----------set cookies------------------->
 
 <?php 
  if(isset($_SESSION['phone_no']))
  {
	  $user=$_SESSION['phone_no'];
  }
  else
  {
	/*if(!isset($_COOKIE['phone_no']))
	{
		$random=strtotime(date('Y-m-d H:i:s'));
		$_COOKIE['phone_no']=$random;
		$user=$_COOKIE['phone_no'];	
		
		$cookie_name = 'cleanmaster';
		$cookie_value = 'cleanmaster_cookie_set_with_php';
		$user=setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/'); 
	}
	else
	{
		$user=$_COOKIE['phone_no'];	
	}*/
	
	if(!isset($_COOKIE['phone_no']))
	{
		$rand= strtotime(date("Y-m-d H:I:s"));
		setcookie('phone_no',$rand,time()+(86400*30));
		$user= isset($_COOKIE['phone_no']);
		echo $user;
	}
	else
	{
		$user=$_COOKIE['phone_no'];
	}	
  }
 ?>
 
 <title><?php echo $site_name;?></title>
  <link rel="icon" href="admincp/admin-logo/<?php echo $favicon;?>" >
  <head>
    <meta name="description" content="<?php echo $site_desc; ?>">
    <meta name="keywords" content="<?php echo $keyword; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
       
    <script type="text/javascript" src="<?php echo $site_url; ?>/users/validation.js"></script>
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/style.css" />
    <script src="<?php echo $site_url; ?>/js/responsive-nav.js"></script>
    <link rel="stylesheet" media="screen" href="<?php echo $site_url; ?>/css/index.css" />
    <link rel="stylesheet" media="screen" href="<?php echo $site_url; ?>/css/responsive.css" />
    <script src="<?php echo $site_url; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $site_url; ?>/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo $site_url; ?>/css/bootstrap.min.css" type="text/css">
	<script type="text/javascript">
        var nav = responsiveNav('.nav-collapse', { // Selector
        animate: true, // Boolean: Use CSS3 transitions, true or false
        transition: 284, // Integer: Speed of the transition, in milliseconds
        label: 'Menu', // String: Label for the navigation toggle
        insert: 'before', // String: Insert the toggle before or after the navigation
        customToggle: '.nav-toggle'
      });
    </script>
	
	
	
	
	  <!--<link href="validation/parsley.css" rel="stylesheet">
    
    <script type="text/javascript" src="validation/parsley.js"></script>-->
	
	
	
	
    </head>
    

    <header class="header-main header-main--light">
        <nav class="site-nav reversed">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-static-top marginBottom-0" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                            if($logo=="") { ?>    
                                <a href="<?php echo $site_url; ?>" class="site-logo"><img src="<?php echo $site_url; ?>/admincp/admin-logo/default-logo.png" alt="" ></a>
                            <?php } else {     ?>
                                <a href="<?php echo $site_url; ?>" class="site-logo"><img src="<?php echo $site_url; ?>/admincp/admin-logo/<?php echo $logo;?>"></a>
                            <?php } ?>     
                    </div>
                    
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right">
                            <li><a class="nav__link" href="<?php echo $site_url; ?>/users/howitworks.php">How it Works</a></li>
                            <li><a class="nav__link" href="<?php echo $site_url; ?>/users/pricing.php">Pricing</a></li>
                            <li><a class="nav__link" href="<?php echo $site_url; ?>/users/help.php">Help</a></li>
                            <li><a class="nav__link" href="<?php echo $site_url; ?>/users/contact.php">Contact</a></li>
                            <?php
                                if(!isset($_SESSION['phone_no'])) { ?>
                                <li><a class="nav__link sign-in" href="<?php echo $site_url; ?>/users/sign_in.php">Sign in</a></li><?php } ?>
                             <li><a class="nav__link nav__link--prominent" href="<?php echo $site_url; ?>/users/order.php">Post Your Order</a></li>
                                <?php                                     
                                    if(isset($_SESSION['phone_no']))
                                    {    
                                        $phone_no=mysqli_real_escape_string($con, $_SESSION['phone_no']);            
                                        $query=mysqli_fetch_array(mysqli_query($con, "select * from sv_user_profile where phone_no='$phone_no'"));
                                ?>
                                 <li class="dropdown dropdown-submenu user_menu"><a href="<?php echo $site_url; ?>/users/dashboard.php" class="dropdown-toggle nav__link" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $query['name'];?> &nbsp; <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $site_url; ?>/users/dashboard.php">Order Details</a></li>
                                    <li><a href="<?php echo $site_url; ?>/users/order.php">Post your Order</a></li>
                                    <li><a href="<?php echo $site_url; ?>/users/edit-profile.php">Edit Profile</a></li>
                                    <li><a href="<?php echo $site_url; ?>/users/change_password.php">Change password</a></li>
                                    <li><a href="<?php echo $site_url; ?>/users/apply.php">Become a Service Provider</a></li>
                                    <li><a href="<?php echo $site_url; ?>/users/logout.php">Sign out</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </nav>
    </header>  
<script type="text/javascript">
  $(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
		  allWells = $('.setup-content'),
		  allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
	  e.preventDefault();
	  var $target = $($(this).attr('href')),
			  $item = $(this);

	  if (!$item.hasClass('disabled')) {
		  navListItems.removeClass('btn-primary').addClass('btn-default');
		  $item.addClass('btn-primary');
		  allWells.hide();
		  $target.show();
		  $target.find('input:eq(0)').focus();
	  }
  });

  allNextBtn.click(function(){
	  var curStep = $(this).closest(".setup-content"),
		  curStepBtn = curStep.attr("id"),
		  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		  curInputs = curStep.find("input[type='text'],select,input[type='url'],textarea[textarea]"),
		  isValid = true;

	  $(".form-group").removeClass("has-error");
	  for(var i=0; i<curInputs.length; i++){
		  if (!curInputs[i].validity.valid){
			  isValid = false;
			  $(curInputs[i]).closest(".form-group").addClass("has-error");
		  }
	  }

	  if (isValid)
		  nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
});
  </script>	