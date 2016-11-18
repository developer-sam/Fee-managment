<?php 
$con = mysql_connect('localhost', 'root', ''); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('fees');
$query="SELECT * FROM course";
$result=mysql_query($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

   

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css"/>
        <script src="../js/jquery-1.6.min.js" type="text/javascript"></script>
        <script src="../js/jquery.validationEngine.js" type="text/javascript" ></script>
		<script src="../js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
        <script>
            
			jQuery(document).ready(function(){
			
			// binds form submission and fields to the validation engine
			jQuery("#myform").validationEngine();
			jQuery('#myform').validationEngine('validate');
		});
        </script>
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="../js/jquery.min.js"></script>
		<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="../js/wow.min.js"></script>
		<script>
		 new WOW().init();
		</script>
		<link href="../css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		</script>
     <script language="javascript" type="text/javascript">
function paym(paid)
{
	
	
	if(paid=="instalment")
	{	
		document.getElementById("payment").style.display="none";
		document.getElementById("payments").style.display="inline";
	}
	else
	{
		document.getElementById("payments").style.display="none";
		document.getElementById("payment").style.display="inline";
	}
}
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();//The XMLHttpRequest object is used to exchange data with a server behind the scenes
		}
		catch(e)	{		
			try{	//All modern browsers (IE7+, Firefox, Chrome, Safari, and Opera) have a built-in XMLHttpRequest object.
		
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{ //To handle all modern browsers, including IE5 and IE6, check if the browser supports the XMLHttpRequest object. If it does, create an XMLHttpRequest object, if not, create an ActiveXObject:
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	function getCity(stateId) {		
		var strURL="findAmount.php?state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>
 <link href="../css/dashboard.css" rel="stylesheet">
 
    <script src="../js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
  <?php

require_once('../model/service.php');
$obj=new service();
	session_start();
	$role=$_SESSION['role'];
	
	$res=$obj->viewdata('register');
	while($row=mysql_fetch_array($res))
{
	 $reg_id=$row['stud_id'];
	 $name=$row['firstname'];

}
echo $rid=$reg_id+101;

$fname=$_SESSION['firstname'];
 
 
	
 
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container-fluid">
        <div class="navbar-header">
          
<?php echo "<a class='navbar-brand' href='#'>$fname</a>";?>
        </div>
        
      </div>
    </nav>

    

        <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="listing.php">Full User List</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         
<a href="listing.php"><button type="button" class="btn btn-info">Skip</button></a>
<?php 
require_once('../model/service.php');
$obj=new service();
$regid=$_GET['ids'];
$fields="stud_id";
$res=$obj->selectdata('register',$fields,$regid);
$fet=mysql_fetch_object($res);
?>
<div class="table-responsive">
<center>
            <table class="table table-striped">
              <tbody>
            <h2>Student Fee Detail</h2>
<form action="../conroller/studentfeeaction.php?passid=<?php echo $reg_id;?>" method="post" enctype="multipart/form-data">
<div class="col-md-12" align="center">
						
                            <tr><td>Student Id:</td>

<td><input type="text" name="stud_id" class="form-control" readonly value="<?php echo $reg_id?>"></td>
<tr>
<tr><td >Student Name:</td>
<td><input type="text" name="firstname" placeholder="your name" id="f2" class="form-control" readonly value="<?php echo $name?>"></td>
<tr>
    <td>Course Name</td>
    
    <td ><select name="course" id="f3" onChange="getCity(this.value)" class="form-control">
	<option value="">Select course</option>
	<?php while ($row=mysql_fetch_array($result)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } ?>
	</select></td>
  
  <tr>
    <td>Amount</td>
    
    <td ><div id="citydiv"><input type="text" name="amount" value="" id="f4" class="form-control"></div></td>
  </tr>
<tr><td>Joining Date:</td>
<td><input type="date" name="date" id="f5"  value="" class="form-control"></td></tr>
<tr><td>payment mode:</td>
<td>
<select name="pay" id="f6" onChange="paym(this.value);" class="form-control">
<option value=""> select mode </option>
<option value="full payment"> Full Payment </option>
<option value="instalment"> As Installment </option>
</select>
</td></tr>
</table>
<div id="payments" style="display:none">
<table class="table table-striped">
              <tbody>
              
<tr><td>Total Instalment:</td>
<td><input type="text" name="total"class="form-control"  value="<?php echo "0";?>" id="f7"></td></tr>
<tr><td > Installment No:</td>
<td><input type="text" name="install" value="<?php echo "1";?>" class="form-control"id="f8"></td></tr>

<tr><td >Pay Install Amount:</td>
<td><input type="text" name="payinn" class="form-control"id="f10"></td></tr>
<tr><td >Due Date:</td>
<td><input type="date" name="ddate"class="form-control" id="f11"></td></tr>
<tr><td >Pay Date:</td>
<td><input type="date" name="pdate" value="<?php echo date('Y-m-d')?>" readonly  class="form-control"id="f12"></td></tr>
<tr><td >Receipt Id:</td>
<td><input type="text" name="rid" value="<?php echo $rid;?>" class="form-control"id="f13"></td></tr>
<tr><td >Reciever name</td>
<td><input type="text" name="rname" class="form-control"id="f14" value="admin"></td></tr>
<tr><td></td><td><input type="submit" name="submit" value="Fee Updation"></td></tr>
</table>
</div>

<div id="payment" style="display:none">
<table class="table table-striped">
              <tbody>
<tr><td >Pay Amount:</td>
<td><input type="text" name="payin" id="f10" class="form-control" ></td></tr>
<tr><td >Pay Date:</td>
<td><input type="date" name="pdate" value="<?php echo date('Y-m-d')?>" readonly id="f12" class="form-control" value=""></td></tr>
<tr><td >Receipt Id:</td>
<td><input type="text" name="rid" value="<?php echo $rid;?>"  readonly id="f13" class="form-control" value=""></td></tr>
<tr><td >Reciever name</td>
<td><input type="text" name="rname" id="f14" class="form-control" value="admin"></td></tr>

</table>
<input name="submit" type="submit" value="Fee Updation" class="submit"/>

</div>
</form>
            <?php
require_once('../model/service.php');
if(isset($_POST['submit']))
{
 $course = $_POST["course"];	
	
		
	 $pay = $_POST["pay"];
	 $total = $_POST["total"];
	
	 $install = $_POST["install"];
	
	echo $bamount = $_POST["bamount"];
	echo $payin = $_POST["payin"];
	 $ddate = $_POST["ddate"];
 $pdate = $_POST["pdate"];
 $condition="id='$course'";
		$res2=$obj->selectdatawhere('course',$condition);
		$fet22=mysql_fetch_object($res2);
		 $amount=$fet22->amount;
	  $bamounts=$bamount-$payin;
	$id=$_GET['ids'];
		$obj=new service();
    $condition="course='$course',amount='$amount', pay='$pay',total='$total',install='$install',bamount='$bamount',payin='$payin',ddate='$ddate',pdate='$pdate',paidstatus='1'";
	$field="stud_id";
    $res=$obj->updatedata("register",$condition,$field,$id);
      $id=mysql_insert_id();
header("location:../view/listing.php");
}

?>            	
						</div>
					</div>
                    
        </div>
    </div>

</html>
