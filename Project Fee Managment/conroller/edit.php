
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
$id=$_GET['id'];

$field="stud_id";
$value="$id";
$res=$obj->selectdata('register',$field,$value);

$fet=mysql_fetch_object($res);

if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$parentname=$_POST['parentname'];
		$parentmobile=$_POST['parentmobile'];
		$pic=$_FILES['pic']['name'];
  		move_uploaded_file($_FILES['pic']['tmp_name'],"images/".$pic);
		
		$condition="firstname='$firstname',lastname='$lastname',gender='$gender',email='$email',phone='$phone',parentname='$parentname',parentmobile='$parentmobile',pic='$pic'";
		$field='stud_id';
		$value="$id";

				$res=$obj->updatedata('register',$condition,$field,$value);
				header('location:../view/listing.php');
		
		
}

?>
    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container-fluid">
        <div class="navbar-header">
          
<?php echo "<a class='navbar-brand' href='#'>Sam Mathew</a>";?>
        </div>
        
      </div>
    </nav>

    

        <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="../view/listing.php">Full User List</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <center><h2>Edit Profile</h2> </center>

<div class="table-responsive">
<center>
            <table class="table table-striped table-bordered">
            <form method="post" action="" enctype="multipart/form-data">
            <thead></thead>
              <tbody>
              
              <tr><th>First Name</th><td><input type="text" name="firstname" value="<?php echo $fet->firstname;?>" class="form-control"></td></tr>
              <tr><th>Last Name</th><td><input type="text" name="lastname" value="<?php echo $fet->lastname;?>" class="form-control"></td></tr>
			  <tr><th>Gender</th><td><input type="text" name="gender" value="<?php echo $fet->gender;?>" class="form-control"></td></tr>
              <tr><th>Email</th><td><input type="text" name="email" value="<?php echo $fet->email;?>" class="form-control"></td></tr>
              <tr><th>Mobile</th><td><input type="text" name="phone" value="<?php echo $fet->phone;?>" class="form-control"></td></tr>
              <tr><th>Parent Name</th><td><input type="text" name="parentname" value="<?php echo $fet->parentname;?>" class="form-control"></td></tr>
              <tr><th>Parent Mobile</th><td><input type="text" name="parentmobile" value="<?php echo $fet->parentmobile;?>" class="form-control"></td></tr>
              <tr><th>Image</th><td>
	<img src="../conroller/images/<?php echo $pic=$fet->pic;?>" height='40px' width='50px' class="img-circle">
              <input type="file" name="pic" value="<?php echo $pic=$fet->pic;?>" id="f14" align="right"></td></tr>
			
           
				</table>
<input name="submit" type="submit" value="Update Details" class="submit"/>
			
	

             	
						</div>
					</div>
                    
        </div>
    </div>

</html>
