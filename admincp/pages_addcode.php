<?php
include('../connection.php');
header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
$pname=$_POST['pname'];

$type=$_POST['typ'];
if($type=='add')
{	
	/*if(mysqli_query("insert into sv_pages(page_name)values('$pname')"))
		echo "Inserted";
	else
		echo "Server Error";
		header("Location:pages.php");*/

}
else if($type=='update')
{
	$page_content=mysqli_real_escape_string($_POST['page_content']);
	$id=$_POST['id'];
		mysqli_query($con, "update sv_pages set page_name='$pname', page_content='$page_content' where id='$id'");
		//echo "Updated";
		?>
		<script type="text/javascript">
		var msg="Updated";
		window.location="pages.php?msg="+msg;				
		</script>
			
<?php		
}


?>