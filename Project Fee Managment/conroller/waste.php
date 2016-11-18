<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>admin</title>
</head>

<body bgcolor="#0AFBBB">
<center>
<form action="" method="post" enctype="multipart/form-data" >

course:
<select name="course">
<option value="">select course </option>
<option value="PHP Three Months">PHP Three Months </option>
<option value="PHP One Month">PHP One Month </option>
<option value="ASP Three Month">ASP Three Month </option>
<option value="ASP One Month">ASP One Month </option>
</select>
student id:
<input type="studid" name="studid" value=""> 
student name:
<input type="text" name="sname" value=""> 
<!--Course:
<select name="course">
<option value="">
<option value="PHP Three Months">PHP Three Months</option>
<option value="PHP One Month">PHP One Month</option>
<option value="ASP Three Month">ASP Three Month</option>
<option value="ASP One Month">ASP One Month</option>
</select>-->
<input type='submit' name='search' value='search'>
</form>
<?php
require_once('../model/service.php');
$obj=new service(); 
$res1=$obj->selectionsixnolim('register');
session_start();

$num_rec_per_page=2;
if(isset($_GET["page"]))
{
	$page=$_GET["page"];
}
else
{
	$page=1;
}
$start_from = ($page-1) * $num_rec_per_page; 
$res=$obj->selectwithlimit('register',$start_from,$num_rec_per_page);

while($result=mysql_fetch_array($res))
{
echo "<td>".$result['stud_id']."</td>";
$idi=$result['stud_id'];
echo "<td>".$result['fname']."</td>";
echo "<td>".$result['email']."</td>";
echo "<td>".$result['phno']."</td>";
echo "<td>".$result['pname']."</td>";
echo "<td>".$result['mobile']."</td>";
echo "<td>".$result['pic'];
echo "<img src='../model/images/$result[pic]' height='60' width='50'></td>";
echo "<td>".$result['course']."</td>";
echo "<td>".$result['amount']."</td>";
echo "<td> <a href='../view/edit.php?ids=$result[stud_id]'><img src='../model/images/edit.png' width=30px hieght=30px> </a> </td>";
echo $bamount=$result['bamount'];
if($bamount!=0)
{
echo " <td><a href='../view/add_fee.php?ids=$result[stud_id]'> add fee </a></td>";
}
else
{
	echo "<td> amount paid</td>";
}
echo "<td><button type='button'><a href='../controller/status.php?id=$idi'>$result[status]</button></td>";
echo "<td> <a href='../view/print.php?ids=$result[stud_id]'><img src='../model/images/print.jpg' width=30px hieght=30px> </a> </td><tr>";
/*echo "<td><a href='status.php?id=$id'><input type='submit' name='st' value='$row[status]'></a></td>";*/
}
echo "</table>";
$num_rec_per_page=2;
echo $total_records = mysql_num_rows($res1);  
echo $total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='../view/admin.php?page=1'>".'|<'."</a> ";   

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='../view/list.php?page=".$i."'>".$i."</a> "; 
};
echo "<a href='../view/list.php?page=$total_pages'>".'>|'."</a> ";    
?>

</form>
</body>
</html>