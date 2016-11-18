<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
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

<body>
<?php

	require_once('../model/service.php');
	$obj=new service();

	session_start();
	
		if(isset($_POST['submit']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			
		$field="username,password";
		$value="'$username','$password'";
		$condition=" username='$username' && password='$password' ";
		$res=$obj->selectdatawhere('register',$condition);
			
				$rows=mysql_num_rows($res);
				
					if($rows>0)
					{
						$row=mysql_fetch_object($res);
						 $firstname=$row->firstname;
						 $role=$row->role;
						 $_SESSION['role']=$role;
						$_SESSION['firstname']=$firstname;
						 	
	
						
						$_SESSION['role']=$role;
						$_SESSION['firstname']=$firstname;
							if($role==admin)
							{
								header('location:../view/Dashboard.php');
							}
							else
							{
								
								header('location:"../view/Dashboard.php"');
							}
							
					}
					
					else
					{
						echo "Invalid Username and Password";
						header('location:loginpage.php');
					}
			
		}
?>
<form method="post" action="">
<center>
<h2>Login</h2>

<div class="col-md-12" align="center">
						<div class="contact-right wow fadeInLeft" data-wow-delay="0.4s">
							<form>
								<input type="text" class="text" name="username" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}"><br>
					 			<input type="password" class="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><br>
					 	 		
								<input class="wow shake" data-wow-delay="0.3s" name="submit" type="submit" value="Login" />
							</form>
						</div>
					
				
			
							</div>
</body>
</html>