<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

require_once('../model/service.php');
$obj=new service();
	session_start();
	
	if(isset($_POST['submit']))
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$parentname=$_POST['parentname'];
		$parentmobile=$_POST['parentmobile'];
		$name=$_POST['name'];
		$state=$_POST['state'];
		$city=$_POST['city'];
		$pic=$_FILES['pic']['name'];
  		move_uploaded_file($_FILES['pic']['tmp_name'],"images/".$pic);
  
$field="firstname,lastname,gender,email,phone,parentname,parentmobile,name,state,city,pic,status";
$value="'$firstname','$lastname','$gender','$email','$phone','$parentname','$parentmobile','$name','$state','$city','$pic','active'";

				$res1=$obj->insertdata('register',$field,$value);
		header('location:../view/studentfee.php');
		
	}

?>
</body>
</html>