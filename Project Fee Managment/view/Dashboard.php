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

   

    <!-- Bootstrap core CSS -->
   
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
 <link href="../css/dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body >
  
  <?php

require_once('../model/service.php');
$obj=new service();
	session_start();
	$role=$_SESSION['role'];
	
	$res=$obj->viewdata('register');
	
$firstname=$_SESSION['firstname'];
 
 
	
 
?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
<?php echo "<a class='navbar-brand' href='#'>$firstname</a>";?>
        </div>
        
      </div>
    </nav>

    


        <div class="container-fluid">
      <div class="row">
        


         
<?php


		if($role=='admin')
		{
		echo "<center><h2 >Welcome To Admin Page </h2>";
		echo "<center><h4>Login by $firstname </h4></br>";
		}
		?>
       
            <div class="col-lg-4 ">
      <a href="frontreg.php"><img src="../conroller/images/adduser.png" width="150px" height="150px" class="img-rounded"  style="background-color:#888585"></a>
              </div>
            <div class="col-lg-4 ">
              <a href="listing.php"><img src="../conroller/images/viewlist.png" width="150" height="150" class="img-rounded"  style="background-color:#888585"></a>
              
            </div>
            <div class="col-lg-4 ">
           <a href="../conroller/logout.php"><img src="../conroller/images/logout.png" width="150" height="150" class="img-rounded"  style="background-color:#888585"></a></div>
           
				
    </div>
</div>
          </div>
        </div>
    </div>

</html>
