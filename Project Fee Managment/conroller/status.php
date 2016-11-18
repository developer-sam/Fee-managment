<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysql_connect("$servername","$username","$password");
mysql_select_db('fees');

 $id=$_GET['id'];
echo $sql="select status from register where stud_id=$id";
$res=mysql_query($sql);
$fet=mysql_fetch_object($res);
echo $status=$fet->status;

if($status==active)
{
	$sql2="update register set status='inactive' where stud_id='$id'";
	$res2=mysql_query($sql2);
	header('location:../view/listing.php');
}
if($status==inactive)
{
	$sql2="update register set status='active' where stud_id='$id'";
	$res2=mysql_query($sql2);
	header('location:../view/listing.php');
}


?>
</body>
</html>