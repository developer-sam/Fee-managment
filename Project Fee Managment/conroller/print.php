<?php
//This application is developed by www.webinfoipedia.com. || Copyright 2011.
//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..


//connect the database
$con=mysql_connect("localhost","root","");
mysql_select_db('fees',$con); 

//Enter the headings of the excel columns
$contents="stud_id,firstname,gender,phone,email\n";
$stud_id=$_GET['id'];

//Mysql query to get records from datanbase
//You can customize the query to filter from particular date and month etc...Which will depends your database structure.
$user_query = mysql_query("SELECT stud_id,firstname,phone,gender,email  FROM register where stud_id='$stud_id'");

//While loop to fetch the records
while($row = mysql_fetch_array($user_query))
{
$contents.=$row['stud_id'].",";
$contents.=$row['firstname'].",";
$contents.=$row['gender'].",";
$contents.=$row['phone'].",";
$contents.=$row['email']."\n";
}

// remove html and php tags etc.
//$contents = strip_tags($contents); 

//header to make force download the file
header("Content-Disposition: attachment; filename=print".date('d-m-Y').".doc");
print $contents;

//For more examples related PHP visit www.webinfoipedia.com and enjoy demo and free download..
?>