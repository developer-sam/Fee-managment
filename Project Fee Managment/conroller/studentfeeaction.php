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
 $id=$_GET['passid'];
		 

if(isset($_POST['submit']))
		{	
		
		$stud_id=$_POST['stud_id'];
		$firstname=$_POST['firstname'];
		 $course=$_POST['course'];
	
		$date=$_POST['date'];
		$pay=$_POST['pay'];
		$total=$_POST['total'];
		$install=$_POST['install'];
		 $payinn=$_POST["payinn"];
		$payin=$_POST["payin"];
		$ddate=$_POST['ddate'];
		$pdate=$_POST['pdate'];
		$rid=$_POST['rid'];
		$rname=$_POST['rname'];
		
		$condition="id='$course'";
		$res2=$obj->selectdatawhere('course',$condition);
		$fet22=mysql_fetch_object($res2);
		echo $amount=$fet22->amount;
		if($course='1' || $course='3')
		{
		$exp_date=date('y-m-d',strtotime("+90days"));
		}
		else
		{
		$exp_date=date('y-m-d',strtotime("+30days"));
		}
		if($payinn=="")
		{
			echo $bamount=$amount-$payin;
		$condition="firstname='$firstname',course='$course',amount='$amount',date='$date',pay='$pay',total='$total',install='$install',bamount='$bamount',payin='$payin',ddate='$ddate',pdate='$pdate',rid='$rid',rname='$rname',paidstatus='1',exp_date='$exp_date'";
		
		}
		else
		{
			echo $bamount=$amount-$payinn;
			$condition="firstname='$firstname',course='$course',amount='$amount',date='$date',pay='$pay',total='$total',install='$install',bamount='$bamount',payin='$payinn',ddate='$ddate',pdate='$pdate',rid='$rid',rname='$rname',paidstatus='1',exp_date='$exp_date'";
			
		}
		$field='stud_id';
		$value="$id";
				
				
				$res=$obj->updatedata('register',$condition,$field,$value);
				
				header('location:../view/listing.php');
		}
		
		
?>
</body>
</html>