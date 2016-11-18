<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>service</title>
</head>
<body>
<?php
require_once("sql_execution.php");

class service
{
	
	public function insertdata($table,$fields,$values)
	{
		 $obj=new sql_execution();
		 $sql="insert into $table ($fields) values($values)";
		$obj->executequery($sql);
		return $obj->getresult();
		
	}
	public function selectdata($table,$fields,$values)
	{
		 $obj=new sql_execution();
		 $sql="select * from $table where $fields='$values'";
		$obj->executequery($sql);
		return $obj->getresult();
	}	
	public function selectdatainnerjoin($table1,$table2,$field1,$field2)
	{
		 $obj=new sql_execution();
		 $sql="select * from $table1 INNER JOIN $table2 ON $table1.$field1=$table2.$field2";
		$obj->executequery($sql);
		return $obj->getresult();
	}	
	public function selectdatawhere($table,$condition)
	{
		 $obj=new sql_execution();
		 $sql="select * from $table where $condition";
		$obj->executequery($sql);
		return $obj->getresult();ry($sql);
		return $res;
	}	
	public function viewdata($table)
	{
		 $obj=new sql_execution();
		$sql="select * from $table ";
		$obj->executequery($sql);
		return $obj->getresult();
	}	
	public function viewdatawhere($table,$fields,$values)
	{
		 $obj=new sql_execution();
		 $sql="select * from $table where $fields='$values' ";
	$obj->executequery($sql);
		return $obj->getresult();
	}	
	public function deletedata($table,$fields,$t)
	{
		 $obj=new sql_execution();
		$sql="delete from $table where $fields='$t'";
		$obj->executequery($sql);
		return $obj->getresult();
	}	

	public function updatedata($table,$condition,$fields,$t)
	{
		 $obj=new sql_execution();
		 echo $sql="update $table set $condition where $fields='$t'";
		$obj->executequery($sql);
		return $obj->getresult();
	}
	

	public function searchdata($table,$condition)
	{
		 $obj=new sql_execution();
		 $sql="select * from $table where $condition";
		$obj->executequery($sql);
		return $obj->getresult();
	}
	public function selectwithlimit($table,$startfrom,$endon)
	{
		 $obj=new sql_execution();
		$sql="select * from $table LIMIT $startfrom,$endon ";
		$obj->executequery($sql);
		return $obj->getresult();
	}
	
	public function selectwithwherelimit($table,$condition,$startfrom,$endon)
	{
		  $obj=new sql_execution();
		$sql="select * from $table where $condition LIMIT $startfrom,$endon ";
		$obj->executequery($sql);
		return $obj->getresult();
	}
	public function selectionthree($table1,$field1,$value,$start_from,$num_rec_per_page)
	{	
		$obj=new sql_execution();
		  $sql="select * from $table1  where $field1 = '$value' limit $start_from,$num_rec_per_page";
			$obj->executeQuery($sql);
return $obj->getResult();
	}
	
	public function selectionthrenolim($table1,$field1,$value)
	{
		$obj=new sql_execution();
		 $sql1="select * from $table1 where $field1 = '$value'";
			$obj->executeQuery($sql1);
return $obj->getResult();
	}
	public function selectionseven($table1,$field3,$value,$start_from,$num_rec_per_page)
	{	
		$obj=new sql_execution();
		  $sql="select * from $table1  where $field3 = '$value' limit $start_from,$num_rec_per_page";
			$obj->executeQuery($sql);
return $obj->getResult();
	}
	
	public function selectionsevennolim($table1,$field3,$value)
	{
		$obj=new sql_execution();
		 $sql1="select * from $table1 where $field3 = '$value'";
			$obj->executeQuery($sql1);
return $obj->getResult();
	}
	
	public function selectionfour($table1,$field2,$value,$start_from,$num_rec_per_page)
	{
		$obj=new sql_execution();
		 $sql="select * from $table1 where $field2 = '$value' limit $start_from,$num_rec_per_page";
		$obj->executeQuery($sql);
return $obj->getResult();
	}
	
	public function selectionfournolim($table1,$field2,$value)
	{
		$obj=new sql_execution();
		$sql1="select * from $table1  where $field2 = '$value'";
		$obj->executeQuery($sql1);
return $obj->getResult();
	}
	
	
	
	
    public function selectionfive($table1,$field1,$course,$field2,$stud_id,$field3,$firstname,$start_from,$num_rec_per_page)
	{
		$obj=new sql_execution();
		 $sql="select * from $table1 where $field1 ='$course' and $field2='$stud_id' and $field3='$firstname' limit $start_from,$num_rec_per_page";
			$obj->executeQuery($sql);
return $obj->getResult();
	}
	
	  public function selectionfivnolim($table1,$field1,$course,$field2,$stud_id,$field3,$firstname)
	{
		$obj=new sql_execution();
		 $sql1="select * from $table1  where $field1 ='$course' and $field2='$stud_id' and $field3='$firstname'";
			$obj->executeQuery($sql1);
return $obj->getResult();
	}
	
	public function selectionsix($table1,$start_from,$num_rec_per_page)
	{
		$obj=new sql_execution();
		 $sql="select * from $table1 limit $start_from,$num_rec_per_page";
		
			$obj->executeQuery($sql);
return $obj->getResult();
	}
	
	public function selectionsixnolim($table1)
	{
		$obj=new sql_execution();
			
		$sql1="select * from $table1";
		$obj->executeQuery($sql1);
return $obj->getResult();
	}
	public function viewonlysomewhere($table,$fields,$values)
	{
	$sql="select id,name from $table where $fields='$values' ";
		$res=mysql_query($sql);
		return $res;
	}	
	
	
}
?>
</body>
</html>