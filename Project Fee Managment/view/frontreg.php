<?php 
require_once('../model/service.php');
$obj=new service();
session_start();
$res=$obj->viewdata('countries');
$res1=$obj->viewdata('register');
while($fet=mysql_fetch_object($res1))
{
	$id=$fet->stud_id;
}
echo $val=$id+1;
$firstname=$_SESSION['firstname'];
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
		
		
     <script language="javascript" type="text/javascript">
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
	</script>
    <script language="javascript" type="text/javascript">
	function getState(country_id) {		
		
		
		var strURL="findState.php?country="+country_id;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;
				       document.getElementById('citydiv').innerHTML='<select name="city">'+
						'<option>Select City</option>'+
				        '</select>';						
					} else {
						alert("Problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	function getCity(state_id) {		
		var strURL="findCity.php?state="+state_id;
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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
<?php echo "<a class='navbar-brand' href='#'>$firstname</a>";?>
        </div>
        
      </div>
    </nav>

    

        <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="listing.php">Full User List</a></li>
            <li><a href="../conroller/logout.php">Logout</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
         

<center>
            <h2>Registration</h2>
<form action="../conroller/regaction.php" method="post" enctype="multipart/form-data">

                        	<div class="col-md-12" align="center">
						<div class="contact-right wow fadeInLeft" data-wow-delay="0.4s">
                        <div><input type="text" class="text" name="id"  id="id" value="Student Id is <?php echo$val; ?>"  readonly><br></div>
								<div><input type="text" class="text" name="firstname" id="firstname" value="Please enter your First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Name';}"><br></div>
                                <div><input type="text" class="text" name="lastname" id="lastname" value="Please enter your Second Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Name';}"><br></div>
                                <div>Gender <input type="radio" class="gender" name="gender" id="status"value="male" checked>Male
					 	 		<input type="radio" class="gender" name="gender" id="gender"value="female">Female</div>
					 			<div> <input type="text" class="text" name="email" id="email" value="Please enter your Email id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Email id';}" class="validate[required,custom[email]]"><br></div>
                                <div><input type="text" class="text" name="phone" id="phone" value="Please enter your Phone no." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Phone no.';}"><br></div>
                                <div><input type="text" class="text" name="parentname" id="parentname" value="Please enter your Parent Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Parent Name';}"><br></div>
                                <div><input type="text" class="text" name="parentmobile" id="parentmobile" value="Please enter your Parent Mobile no." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Please enter your Parent Mobile no.';}"><br></div>
                               
 <select name="name" onChange="getState(this.value)"  class="form-control">
	<option value="">Select Country</option>
	<?php while ($row=mysql_fetch_array($res)) { ?>
	<option value=<?php echo $row['id']?>><?php echo $row['name']?></option>
	<?php } ?>
	</select>
    <div id="statediv"><select name="state"  class="form-control">
	<option>Select State</option>
        </select></div>
        <div id="citydiv">
        <select name="city"  class="form-control" >
	<option>Select City</option>
    
        </select></div>
        <input type="file" name="pic" value="" id="f14" align="center">
								<input class="wow shake" data-wow-delay="0.3s" name="submit" type="submit" value="Register" />
							</form>
						</div>
					</div>
                    
        </div>
    </div>

</html>
