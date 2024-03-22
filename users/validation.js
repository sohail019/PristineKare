var xmlHttp
xmlHttp=GetXmlHttpObject()

function login(str)
{
	var msg="";
	var phone_no=document.getElementById("phone_no").value;
	var pwd=document.getElementById("password").value;
		
	if(msg=="")
	{
		var url="login_code.php?pno="+phone_no+"&pwd="+pwd;	
		xmlHttp.onreadystatechange=function()
 		{	   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
  			{
  				var msg=xmlHttp.responseText.trim();
				if(msg=="welcome")
  					window.location="dashboard.php";
				else if(msg=="Invalid")
				{
					window.location="sign_in.php?msg="+msg;				
				}
  				
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
	else
		document.getElementById("err_id").innerHTML=msg;
}


function forgot()
{
	var msg="";	
	var phone_no=document.getElementById("phone_no").value;
if(msg=="")	
	{
		var url="forgot_pwd_code.php?phone_no="+phone_no;	

		xmlHttp.onreadystatechange=function()
		{		
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{	
				var msg=xmlHttp.responseText.trim(); 
				if(msg=="Invalid")
					{				
						var msg="Invalid";
						window.location="forgot.php?msg="+msg;				
					}					
					else if(msg=="success")
					{
						window.location="forgot.php?msg="+msg;				
					}
			}
		}
	}
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);
}


//Change password start here
function change_pwd(str)
{
	var msg="";
	var curpwd=document.getElementById("cur_pwd").value;
	var newpwd=document.getElementById("new_pwd").value;
	var conpwd=document.getElementById("confirm_pwd").value;
	if (newpwd != conpwd) 
	{
        alert("Passwords do not match.");
     }
	else {
	if(msg=="")
	{
		var url="change_pwd_code.php?curpwd="+curpwd+"&newpwd="+newpwd+"&conpwd="+conpwd;
		xmlHttp.onreadystatechange=function () 
		{
			if (xmlHttp.readyState==4 && xmlHttp.status==200) 
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="success")
				{
					var msg="Success";
					window.location="change_password.php?msg="+msg;				
				}
				else if(msg=="Invalid")
				{
					window.location="change_password.php?msg="+msg;				
				}
				else
				document.getElementById("err").innerHTML=msg;
			}
		} 		
		xmlHttp.open("post",url,true);
		xmlHttp.send(null);
	}
}
}

//Profile Edit Code start Here
function edit_profile(str)
{
	var name=document.getElementById("name").value;
	var pno=document.getElementById("phone_no").value;
	var city=document.getElementById("city").value;
	var address=document.getElementById("address").value;
	var pin_code=document.getElementById("pin_code").value;
	var gender=document.getElementById("gender").value;
	if(str=="add")
	{
		var url="editpro_add.php?name="+name+"&pno="+pno+"&city="+city+"&address="+address+"&pin_code="+pin_code+"&gender="+gender+"&action="+str;		
		xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)  				{
  					var msg=xmlHttp.responseText.trim(); 
					
					if(msg=="Updated")
					{				
						var msg="Updated";
						window.location="edit-profile.php?msg="+msg;				
					}		
					else if(msg=="Error")
					{
						window.location="edit-profile.php?msg="+msg;				
					}
					else if(msg=="Exist")
					{
						document.getElementById("pno_err").innerHTML="Phone No Already Exist";
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);		
	}		
	
}

//Become a cleaner Function Start Here	
function cleaner(str)
{	
	var email=document.getElementById("email").value;
	var cemail=document.getElementById("cemail").value;
	var fname=document.getElementById("fname").value;	
	var lname=document.getElementById("lname").value;
	var mob_no=document.getElementById("mob_no").value;
	var post_code=document.getElementById("post_code").value;
	var exp=document.getElementById("exp").value;
	var paid_work=document.getElementById("paid_work").value;
	var gender=document.getElementById("gender").value;
	var dob=document.getElementById("datepicker").value;
	var nation=document.getElementById("nation").value;
	var address=document.getElementById("address").value;
	var suburb=document.getElementById("suburb").value;
	var abt=document.getElementById("abt").value;

	if(str=="add")
	{
		 var url="cleaner_add.php?email="+email+"&cemail="+cemail+"&fname="+fname+"&lname="+lname+"&mob_no="+mob_no+"&post_code="+post_code+"&exp="+exp+"&paid_work="+paid_work+"&gender="+gender+"&dob="+dob+"&nation="+nation+"&address="+address+"&suburb="+suburb+"&abt="+abt+"&action="+str;
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  	
					if(msg=="Inserted")
					{				
						var msg="Inserted";
						window.location="apply.php?msg="+msg;				
					}					
					else if(msg=="Error")
					{
						window.location="apply.php?msg="+msg;				
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	
/*  Contact us start here -------------------*/
function contact(str)
{	
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var pho_no=document.getElementById("pho_no").value;	
	var msg=document.getElementById("msg").value;
	
	if(str=="add")
	{
		 var url="contact_add.php?name="+name+"&email="+email+"&pho_no="+pho_no+"&msg="+msg+"&action="+str;
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  	
					if(msg=="Inserted")
					{				
						var msg="Inserted";
						window.location="contact.php?msg="+msg;				
					}					
					else if(msg=="Error")
					{
						window.location="contact.php?msg="+msg;				
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	
/* order new function start here -----------------------*/
function price_desc(str)
{
	var url="price_desc_change.php?id="+str;
	xmlHttp.onreadystatechange=function()
	 {   
		if(xmlHttp.readyState==4 && xmlHttp.status==200)
  		{
			var msg=xmlHttp.responseText.trim();
			var d=msg.split("&&");			
			document.getElementById("price").value=d[0];
			document.getElementById("desc").value=d[1];
		}
	 }
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);      
}

function cart_function(str)
{
	var qty=document.getElementById(str+"qty").value;
	var pack=document.getElementById("price").value;
	//var pack=document.getElementById("packages").value;
	var url="cart_code.php?id="+str+"&qty="+qty+"&pack="+pack+"&action=add";
	xmlHttp.onreadystatechange=function()
	 {   
		if(xmlHttp.readyState==4 && xmlHttp.status==200)
  		{
			var msg=xmlHttp.responseText.trim();
			if(msg=="Inserted")
			{				
				//$('#thisdiv').load(document.URL +  ' #thisdiv');
				$( "table" ).load( "order.php table" );
				$('#sv_min_price').load('order.php #sv_min_price'); 
			}
			
		}
	 }
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);      
}
function cart_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="cart_code.php?hid="+str+"&action=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						$( "table" ).load( "order.php table" );
						$('#sv_min_price').load('order.php #sv_min_price'); 
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    var aVersions = [ "MSXML2.XMLHttp.5.0",
        "MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0",
        "MSXML2.XMLHttp","Msxm12.XMLHTTP","Microsoft.XMLHttp"];

    for (var i = 0; i < aVersions.length; i++) 
	 {
        try {
            var xmlHttp = new ActiveXObject(aVersions[i]);
            return xmlHttp;
            } 
		catch (oError) 
		   {
            //Do nothing
           }
    }
    }
  catch (e)
    {
    }
  }
  if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
return xmlHttp;
}